<?php

namespace App\Controller;

use App\Entity\Picture;
use App\Entity\Post;
use App\Repository\PictureRepository;
use App\Services\PicturesHandler;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PictureController extends AbstractController
{
    /**
     * @Route("/delete/picture/{id}", name="picture_delete")
     */
    public function deletePicture(Picture $picture)
    {
        return $this->desactivateEntity($picture);
    }



    private function desactivateEntity($entity)
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $em = $this->getDoctrine()->getManager();

        $name = $entity->getName();
        //suppression du fichier dans le dossier uploads
        unlink($this->getParameter('pictures_directory') . '/' . $name);
        // suppression de l'entrée en base
        $em->remove($entity);

        $em->flush();
        return new JsonResponse(['success' => 1]);
    }


    /**
     * @Route("/picture-update", name="picture-update", methods={"POST"})
     * 
     */
    public function updatePicture(
        Request $request,
        PicturesHandler $pictureHandler,
        PictureRepository $pictureRepo,
        EntityManagerInterface $manager
    ) {

        $oldPictureId = $request->query->get('oldPictureId');
        $oldPicture = $pictureRepo->find($oldPictureId);
        $oldPictureSortOrder = $oldPicture->getSortOrder();
        //Récupération et sauvegarde du fichier image
        $pictureFile = $request->files->get('file');
        $filename = $pictureHandler->movePicture($pictureFile);
        $newPicture = new Picture();
        $newPicture->setSortOrder($oldPictureSortOrder);
        $newPicture->setPost($post);
        $newPicture->setName($filename);
        $post->addPicture($newPicture);
        unlink(
            $this->params->get('pictures_directory') .
                '/' .
                $oldPicture->getName()
        );
        //effacement de l'entrée en base de l'ancienne image
        $manager->remove($oldPicture);
        $manager->flush();

        return $this->json(
            [
                'message' => 'Image mise à jour',
                'newPictureFilename' => $filename,
            ],
            200
        );
    }

}
