<?php $this->title = "Confirmation"; ?>


<!-- page title -->
<section class="page-title bg-primary position-relative">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="text-white font-tertiary">Enregistrement</h1>
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

<!-- register -->
<section class="section " data-background="images/backgrounds/bg-dots.png">
  <div class="container">
    <div class="row">
        <div>
          <p><a href="/" ><i class="fas fa-long-arrow-alt-left"></i>  Retour à l'accueil</a></p>
        </div>
        <div class="col-lg-8 mx-auto">
            <div class="bg-white rounded text-center p-5 shadow-down">
            <h4 class="mb-80"><b><?= htmlentities($this->session->show('message'));?></b> </h4>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /contact -->