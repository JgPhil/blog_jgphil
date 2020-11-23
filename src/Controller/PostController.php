<?php

namespace App\Controller;

use DateTime;
use App\Entity\Post;
use App\Form\PostType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PostController extends AbstractController
{
    /**
     * @Route("/posts/list", name="post_list", methods={"GET"})
     */
    public function list(EntityManagerInterface $em, Request $request)
    {
        $posts = $this->getDoctrine()->getRepository(Post::class)->findAll();
        return $this->render('post/list.html.twig', [
            'posts' => $posts
        ]);
    }

    /**
     * @Route("/posts/{id}/update", name="post_update", methods={"GET","POST"})
     */
    public function update(Post $post, EntityManagerInterface $em, Request $request)
    {
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $post = $form->getData();

            $em->persist($post);
            $em->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('post/new.html.twig', [
            'post' => $post,
            'form' => $form->createView()
        ]);
    }


    /**
     * @Route("/posts/new", name="post_new", methods={"GET","POST"})
     */
    public function new(EntityManagerInterface $em, Request $request)
    {
        $post = new Post;
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $post = $form->getData();
            $post->setAuthor($this->getUser())
                ->setCreatedAt(new DateTime());

            $em->persist($post);
            $em->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('post/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
