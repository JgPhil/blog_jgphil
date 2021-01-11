<?php

namespace App\Services;

use App\Entity\Post;
use App\Entity\User;
use App\Entity\Picture;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\EntityManagerInterface;
use App\src\model\Picture as ModelPicture;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\File;
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

    public function rename(File $picture)
    {
        return $filename = md5(uniqid()) . '.' . $picture->guessExtension();
    }

    public function movePicture(UploadedFile $picture, $name)
    {
        $picture->move(
            $this->params->get('pictures_directory'),
            $name
        );
    }

    public function checkPicture(File $picture): array
    {
        $errors = [];
        if (empty($picture)) {
            $errors[] = "Il y a eu un problème lors de la création de votre post";
        }
        if (!$this->correctExtension($picture)) {
            $errors[] =  "Mauvais format d'image.  Fichiers acceptés: " . implode(', ' . $this->acceptedExtensions);
        }
        if ($picture->getSize() > 2097150) {
            $errors[] = "Le fichier image est trop volumineux. maximum: 2 Mb";
        }
        return $errors;
    }



    public function addPicture($pictureFile, $entity)
    {

        if ($entity instanceof User) {
            $oldPicture = $this->hasPicture($entity);
            if ($oldPicture !== null) {
                $this->entityManager->remove($oldPicture);
            }
        }
        $filename = $this->rename($pictureFile);
        $this->movePicture($pictureFile, $filename);
        $pic = new Picture;
        $pic->setName($filename);
        
        if ($entity instanceof Post) {
            $maxOrder = $this->findPictureHighestOrder($entity);
            $pic->setSortOrder($maxOrder + 1);
        }
        $pic->setPost($entity);
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

    public function findPictureHighestOrder(Post $post)
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

    public function delete($picture)
    {
        unlink(
            $this->params->get('pictures_directory') .
                '/' .
                $picture->getName()
        );
    }
}
