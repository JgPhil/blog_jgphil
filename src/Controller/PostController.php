<?php

namespace App\Controller;

use DateTime;
use App\Entity\Post;
use App\Entity\Skill;
use App\Form\PostType;
use App\Repository\PostRepository;
use App\Services\PicturesHandler;
use App\Services\SkillIconFetcher;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Yaml\Yaml;

class PostController extends AbstractController
{
    /**
     * @Route("/posts/list", name="post_list", methods={"GET"})
     */
    public function list(PostRepository $repo)
    {
        $posts = $repo->findByActive(1);
        return $this->render('post/list.html.twig', [
            'posts' => $posts
        ]);
    }

    /**
     * Undocumented function
     *
     * @Route("/posts/{id}/update", name="post_update", methods={"GET","POST"})
     * 
     * @param Post $post
     * @param EntityManagerInterface $em
     * @param Request $request
     * @return void
     */
    public function update(Post $post, EntityManagerInterface $em, Request $request, PicturesHandler $picturesHandler)
    {
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pictures = $form->get('pictures')->getData();
            foreach ($pictures as $picture) {
                $errors = $picturesHandler->checkPicture($picture);
                if (!empty($errors[0])) {
                    $this->addFlash('danger', $errors);
                    return $this->redirectToRoute('post_list');
                }
                $picturesHandler->addPicture($picture, $post);
            }
            ////---------- SkillList---------////
            $post->setSkills(['']);
            $skills = array_keys(array_filter($form->get('skills')->getData()));;
            $post->setSkills($skills);
            $em->persist($post);
            $em->flush();

            $this->addFlash('message', 'Votre article a bien été modifiée');
            return $this->redirectToRoute('post_list');
        }

        return $this->render('post/form.html.twig', [
            'post' => $post,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/posts/{id}/delete", name="post_desactivate")
     */
    public function delete(EntityManagerInterface $em, Post $post)
    {
        $post->setActive(0);
        $em->flush();
        return $this->redirectToRoute('post_list');
    }


    /**
     * @Route("/posts/new", name="post_new", methods={"GET","POST"})
     */
    public function new(EntityManagerInterface $em, PicturesHandler $picturesHandler, Request $request)
    {
        $post = new Post;
        $post->setAuthor($this->getUser())
            ->setActive(1);
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pictures = $form->get('pictures')->getData();
            foreach ($pictures as $picture) {
                $errors = $picturesHandler->checkPicture($picture);
                if (!empty($errors[0])) {
                    $this->addFlash('danger', $errors);
                    return $this->redirectToRoute('post_list');
                }
                $picturesHandler->addPicture($picture, $post);
            }
            $post = $form->getData();

            $skills = array_keys(array_filter($form->get('skills')->getData()));;
            $post->setSkills($skills);

            $em->persist($post);
            $em->flush();
            return $this->redirectToRoute('post_list');
        }

        return $this->render('post/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/posts/show/{id}", name="post_show", methods={"GET"})
     */
    public function show(Post $post)
    {
        return $this->render('post/show.html.twig', [
            'post' => $post,
            'skills' => SkillIconFetcher::getUrls($post->getSkills())
        ]);
    }
}
