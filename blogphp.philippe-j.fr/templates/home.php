<?php

use App\src\constraint\Text;

$this->title = "Accueil"; ?>



<!-- hero area -->
<section class="hero-area bg-primary" id="parallax">
  <div class="container">
    <div class="row text-center">
      <div class="col-lg-11 mx-auto">
        <h1 class="text-white font-tertiary"><br><strong> Philippe Jaming<br> Web developer</strong></h1>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row text-center mb-40">
      <div class="col-lg-10 mx-auto">
        <h4 class="text-white font-tertiary"><br><strong> Expression numérique et personnelle de mon parcours informatique</strong></h4>
      </div>
    </div>
  </div>
  <div class="container ">
    <div class="row text-center mt-20">
      <div class="col-lg-8 mx-auto">
        <h4 style="color :white"><em>- Bienvenue sur mon blog -<br> Au travers de ces quelques articles je vais parler de mon cursus de formation et de ma passion pour le code </em></h4>
      </div>
    </div>
    <div class="row text-center">
      <div class="col-2">
        <a class="btn btn-primary" id="cv" href="<?= CV_PATH ?>" download="CV">
          Mon CV
        </a>
      </div>
    </div>
  </div>






  <div class="layer-bg w-100">
    <img class="img-fluid w-100" src="images/illustrations/leaf-bg.png" alt="bg-shape">
  </div>
  <div class="layer" id="l2">
    <img src="images/illustrations/dots-cyan.png" alt="bg-shape">
  </div>
  <div class="layer" id="l3">
    <img src="images/illustrations/leaf-orange.png" alt="bg-shape">
  </div>
  <div class="layer" id="l4">
    <img src="images/illustrations/dots-orange.png" alt="bg-shape">
  </div>
  <div class="layer" id="l5">
    <img src="images/illustrations/leaf-yellow.png" alt="bg-shape">
  </div>
  <div class="layer" id="l6">
    <img src="images/illustrations/leaf-cyan.png" alt="bg-shape">
  </div>
  <div class="layer" id="l7">
    <img src="images/illustrations/dots-group-orange.png" alt="bg-shape">
  </div>
  <div class="layer" id="l8">
    <img src="images/illustrations/leaf-pink-round.png" alt="bg-shape">
  </div>
  <div class="layer" id="l9">
    <img src="images/illustrations/leaf-cyan-2.png" alt="bg-shape">
  </div>
  <!-- social icon -->
  <ul class="list-unstyled ml-5 mt-3 position-relative zindex-1">
    <li class="mb-3"><a class="text-white" href="https://github.com/JgPhil"><i class="ti-github"></i></a></li>
    <li class="mb-3"><a class="text-white" href="https://twitter.com/bootsnipp"><i class="ti-twitter"></i></a></li>
    <li class="mb-3"><a class="text-white" href="https://www.linkedin.com/in/philippe-j-61a477194/"><i class="ti-linkedin"></i></a></li>
    <li class="mb-3"><a class="text-white" href="Location:?route=contact"><i class="ti-email"></i></a></li>
  </ul>
  <!-- /social icon -->
</section>
<!-- /hero area -->

<!-- blog -->
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <div class="container row">
          <div class="col-lg-8 mx-auto">
            <?php
            if ($this->session->get('message')) {
            ?>
              <h4 class="alert alert-success" role="alert"><?= htmlentities($this->session->show('message')) . ' <b>' . htmlentities($this->session->get('pseudo')) . '</b>'; ?></h4>
            <?php
            }
            ?>
          </div>
        </div>
        <h2 class="section-title">Blog</h2>

      </div>

      <?php

      foreach ($posts as $post) {

        if ($post->getVisible() === "1") {
      ?>
          <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
            <article class="card shadow">
              <?php $postPicture = $post->getPicture() ?>
              <img class="rounded card-img-top img-responsive" src=<?= isset($postPicture) ? POST_PICTURE . $postPicture->getName() : POST_EMPTY_PICTURE   ?> alt="<?= "Une image de l'article " . $post->getTitle() ?>">
              <div class="card-body">
                <h4 class="card-title"><a href=<?= SLUG . "post&postId=" . htmlentities($post->getId()); ?>"><?= $post->getTitle(); ?></a></h4>
                <h5><?= $post->getHeading(); ?></h5>
                <p>dernière modif. le : <?= htmlentities($post->getLastUpdate()); ?></p>
                <p class="cars-text"><?= nl2br(Text::excerpt($post->getContent())); ?></p>
                <a href="<?= SLUG . "post&postId=" . htmlentities($post->getId()); ?>" class="btn btn-xs btn-primary">Voir Plus</a>
              </div>
            </article>
          </div>
      <?php
        }
      }
      ?>
    </div>
  </div>
</section>
<!-- /blog -->