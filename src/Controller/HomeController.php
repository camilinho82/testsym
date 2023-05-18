<?php

namespace App\Controller;

use App\Entity\Building;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController {

    #[Route('/')]
    public function homepage(EntityManagerInterface $entityManager): Response
    {
        $data = $entityManager->getRepository(Building::class)->findAll();

        // dd($data);

        return $this->render('homepage.html.twig',[
            'title' => 'Home',
            'data' => $data,
        ]);
    }

    #[Route('/building/{id}')]
    public function nextpage(EntityManagerInterface $entityManager, string $id = null) : Response
    {
        if ($id != null) {
            $data = $entityManager->getRepository(Building::class)->find($id);

            if($data){
                return $this->render('nextpage.html.twig',[
                    'title' => 'Building',
                    'data' => $data,
                ]);
            }else{

                return $this->redirect('/');

            }
            
        }else{
            $data = $entityManager->getRepository(Building::class)->findAll();

            return $this->render('homepage.html.twig',[
                'title' => 'Home',
                'data' => $data,
            ]);
        }
        
    }

    
}