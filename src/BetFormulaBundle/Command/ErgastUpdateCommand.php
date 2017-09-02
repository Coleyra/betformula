<?php
namespace BetFormulaBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use ErgastClientBundle\Manager\ApiManager;
use BetFormulaBundle\Entity\Gp;
use BetFormulaBundle\Entity\Resultat;

class ErgastUpdateCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('api:update')
        ->setDescription('Vérifie si les GP sont à jour.')
        ->setHelp('This command allows you to update the db...')
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

        $progressBar->setMessage('Checking GPs');
        $gps = $apiManager->get('f1', 'current');
        foreach($gps->MRData->RaceTable->Races as $gp) {
            $progressBar->setMessage('Checking Results for GP : ' . $gp->raceName);
            $results = $apiManager->get('f1', 'results', '2017', $gp->round);
            //Si le GP a déjà eu lieu
            if(count($results->MRData->RaceTable->Races) > 0) {
                //Checking if the results for this GP is defined
                $gpe = $em->getRepository('BetFormulaBundle\Entity\Gp')->findOneBy(array('fkSai' => 1, 'gpRound' => $gp->round));
                $result = $em->getRepository('BetFormulaBundle\Entity\Resultat')->findBy(array('fkGp' => $gpe));

                if(count($result) === 0) {
                    foreach($results->MRData->RaceTable->Races[0]->Results as $result) {
                        $progressBar->setMessage('Adding Resultat : Position ' . $result->position . ' / ' . $result->Driver->givenName . ' ' . $result->Driver->familyName);
                        $pilote = $em->getRepository('BetFormulaBundle\Entity\Pilote')->findOneBy(array('apiDriverId' => $result->Driver->driverId));
                        $resultat = new Resultat();
                        $resultat->setFkGp($gpe);
                        $resultat->setFkPil($pilote);
                        $resultat->setResPosition($result->position);
                        $resultat->setResPoint($result->points);
                        $em->persist($resultat);
                    }
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
