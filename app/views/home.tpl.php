

<section>

    <div class="container-fluid">

     
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
              </div>
            </div>
          </div>
        </div>

        <?php endfor ?>

      </div>

      <div class="row mx-0">
          <!-- 3 images plus petites -->
          <?php $image = 1; 
        foreach ($categorys as $category): ?>
          
        <!-- 3 petites images -->
        <?php for ( $index=2; $index <=4; $index ++) : ?>
          <?php $categorie = $categories[$index]; ?>
        <div class="col-lg-4">
          <div class="card border-0 text-center text-white"><img src="<?= $absoluteUrl . "/". $categorie->getPicture() ?>"
              alt="Card image" class="card-img">
            <div class="card-img-overlay d-flex align-items-center">
              <div class="w-100">
                <h2 class="display-4 mb-4"><?= $categorie -> getName() ?></h2></h2><a href="<?= $router->generate('page-category', ['id' => $categorie->getId()])  ?>" class="btn btn-link text-white"><?= $categorie -> getSubtitle() ?>
                  <i class="fa-arrow-right fa ml-2"></i></a>
              </div>
            </div>
          </div>
        </div>
        <?php endfor ?>

        
        
        
            
        <!-- fin des 3 peites images -->
      </div>
      <?php endfor ?>

      
      
      
    </div>
<<<<<<< HEAD

=======
  </div>
>>>>>>> e06-atelier-solo
  </section>
