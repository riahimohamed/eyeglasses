<?php

namespace App\Controller;

use App\Entity\Lunettes;
use App\Entity\Marque;
use App\Entity\Forme;

use App\Entity\Contact;
use App\Form\ContactType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Finder\Finder;

class HomeController extends AbstractController
{
    
    /**
     * @Route("/", name="home")
     */
    public function index(){

        $imagesPath = [];

        $finder = new Finder();

        $finder->files()->in('media/homepage/brand/');
        $finder->files()->name('*.png');

        foreach ($finder as $file){
           $imagesPath[] =  $file->getPathname();
        }

        $vues = $this->getDoctrine()
                         ->getRepository(Lunettes::class)
                         ->findVueLimits();

        $soleils = $this->getDoctrine()
                         ->getRepository(Lunettes::class)
                         ->findSoleilLimits();

        return $this->render('home/index.html.twig', [
            'vues' => $vues,
            'soleils' => $soleils,
            'imagesPath' => $imagesPath,
        ]);
    }

    public function getOptions(){

        $options = $this->getDoctrine()
                    ->getRepository(Marque::class)
                    ->findAll();

        $modeles = $this->getDoctrine()
                    ->getRepository(Forme::class)
                    ->findAll();

        return $this->render('header/header.html.twig',[
            'options' => $options,
            'modeles' => $modeles
        ]);
    }

    /**
     * @Route("/mag", name="home_mag")
     */
    public function mag(){

        return $this->render('home/mag/mag.html.twig');
    }

    /**
     * @Route("contact", name="home_contact")
     */
    public function contact(Request $request, ObjectManager $manager){

        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $manager->persist($contact);
            $manager->flush();

            return $this->redirectToRoute('home_contact');
        }
        
        return $this->render('home/contact.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function searchBar(){

        $form = $this->createFormBuilder(null)
            ->add('query', TextType::class, [
                'attr' => [
                    'placeholder' => 'je recherche une marque, une référence..',
                ],
                'label' => false,
            ])
            ->getForm();

        return $this->render('header/searchbar.html.twig', [
            'searchform' => $form->createView(),
        ]);
    }

    /**
     * @Route("/resultat", name="search_result", methods={"GET"})
     */
    public function handleSearch(Request $request)
    {
        $query = $request->get('query');

        if($query){
            $resultats = $this->getDoctrine()
                           ->getRepository(Lunettes::class)
                           ->search($query);
        }

        return $this->render('home/result.html.twig', [
            'query' => $query,
            'resultats' => $resultats,
        ]);
    }
}
