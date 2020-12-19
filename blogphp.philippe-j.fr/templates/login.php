<?php $this->title = "login"; ?>


<!-- page title -->
<section class="page-title bg-primary position-relative">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="text-white font-tertiary">Connexion</h1>
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



<div class="section">
  <div class="row ">
    <div class="container ">
      <div class="col-lg-4">
        <p><a href='/'><i class="fas fa-long-arrow-alt-left"></i> Retour à l'accueil</a></p>
      </div>
      <div class="col-md-4">
        <?php
        if (null !== $this->session->get('error_login')) {
        ?>
          <div class="alert alert-danger" role="alert"><?= htmlentities($this->session->show('error_login')); ?></div>
        <?php
        }
        ?>
      </div>
      <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
          <form method="post" action="?route=login">
            <div class="form-group">
              <label for="pseudo">Pseudo</label><br>
              <input type="text" class="form-control" id="pseudo" name="pseudo"><br>
              <label for="password">Mot de passe</label><br>
              <input type="password" class="form-control" id="password" name="password"><br>
              <input type="submit" class="btn btn-primary" value="Connexion" id="submit" name="submit">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<div>



</div>