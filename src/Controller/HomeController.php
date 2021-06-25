<?php

namespace App\Controller;

use App\Repository\MobilesRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Mobiles;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @var MobilesRepository
     */
    private $mobilesRepository;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(
        MobilesRepository $mobilesRepository,
        EntityManagerInterface $em
    )
    {
        $this->mobilesRepository = $mobilesRepository;
        $this->em = $em;
    }

    #[Route('/', name: 'home_principal')]
    public function home(): Response
    {

        return $this->render('home/home.html.twig', [
            'controller_name' => 'HomeController'
        ]);
    }

    #[Route('/home', name: 'home')]
    public function index(): Response
    {

        $mobil = $this->mobilesRepository->find(2);

        $mobiles = $this->mobilesRepository->findAll();

        dump($mobiles);

        if(empty($mobil)){

            $mobil = new Mobiles();
            $mobil->setModelo('No modelo');
            $mobil->setPvp(0);

            $this->em->persist($mobil);
            $this->em->flush();
        }

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'mobil'=>$mobil,
            'mobiles'=> $mobiles
        ]);
    }
}
