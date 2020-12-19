<?php
$route = $this->getMethod->getParameter('route');
$adminRoute = isset($route) && $route === 'administration';
$title = $h1 =  $adminRoute ? 'Administration' : 'Corbeille';
$return = $adminRoute ? '/' : SLUG . 'administration'; //navbar arrow
$visible = $adminRoute ? '1' : '0';

$this->title = $title; ?>

<!-- page title -->
<section class="page-title bg-primary position-relative">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="col-lg-12 text-center">
                    <div class="container row">
                        <div class="col-lg-8 mx-auto">
                            <?php
                            if ($this->session->get('admin_message')) {
                            ?>
                                <h4 class="alert alert-success" role="alert"><?php print_r(htmlentities($this->session->show('admin_message'))) ?></h4>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <h1 class="text-white font-tertiary"><br><?php print( htmlentities($h1)) ?></h1>
            </div>
        </div>
    </div>
    <!-- background shapes -->
    <img src="images/illustrations/page-title.png" alt="illustrations" class="bg-shape-1 w-100">
    <img src="images/illustrations/leaf-pink-round.png" alt="illustrations" class="bg-shape-2">
    <img src="images/illustrations/dots-cyan.png" alt="illustrations" class="bg-shape-3">
    <img src="images/illustrations/leaf-orange.png" alt="illustrations" class="bg-shape-4">
    <img src="images/illustrations/leaf-yellow.png" alt="illustrations" class="bg-shape-5">
    <img src="images/illustrations/dots-group-cyan.png" alt="illustrations" class="bg-shape-6">
    <img src="images/illustrations/leaf-cyan-lg.png" alt="illustrations" class="bg-shape-7">
</section>
<!-- /page title -->

<div id="admin_navbar" class="container mt-500">
    <nav class="navbar navbar-expand-lg d-flex justify-content-center ">
        <div class="navbar-brand" id="admin_nav">
            <ul class="navbar-nav navbar-dark mx-auto d-flex align-items-center">
                <li class="nav-item"><a class="nav-link" href=<?php print_r(htmlentities($return)) ?>><i class="fas fa-long-arrow-alt-left"></i>Retour</a></li>
                <li class="nav-item"><a class="nav-link" href="#posts">Articles</a></li>
                <li class="nav-item"><a class="nav-link" href="#users">Utilisateurs</a></li>
                <li class="nav-item"><a class="nav-link" href="#comments">commentaires</a></li>
                <?php
                if ($adminRoute) {
                ?>

                    <li class="nav-item"><a class="nav-link" href="<?php print_r(SLUG . "trash") ?>"><i class="fas fa-trash-alt" style="font-size:17px"></i>Corbeille</a></li>


                <?php
                } else {
                ?>
                    <a class="d-flex justify-content-end btn btn-danger mx-auto" href="<?php print_r(SLUG . "emptyTrash") ?>" onclick="return confirm('êtes-vous sûr de vouloir vider la corbeille?')">Vider La Corbeille</a>
                <?php
                }


                ?>
            </ul>

        </div>
    </nav>
</div>



<div class="col-lg-10 mx-auto">
    <div class="bg-white rounded text-center p-5 shadow-down">

        <!-- ARTICLES -->
        <h3 id="posts" class="mt-20 mb-20 border border-primary">Articles</h3>

        <?php
        if ($adminRoute) {
        ?>
            <a class="btn btn-primary col-lg-2 d-flex justify-content-center btn btn-primary mx-auto mb-20" href="<?php print_r(SLUG . "addPost") ?>">Nouvel article</a>
        <?php
        }
        ?>

        <table class="table">
            <tr>
                <td>Id</td>
                <td>Titre</td>
                <td>Châpo</td>
                <td>Auteur</td>
                <td>Date</td>
                <?php
                if ($adminRoute) {
                ?>
                    <td>Commentaires</td>
                <?php
                }

                ?>
                <td>Actions</td>
            </tr>
            <?php
            foreach ($posts as $post) {
                if ($post->getErasedAt() === null) {
                    if ($post->getVisible() === $visible) {
            ?>
                        <tr>
                            <td><?php print_r(htmlspecialchars($post->getId())); ?></td>
                            <td><a href="?route=post&postId=<?php print_r(htmlspecialchars($post->getId())) ?>"><?php print_r(htmlspecialchars($post->getTitle())); ?></a></td>
                            <td> <?php print_r($post->getHeading()); ?></td>
                            <td><?php print_r(htmlspecialchars($post->getUser()->getPseudo())); ?> (<?php print_r(htmlspecialchars($post->getUser()->getRole())) ?>)</td>
                            <td>Dernière modif. le : <?php print_r(htmlspecialchars($post->getLastUpdate())); ?></td>

                            <?php if ($adminRoute) {
                            ?>
                                <td><a href="?route=postComments&postId=<?php print_r(htmlspecialchars($post->getId())); ?>">Voir</a></td>
                                <td>
                                    <a href="?route=editPost&postId=<?php print_r(htmlspecialchars($post->getId())); ?>">Modifier</a>
                                    <a href="?route=hidePost&postId=<?php print_r(htmlspecialchars($post->getId())); ?>" onclick="return confirm('êtes-vous sûr de vouloir mettre l\'article à la corbeille?')">Supprimer</a>
                                </td>
                            <?php
                            } else { // lien pour restaurer un article vers l'administration
                            ?>
                                <td><a href="?route=showPost&postId=<?php print_r(htmlspecialchars($post->getId())); ?>">Restaurer</a></td>

                            <?php
                            }
                            ?>
                        </tr>
            <?php
                    }
                }
            }
            ?>
        </table><br><br>




        <h3 id="users" class="mt-20 mb-20 border border-primary">Utilisateurs</h3><br>
        <table class="table">
            <tr>
                <td>Id</td>
                <td>Pseudo</td>
                <td>Date</td>

                <?php
                if ($adminRoute) {
                ?>
                    <td>Rôle</td>
                    <td>Activation compte</td>
                    <td>Suppression</td>
                <?php
                } else { ?>
                    <td>Actions</td>
                <?php
                }
                ?>

            </tr>
            <?php
            foreach ($users as $user) {
                if ($user->getErasedAt() === null) {
                    if ($user->getVisible() === $visible) { ?>

                        <tr>
                            <td><?php print_r(htmlspecialchars($user->getId())); ?></td>
                            <td><?php print_r(htmlspecialchars($user->getPseudo())); ?></td>
                            <td>Créé le : <?php print_r(htmlspecialchars($user->getCreatedAt())); ?></td>
                            <td>
                                <?php
                                if ($adminRoute) {
                                    if ($user->getRole() != 'admin') {
                                ?>Utilisateur
                                <a href="?route=setAdmin&pseudo=<?php print_r(htmlspecialchars($user->getPseudo())); ?>" onclick="return confirm('êtes-vous sûr de vouloir donner le statut administrateur à l\'utilisateur ?')">Promouvoir</a>
                            <?php
                                    } else {
                                        print_r('Administrateur');
                                    }
                            ?>
                            </td>

                            <td>
                                <?php
                                    if ($user->getRole() != 'admin') {
                                        if ($user->getActivated() === '1') {
                                ?>
                                        Compte actif
                                        <a href="?route=desactivateAccountAdmin&pseudo=<?php print_r(htmlspecialchars($user->getPseudo())); ?>" onclick="return confirm('êtes-vous sûr de vouloir désactiver l\'utilisateur ?')">Désactiver</a>
                                    <?php
                                        } else { ?>
                                        <a href="?route=activateAccount&pseudo=<?php print_r(htmlspecialchars($user->getPseudo())); ?>" onclick="return confirm('êtes-vous sûr de vouloir activer l\'utilisateur ?')">Activer</a>
                                    <?php
                                        }
                                    } else { ?>
                                    Impossible
                                <?php } ?>

                            </td>

                            <td>
                                <?php
                                    if ($user->getRole() != 'admin') { ?>
                                    <a href="?route=hideUser&userId=<?php print_r(htmlspecialchars($user->getId())); ?>" onclick="return confirm('êtes-vous sûr de vouloir mettre l\'utilisateur à la corbeille?')">Supprimer</a>
                            </td>
                        <?php
                                    } else {
                        ?>
                            Suppression impossible
                        <?php
                                    }
                                } else {
                        ?>
                        <a href="?route=showUser&userId=<?php print_r(htmlspecialchars($user->getId())); ?>" onclick="return confirm('êtes-vous sûr de vouloir restaurer l\'utilisateur vers le panneau d\'administration?')">Restaurer</a></td>
                    <?php
                                }
                    ?>
                        </tr>
            <?php
                    }
                }
            }



            ?>
        </table><br><br>

        <h3 id="comments" class="mt-20 mb-20 border border-primary">Commentaires</h3><br>
        <table class="table">
            <tr>
                <td>Id</td>
                <td>Pseudo</td>
                <td>Article</td>
                <td>Message</td>
                <td>Date</td>
                <?php
                if ($adminRoute) {
                ?>
                    <td>Validation</td>
                    <td>Suppression</td>
                <?php
                } else {
                ?>
                    <td>Actions</td>
                <?php
                }
                ?>

            </tr>
            <?php
            foreach ($comments as $comment) {

                if ($comment->getErasedAt() === null) {
                    if ($comment->getVisible() === $visible) {

            ?>
                        <tr>
                            <td><?php print_r($comment->getId()) ?></td>
                            <td><?php print_r($comment->getUser()->getPseudo()) ?></td>
                            <td><?php print_r($comment->getPost()->getTitle()) ?></td>
                            <!--Appel à la méthode "getPostObj" du modèle "Comment" qui retourne un objet Post -->
                            <td><?php print_r(substr($comment->getContent(), 0, 150)) ?></td>
                            <td>Créé le : <?php print_r($comment->getCreatedAt()) ?></td>
                            <td>
                                <?php
                                if ($adminRoute) {
                                    if ($comment->getValidate() === '0') {
                                ?>
                                        <a href="?route=validateComment&commentId=<?php print_r(htmlspecialchars($comment->getId())); ?>">Valider le commentaire</a></td>
                        <?php
                                    } else {
                                        print_r('Commentaire validé');
                        ?>
                            <a href="?route=invalidateComment&commentId=<?php print_r(htmlspecialchars($comment->getId())); ?>">Invalider le commentaire</a></td>
                        <?php
                                    }

                        ?>
                        <td><a href="?route=hideComment&commentId=<?php print_r(htmlspecialchars($comment->getId())); ?>" onclick=" return confirm('êtes-vous sûr de mettre le commentaire à la corbeille')">Supprimer</a></td>

                        </tr>
                    <?php
                                } else {
                    ?>
                        <a href="?route=showComment&commentId=<?php print_r(htmlspecialchars($comment->getId())); ?>">Restaurer</a></td>
        <?php
                                }
                            }
                        }
                    }
        ?>
        </table>
    </div>
</div>