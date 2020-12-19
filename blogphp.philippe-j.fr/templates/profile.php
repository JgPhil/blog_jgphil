<?php $this->title = 'profile'; ?>

<!-- page title -->
<section class="page-title bg-primary position-relative">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <div class="col-lg-12 text-center">
          <div class="container row">
            <div class="col-lg-8 mx-auto">
              <?php
              if ($this->session->get('profile_message')) {
              ?>
                <h4 class="alert alert-success" role="alert"><?php print_r(htmlentities($this->session->show('profile_message'))) ?></h4>
              <?php
              }
              ?>
            </div>
          </div>
        </div>
        <h1 class="text-white font-tertiary">Profil</h1>
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
    <div class="row text-center">
      <div class="col-lg-8 mx-auto">



        <div class="row ">
          <div class="col-lg-12 ">
            <div class="row text-center">
              <div class="col-lg-12 ">
                <p><a href="../public/index.php"><i class="fas fa-long-arrow-alt-left"></i> Retour à l'accueil</a></p>
                <div class="col-lg-12 text-center bg-light border mt-2">
                  <div class="profile-userpic">
                    <?php $userPicture = $user->getPicture(); ?>
                    <img src=<?= isset($userPicture) ? USER_PICTURE . $user->getPicture()->getName() : USER_AVATAR ?> class="img-responsive" alt="<?= "Une image de " . $pseudo ?>">
                  </div>
                  <div class="row text-center mt-2">
                    <div class="col-lg-12 text-center ">
                      <a class="btn btn-primary btn-xs" href="<?= INDEX_PATH . SLUG . "update_user_picture&userId=" . htmlentities($user->getId()) ?>">Changer mon image</a>
                    </div>
                  </div>
                  <h3><b><?= htmlentities($this->session->get('pseudo')); ?></b></h3>
                </div>
                <div class="col-lg-12 text-center bg-light border mt-2">
                  <div class="col-lg-12 text-center">
                    <h4>Rôle: <b><?= htmlentities($this->session->get('role')); ?></b></h4>
                  </div>
                  <div class="col-lg-12 text-center">
                    <h4> Membre depuis le : <?= htmlentities($user->getCreatedAt()); ?></h4>
                  </div>
                </div>
              </div>
            </div>





            <?php
            if ($this->session->get('update_password')) {
            ?>
              <h4 class="alert alert-success text-center" role="alert"><?= htmlentities($this->session->show('update_password')) . ' <b>' . htmlentities($this->session->get('pseudo')) . '</b>'; ?></h4>
            <?php
            }
            ?>
          </div>
        </div>
        <div class="row text-center ">
          <div class="col-lg-12 text-center ">
            <a class="btn btn-primary btn-xs" href="../public/index.php?route=updatePassword">Changer mot de passe</a>
            <a class="btn btn-danger btn-xs" href="../public/index.php?route=desactivateAccount&pseudo=<?= htmlentities($this->session->get('pseudo')) ?>" onclick="return confirm('êtes-vous sûr de vouloir supprimer votre compte ?')">Supprimer mon compte</a>
          </div>
        </div>
        <div class="text-center mt-5">
          <h3 class="bg-light border mt-2">Mes commentaires</h3>
          <div class="card">
            <?php
            if ($comments) {
              foreach ($comments as $comment) {
            ?>
                <div class="card">
                  <div class="card-body">
                    <h5>Posté le <?= htmlentities($comment->getCreatedAt()) ?> dans l'article <?= $comment->getPost()->getTitle() ?></h5>
                    <p><?= $comment->getContent(); ?></p>
                  </div>
                </div>
              <?php
              }
            } else {
              ?>
              <div class="card">
                <div class="card-body">
                  <h5>Rien pour le moment</h5>
                </div>
              </div>
            <?php
            }
            ?>
          </div>
        </div>
        <div class="text-center mt-5">
          <h3 class="bg-light border mt-2">Mes articles </h3>
          <div class="card">
            <?php
            if ($posts) {
              foreach ($posts as $post) {
            ?>
                <div class="card">
                  <div class="card-body mb-4">
                    <h4> Date: <?= htmlspecialchars($post->getLastUpdate()) ?></h4>
                    <h3><a href="../public/index.php?route=post&postId=<?php print_r(htmlspecialchars($post->getId())); ?>"><?= htmlspecialchars($post->getTitle()); ?></a></h3>
                  </div>
                </div>
              <?php
              }
            } else {
              ?>
              <div class="card">
                <div class="card-body">
                  <h5>Rien pour le moment</h5>
                </div>
              </div>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>