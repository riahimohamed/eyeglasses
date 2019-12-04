<?php

namespace App\Controller;

use App\Entity\Lunettes;
use App\Entity\Image;

use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;

class AdminController extends EasyAdminController
{
 
	public function persistLunettesEntity($lunettes){

        $lunettes->setNew(0);
		$lunettes->setName($lunettes->getMarque());
        $lunettes->setSlug($lunettes->getMarque()->getSlug());

        /* Upload images */

        $imageFiles = $lunettes->getFiles();

        if ($imageFiles) {
            foreach ($imageFiles as $imageFile) {            
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $newFilename = uniqid().'.'.$imageFile->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $imageFile->move(
                        $this->getParameter('uploads_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {}

                $image = new Image();
                $image->setName($newFilename);

                $lunettes->addImage($image);

                parent::persistEntity($lunettes);
            }
        }
    }
}