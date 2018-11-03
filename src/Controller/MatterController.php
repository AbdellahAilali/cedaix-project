<?php

namespace App\Controller;

use App\Entity\Matter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class MatterController extends Controller
{
    /**
     * @Route("/matter_price_grid", name="matter_price_grid")
     */
    public function priceGridAction()
    {
        $em = $this->getDoctrine()->getManager();

        return $this->render('matter/price_grid.html.twig', [
            'matters' => $em->getRepository(Matter::class)->findAll(),
        ]);
    }
}
