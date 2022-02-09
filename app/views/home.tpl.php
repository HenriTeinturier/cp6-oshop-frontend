

<section>

    <div class="container-fluid">

<<<<<<< HEAD
     
      <div class="row mx-0">

        <!-- 2 grandes images -->
        <?php for ( $index=0; $index <=1; $index ++) : ?>
            <?php $categorie = $categories[$index]; ?>
        <div class="col-md-6">
          <div class="card border-0 text-white text-center"><img src="<?= $absoluteUrl . "/". $categorie->getPicture() ?>"
              alt="Card image" class="card-img">
            <div class="card-img-overlay d-flex align-items-center">
              <div class="w-100 py-3">
                <h2 class="display-3 font-weight-bold mb-4"><?= $categorie -> getName() ?></h2><a href="<?= $router->generate('page-category', ['id' => $categorie->getId()])  ?>" class="btn btn-light"><?= $categorie -> getSubtitle() ?></a>
=======
      <!-- // 1ere ligne -->
      <div class="row mx-0">   
        <!-- 2 grandes migaes -->
        <?php $image = 1; 
        foreach ($categorys as $category):
          
          if ($image < 3):
          ?>

        <div class="col-md-6">
          <div class="card border-0 text-white text-center"><img src="<?= $absoluteUrl . "/". $category->getPicture() ?>"
              alt="Card image" class="card-img">
            <div class="card-img-overlay d-flex align-items-center">
              <div class="w-100 py-3">
                <h2 class="display-3 font-weight-bold mb-4"><?= $category->getName() ;?></h2><a href="<?= $router->generate('page-category', ['id' => $category->getId()])  ?>" class="btn btn-light"><?= $category->getSubtitle(); ?></a>
>>>>>>> e06-atelier-solo
              </div>
            </div>
          </div>
        </div>
<<<<<<< HEAD

        <?php endfor ?>

      </div>

=======
        <?php endif; ?>
            <?php  $image++ ?>
        <?php endforeach; ?>
        <!-- fin 2 grandes images -->
      </div>

      <!--  2eme ligne -->
>>>>>>> e06-atelier-solo
      <div class="row mx-0">
          <!-- 3 images plus petites -->
          <?php $image = 1; 
        foreach ($categorys as $category):
          
<<<<<<< HEAD
        <!-- 3 petites images -->
        <?php for ( $index=2; $index <=4; $index ++) : ?>
          <?php $categorie = $categories[$index]; ?>
        <div class="col-lg-4">
          <div class="card border-0 text-center text-white"><img src="<?= $absoluteUrl . "/". $categorie->getPicture() ?>"
              alt="Card image" class="card-img">
            <div class="card-img-overlay d-flex align-items-center">
              <div class="w-100">
                <h2 class="display-4 mb-4"><?= $categorie -> getName() ?></h2></h2><a href="<?= $router->generate('page-category', ['id' => $categorie->getId()])  ?>" class="btn btn-link text-white"><?= $categorie -> getSubtitle() ?>
=======
          if ($image >= 3):
          ?>

        <div class="col-lg-4">
          <div class="card border-0 text-center text-white"><img src="<?= $absoluteUrl . "/". $category->getPicture() ?>"
              alt="Card image" class="card-img">
            <div class="card-img-overlay d-flex align-items-center">
              <div class="w-100">
                <h2 class="display-4 mb-4"><?= $category->getName() ;?></h2><a href="<?= $router->generate('page-category', ['id' => $category->getId()])  ?>" class="btn btn-link text-white"><?= $category->getSubtitle(); ?>
>>>>>>> e06-atelier-solo
                  <i class="fa-arrow-right fa ml-2"></i></a>
              </div>
            </div>
          </div>
        </div>
<<<<<<< HEAD
        <?php endfor ?>

        
        
=======

        <?php endif; ?>
            <?php  $image++ ?>
        <?php endforeach; ?>
>>>>>>> e06-atelier-solo
        
            
        <!-- fin des 3 peites images -->
      </div>
    </div>

  </section>
