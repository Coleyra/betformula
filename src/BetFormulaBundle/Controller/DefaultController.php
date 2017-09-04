<?php

namespace BetFormulaBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $gps = $em->getRepository('BetFormulaBundle\Entity\Gp')->findAll();
        $constructors = $em->getRepository('BetFormulaBundle\Entity\Ecurie')->findAll();
        $drivers = $em->getRepository('BetFormulaBundle\Entity\Pilote')->findAll();
        $nextGp = $em->getRepository('BetFormulaBundle\Entity\Gp')->nextGp();
        dump($nextGp);
        return $this->render('BetFormulaBundle::index.html.twig', array(
            'teams' => $constructors,
            'drivers' => $drivers,
            'gps' => $gps,
            'nextGp' => $nextGp
        ));
    }
}
