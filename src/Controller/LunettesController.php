<?php

namespace App\Controller;

use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Lunettes;
use App\Form\LunettesType;

use App\Entity\Image;

class LunettesController extends AbstractController{

    private $arr = [];
    private $men = [];
    private $women = [];
    private $paginator;

    public function __construct(PaginatorInterface $paginator){

        $this->paginator = $paginator;

        $this->arr = array('homme' => 'h',
                     'femme' => 'f',
                     'enfant' => 'e',
                     'mixte' => 'm'
                 );
    }

    private function pageKnp($query, $request){
        $pagination = $this->paginator->paginate(
            $query,
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/
        );

        return $pagination;
    }

    /**
     * @Route("/lunettes/{type}", name="lunettes", defaults={"type": "vue"})
     */
    public function index(string $type){

    	$lunettes = $this->getDoctrine()
    				->getRepository(Lunettes::class)
    				->findByType($type);

        return $this->render('lunettes/index.html.twig',[
        	'lunettes' => $lunettes,
            'type' => $type
        ]);
    }

    /**
     * @Route("lunettes/{type}/{genre}", name="lunettes_genre", defaults={"type": "vue"})
     */
    public function genre(string $type, string $genre, Request $request){

        $lunettes = $this->getDoctrine()
                    ->getRepository(Lunettes::class)
                    ->findBy(['type' => $type, 'genre' => $this->arr[$genre] ]);

        $pagination = $this->pageKnp($lunettes, $request);        

        return $this->render('lunettes/filtres.html.twig',[
            'lunettes' => $lunettes,
            'pagination' => $pagination,
            'genre' => $genre,
            'type' => $type
        ]);
    }

    /**
     * @Route("lunettes/{type}/marque/{marque}/{special}", name="lunettes_marque", defaults={"type":"vue", "special":"no"})
     */
    public function marque(string $type, string $marque, string $special, Request $request){

        $lunettes = $this->getDoctrine()
                    ->getRepository(Lunettes::class)
                    ->findBy(['type' => $type, 'slug' => $marque]);

        if($special == 'special'){

            foreach ($lunettes as $val) {
                if($val->getGenre() == 'h'){
                    $this->men[] = $val;
                }else{
                    $this->women[] = $val;
                }
            }

            return $this->render('lunettes/selection.html.twig',[
                'lunettes' => $lunettes,
                'marque' => str_replace('-', ' ', $marque),
                'type' => $type,
                'men' => $this->men,
                'women' => $this->women,
            ]);
        }

        $pagination = $this->pageKnp($lunettes, $request);    

        return $this->render('lunettes/filtres.html.twig',[
            'lunettes' => $lunettes,
            'pagination' => $pagination,
            'marque' => str_replace('-', ' ', $marque),
            'type' => $type
        ]);
    }

    /**
     * @Route("lunettes/{type}/modele/{forme}", name="lunettes_modele", defaults={"type":"vue"})
     */
    public function modele(string $type, string $forme, Request $request){

        $lunettes = $this->getDoctrine()
                    ->getRepository(Lunettes::class)
                    ->findBy(['type' => $type, 'forme' => $forme]);

        $pagination = $this->pageKnp($lunettes, $request);    

        return $this->render('lunettes/filtres.html.twig',[
            'lunettes' => $lunettes,
            'pagination' => $pagination,
            'cat' => $forme,
            'type' => $type
        ]);
    }

    /**
     * @Route("lunettes/{type}/{cat}/{title}/{val}/", name="lunettes_selection", defaults={"type":"vue"})
     */
    public function selection(Request $request, string $type, string $cat, string $title, string $val){

        if($cat !== 'all'){
            $lunettes = $this->getDoctrine()
                    ->getRepository(Lunettes::class)
                    ->findBy(['type' => $type, $cat => $val]);
        }else{
          $lunettes = $this->getDoctrine()
                    ->getRepository(Lunettes::class)
                    ->findAll();  
        }
        
        $pagination = $this->pageKnp($lunettes, $request);    

        return $this->render('lunettes/filtres.html.twig',[
            'lunettes' => $lunettes,
            'pagination' => $pagination,
            'cat' => str_replace('-', ' ', $title),
            'type' => $type,
            'title' => $title,
            'val' => $val,
        ]);
    }

    /**
     * @Route("lunettes/new", name="lunettes_create")
     */
    public function create(Request $request){

        $lunettes = new lunettes();

        $form = $this->createForm(LunettesType::class, $lunettes);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $lunettes = $form->getData();
            $lunettes->setName($lunettes->getMarque());
            $lunettes->setSlug($lunettes->getMarque()->getSlug());

            /* Upload images */

            $imageFiles = $form['image']->getData();

                if ($imageFiles) {
                    foreach ($imageFiles as $imageFile) {            
                        $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                        $newFilename = uniqid().'.'.$imageFile->guessExtension();

                        // Move the file to the directory where brochures are stored
                        /*try {
                            $imageFile->move(
                                $this->getParameter('uploads_directory'),
                                $newFilename
                            );
                        } catch (FileException $e) {}*/

                        $image = new Image();
                        $image->setName($newFilename);

                        $lunettes->addImage($image);

                        $em = $this->getDoctrine()->getManager();
                        $em->persist($lunettes);
                    }
                }

            $em->flush();

            return $this->redirectToRoute('lunettes');
        }

        return $this->render('lunettes/new.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("lunettes/{id}/{slug}-{ref}/show", name="lunettes_show", methods={"GET"})
     */
    public function show($id, $slug, $ref){
    	
    	$lunette = $this->getDoctrine()
    					->getRepository(lunettes::class)
    					->find($id);

    	if(!$lunette){
    		throw $this->createNotFoundException(
    			'No lunette existe pour cet id : '.$id
    		);
    	}

    	return $this->render('lunettes/show.html.twig', [
    		'lunette' => $lunette,
            'slug' => str_replace('-', ' ', $slug),
    	]);
    }
}
