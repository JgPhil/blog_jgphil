<?php

$this->title="Contact"; ?>



<!-- page title -->
<section class="page-title bg-primary position-relative">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="text-white font-tertiary">Contact</h1>
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

<!-- contact -->
<section class="section section-on-footer" data-background="images/backgrounds/bg-dots.png">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h3 class="section-title"> Envie d'en savoir plus?</h3>
      </div>
      <div class="col-lg-8 mx-auto">
        <div class="bg-white rounded text-center p-5 shadow-down">
          <h4 class="mb-80">Formulaire de contact</h4>
          <form method="post" action="../public/index.php?route=contact" class="row">
            <div class="col-md-6">
              <input type="text" id="name" name="name" placeholder="Votre nom" class="form-control px-0 mb-4">
              <?php
                if (isset($errors['name']))
                {
                ?>    
                    <div class="alert alert-danger" role="alert"><?= htmlentities($errors['name']); ?></div>
                <?php    
                }
                ?> 
            </div>
            <div class="col-md-6">
              <input type="email" id="email" name="email" placeholder="Votre  email" class="form-control px-0 mb-4">
              <?php
                if (isset($errors['email']))
                {
                ?>    
                    <div class="alert alert-danger" role="alert"><?= htmlentities($errors['email']); ?></div>
                <?php    
                }
                ?> 
            </div>
            <div class="col-12">
              <input name="phone" id="phone" class="form-control px-0 mb-4"
                placeholder="Entrez votre numéro de tétéphone (optionnel)">
                <?php
                if (isset($errors['phone']))
                {
                ?>    
                    <div class="alert alert-danger" role="alert"><?= htmlentities($errors['phone']); ?></div>
                <?php    
                }
                ?> 
            </div>
            <div class="col-12">
              <textarea name="message" id="message" class="form-control px-0 mb-4"
                placeholder="Entrez votre message"></textarea>
                <?php
                if (isset($errors['message']))
                {
                ?>    
                    <div class="alert alert-danger" role="alert"><?= htmlentities($errors['message']); ?></div>
                <?php    
                }
                ?> 
            </div>
            <div class="col-lg-6 col-10 mx-auto">
            <input type="submit" class="btn btn-primary" value="Envoyer" id="submit" name="submit">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /contact -->