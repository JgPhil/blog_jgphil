<?php

namespace App\Controller;

use App\Entity\Picture;
use App\Entity\Post;
use App\Repository\PictureRepository;
use App\Repository\PostRepository;
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
        EntityManagerInterface $manager,
         PostRepository $postRepo
    ) {

        $oldPictureId = $request->request->get('oldPictureId');
        $oldPicture = $pictureRepo->find($oldPictureId);
        $oldPictureSortOrder = $request->request->get('oldPictureOrder');
        $postId = $request->request->get('postId');
        $post = $postRepo->find($postId);
        $pictureFile = $request->files->get('file');
        $errors = $pictureHandler->checkPictures($pictureFile);
        if (!empty($errors[0])) {
            $this->addFlash('danger', $errors);
            return $this->redirectToRoute('post_show',[
                'id' => $postId,
                'message' =>   $errors[0]
            ]);
        }
        $filename = $pictureHandler->rename($pictureFile);
        $pictureHandler->movePicture($pictureFile, $filename);
        $newPicture = new Picture();
        $newPicture->setSortOrder($oldPictureSortOrder);
        $newPicture->setPost($post);
        $newPicture->setName($filename);
        $post->addPicture($newPicture);
        $pictureHandler->delete($oldPicture);        
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
