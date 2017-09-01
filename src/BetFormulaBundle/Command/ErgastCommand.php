<?php
// src/AppBundle/Command/CreateUserCommand.php
namespace BetFormulaBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use ErgastClientBundle\Manager\ApiManager;
use BetFormulaBundle\Entity\Ecurie;
use BetFormulaBundle\Entity\Saison;
use BetFormulaBundle\Entity\Formule;
use BetFormulaBundle\Entity\Pilote;
use BetFormulaBundle\Entity\Gp;
use BetFormulaBundle\Entity\Resultat;
use BetFormulaBundle\Entity\SaiEcuPil;

class ErgastCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('api:fillDb')
        ->setDescription('Rempli la db.')
        ->setHelp('This command allows you to fill the db...')
    ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine')->getManager();
        $apiManager = new ApiManager();
        $progressBar = new ProgressBar($output, 50);
        $progressBar->setFormatDefinition('custom', ' %current%/%max% -- %message%');
        $progressBar->setFormat('custom');
        $progressBar->setMessage('Filling the DB with starting data');
        $progressBar->start();

        $progressBar->setMessage('Filling Series');
        $serie = new Formule();
        $serie->setForLibelle('Formula 1');
        $em->persist($serie);
        $em->flush();
        $progressBar->advance();

        $progressBar->setMessage('Filling Season');
        $season = new Saison();
        $season->setSaiCode('2017');
        $em->persist($season);
        $em->flush();
        $progressBar->advance();

        $progressBar->setMessage('Filling Constructors');
        $constructors = $apiManager->get('f1', 'constructors', '2017');
        foreach($constructors->MRData->ConstructorTable->Constructors as $constructor) {
            $progressBar->setMessage('Adding constructor : ' . $constructor->name);
            $ecurie[$constructor->constructorId] = new Ecurie();
            $ecurie[$constructor->constructorId]->setEcuLibelle($constructor->name);
            $ecurie[$constructor->constructorId]->setFkFor($serie);
            $em->persist($ecurie[$constructor->constructorId]);
        }
        $em->flush();
        $progressBar->advance();

        $progressBar->setMessage('Filling Drivers');
        $drivers = $apiManager->get('f1', 'driverStandings', '2017');
        //dump($drivers->MRData->StandingsTable->StandingsLists[0]);
        foreach($drivers->MRData->StandingsTable->StandingsLists[0]->DriverStandings as $driver) {
            $progressBar->setMessage('Adding driver : ' . $driver->Driver->familyName);
            $pilote[$driver->Driver->driverId] = new Pilote();
            $pilote[$driver->Driver->driverId]->setPilNom($driver->Driver->familyName);
            $pilote[$driver->Driver->driverId]->setPilPrenom($driver->Driver->givenName);
            $em->persist($pilote[$driver->Driver->driverId]);
            $sep = new SaiEcuPil();
            $sep->setFkSai($season);
            $sep->setFkPil($pilote[$driver->Driver->driverId]);
            $sep->setFkEcu($ecurie[$driver->Constructors[0]->constructorId]);
            $em->persist($sep);
        }
        $em->flush();
        $progressBar->advance();

        $progressBar->setMessage('Filling Gp');
        $gps = $apiManager->get('f1', 'current');
        foreach($gps->MRData->RaceTable->Races as $gp) {
            $progressBar->setMessage('Adding GP : ' . $gp->raceName);
            $gpe = new Gp();
            $gpe->setFkFor($serie);
            $gpe->setFkSai($season);
            $gpe->setGpLibelle($gp->raceName);
            $em->persist($gpe);

            $progressBar->setMessage('Filling Results for GP : ' . $gp->raceName);
            $results = $apiManager->get('f1', 'results', '2017', $gp->round);
            //Si le GP a déjà eu lieu
            if(count($results->MRData->RaceTable->Races) > 0) {
                foreach($results->MRData->RaceTable->Races[0]->Results as $result) {
                    $progressBar->setMessage('Adding Resultat : Position ' . $result->position . ' / ' . $result->Driver->givenName . ' ' . $result->Driver->familyName);
                    $resultat = new Resultat();
                    $resultat->setFkGp($gpe);
                    $resultat->setFkPil($pilote[$result->Driver->driverId]);
                    $resultat->setResPosition($result->position);
                    $resultat->setResPoint($result->points);
                    $em->persist($resultat);
                }
            }
            $em->flush();
            $progressBar->advance();

        }
        $em->flush();
        $progressBar->advance();

        $progressBar->finish();
    }
}
