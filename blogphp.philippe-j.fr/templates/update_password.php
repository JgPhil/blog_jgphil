<?php $this->title = 'Modifier mot mot de passe'; ?>

<!-- page title -->
<section class="page-title bg-primary position-relative">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h2 class="text-white font-tertiary">Modifier mon mot de passe</h2>
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
  <div class="row">
    <div class="container">

      <div class="col-lg-4">
        <p><a href='/'><i class="fas fa-long-arrow-alt-left"></i> Retour à l'accueil</a></p>
      </div>
      <div class="col-md-4">
        <?php
        if (null !== $this->session->get('error_login')) {
        ?>
          <div class="alert alert-danger" role="alert"><?= $this->session->show('error_login'); ?></div>
        <?php
        }
        ?>
      </div>
      <form method="post" action="../public/index.php?route=updatePassword">
        <div class="form-group">

          <label for="password">Mot de passe</label><br>
          <input type="password" class="form-control" id="password" name="password"><br>
          <?php
          if (isset($errors['password'])) {
          ?>
            <div class="alert alert-danger" role="alert"><?= $errors['password']; ?></div>
          <?php
          }
          ?>
          <input type="submit" class="btn btn-primary" value="Metttre à jour" id="submit" name="submit">
        </div>
      </form>
    </div>
  </div>
</div>
</div>
<div>



</div>