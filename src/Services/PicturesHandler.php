<?php

namespace App\Services;

use App\Entity\Post;
use App\Entity\User;
use App\Entity\Picture;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class PicturesHandler
{
    public $acceptedExtensions = ['jpeg', 'jpg', 'gif', 'png'];
    private $params;
    private $entityManager;

    public function __construct(ParameterBagInterface $params, EntityManagerInterface $entityManager)
    {
        $this->params = $params;
        $this->entityManager = $entityManager;
    }

    public function movePicture(UploadedFile $picture)
    {
        //nouveau nom de fichier
        $filename = md5(uniqid()) . '.' . $picture->guessExtension();
        //copie dans dossier uploads
        $picture->move(
            $this->params->get('pictures_directory'),
            $filename
        );
        return $filename;
    }

    public function handlePictures($pictures, $entity)
    {
        $errors = [];

        foreach ($pictures as $picture) {
            if (!empty($picture)) {
                if ($picture->getSize() < 2097150) {
                    if ($this->correctExtension($picture)) {
                        $this->addPicture($picture, $entity);
                    } else {
                        $errors[] =  "Mauvais format d'image.  Fichiers acceptés: " . implode(', ' . $this->acceptedExtensions);
                    }
                } else {
                    $errors[] = "Le fichier image est trop volumineux. maximum: 2 Mb";
                }
            } else {
                $errors[] = "Il y a eu un problème lors de la création de votre post";
            }
        }
        return $errors;
    }



    public function addPicture($picture, $entity)
    {

        if($entity instanceof User ){
            $oldPicture = $this->hasPicture($entity);
            if($oldPicture !== null){
                $this->entityManager->remove($oldPicture);
            }
        }
        $filename = $this->movePicture($picture); //move file && fetch the filename
        $pic = new Picture;
        $pic->setName($filename);
        if ($entity instanceof Post) {
            $maxOrder = $this->findPictureHighestOrder($entity);
            $pic->setSortOrder($maxOrder + 1);
        }
        $this->entityManager->persist($pic);
        $entity->addPicture($pic);
        $this->entityManager->flush();
        return $pic;
    }



    public function hasPicture(User $user)
    {
        $oldPicture = null;
        if (count($user->getPictures()) > 0) {
            $oldPicture = $user->getPictures()[0];
        }
        return $oldPicture;
    }

    private function correctExtension($picture)
    {
        $extension = $picture->guessExtension();
        if (
            isset($extension) &&
            in_array($extension, $this->acceptedExtensions)
        ) {
            return $extension;
        }
    }

    private function findPictureHighestOrder(Post $post)
    {
        $pictures = $post->getPictures();
        // trouver le sort_order le plus élevé dans les images
        $maxOrder = 0;
        foreach ($pictures as $picture) {
            if ($picture->getsortOrder() > $maxOrder) {
                $maxOrder = $picture->getsortOrder();
            }
        }
        return $maxOrder;
    }
}
