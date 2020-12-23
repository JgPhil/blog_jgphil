<?php $this->title = "Article"; ?>

<!-- page title -->
<section class="page-title bg-primary position-relative">
  <div class="container">
    <div class="row">
      <?php
      if ($this->session->get('add_comment')) {
      ?>
        <div class="alert alert-success" role="alert"><?= $this->session->show('add_comment'); ?></div>
      <?php
      }
      ?>
      <div class="col-12 text-center">
        <h1 class="text-white font-tertiary">Blog</h1>
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



<section class="section">
  <div class="container">
    <div>
      <p><a href=""><i class="fas fa-long-arrow-alt-left"></i> Retour à l'accueil</a></p>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="container">
          <div class="row text-center">
            <div class="col-lg-8 mx-auto ">
              <?php
              if ($this->session->get('logout')) {
              ?>
                <h4 class="alert alert-success" role="alert"><?= htmlentities($this->session->show('add_comment')) . ' <b>' . htmlentities($this->session->get('pseudo')) . '</b>'; ?></h4>
              <?php
              }
              ?>
            </div>
          </div>
        </div>
        <div class="col-lg-12 text-center mb-5">
          <h2 class="font-tertiary mt-5 mb-4 text-center"><?= $post->getTitle(); ?></h2>
          <h3 class="font-tertiary mb-2"><?= $post->getHeading(); ?></h3>
          <h4 class="font-secondary">Dernière modif. le <?= htmlentities($post->getLastUpdate()); ?> par <span class="text-primary"><?= htmlentities($post->getAuthor()); ?></span></h4>
        </div>

        <div class="content">
          <?php $postPicture = $post->getPicture(); ?>
          <img src=<?=!empty($postPicture) ? POST_PICTURE . $postPicture->getName() : POST_EMPTY_PICTURE//htmlentities($picturePath['path']) ?> alt="<?="une image de l'article ". $post->getTitle()?>" class="img-fluid rounded float-left mr-5 mb-4">
          <p><?= nl2br($post->getContent()); ?></p>
        </div>
      </div>
    </div>
  </div>
</section>



<section>
  <div class="container">
    <div class="row mb-5">

      <div class="col-lg-12">
        <h4 class="font-weight-bold mb-3">Commentaires</h4>

        <?php
        foreach ($comments as $comment) {
          if ($comment->getValidate() === '1') {
        ?>

            <div class="bg-gray p-4 mb-4">
              <div class="media border-bottom py-2">
              <?php $userPicture = $comment->getUser()->getPicture(); ?>
                        <img height="80" src=<?= isset($userPicture) ? USER_PICTURE . $userPicture->getName() : USER_AVATAR ?> class="img-responsive" alt="<?="Une image de ".$comment->getUser()->getPseudo() ?>">
                <div class="media-body ml-5">
                  <h5 class="mt-0"><?= $comment->getUser()->getPseudo(); ?></h5>
                  <p><?= htmlentities($comment->getCreatedAt()); ?></p>
                  <p><?= $comment->getContent(); ?></p>
                </div>
              </div>
            </div>



          <?php
          }
        }

        if ($this->session->get('pseudo')) //si l'utilisateur est connecté avec un compte validé Alors on affiche le formulaire commentaire
        {
          ?>
          <h4>Laissez un commentaire</h4>
          <form method="post" action="<?=  SLUG . "addComment&postId=" . htmlentities($post->getId()); ?>" class="row">
            <div class="col-md-6">
              <input type="hidden" name="id" id="id" value="<?= $this->session->get('id'); ?> ">
              <input type="text" class="form-control mb-3" name="pseudo" id="pseudo" value="<?= $this->session->get('pseudo'); ?> " readonly>
            </div>
            <div class="col-md-6">
              <?php
              if (isset($errors['content'])) {
              ?>
                <div class="alert alert-danger" role="alert"><?= $errors['content']; ?></div>
              <?php
              }
              ?>
              <textarea name="content" id="content" placeholder="Message" class="form-control mb-4"></textarea>
              <input type="submit" class="btn btn-primary w-50" id="submit" value="Soumettre" name="submit" />
            </div>
          </form>
        <?php
        } else {
        ?>
          <h4 class="font-weight-bold mb-3 border-bottom pb-3">Merci de vous inscrire si vous souhaitez laisser un commentaire.</h4>
        <?php
        }
        ?>
      </div>
    </div>
  </div>
</section>