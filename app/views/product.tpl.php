<section class="hero">
    <div class="container">
      <!-- Breadcrumbs -->
      <ol class="breadcrumb justify-content-center">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Détente</li>
      </ol>
    </div>
  </section>

  <section class="products-grid">
    <div class="container-fluid">

      <div class="row">
        <!-- product-->
        <div class="col-lg-6 col-sm-12">
          <div class="product-image">
            <a href="detail.html" class="product-hover-overlay-link">
              <img src="<?= $absoluteUrl . "/". $product->getPicture() ?>" alt="product" class="img-fluid">
            </a>
          </div>
        </div>

        <?php

          // On a besoin d'une variable qui représente le produit. On l'extrait depuis le tableau $viewData
          //! Plus besoin de cette ligne grace à l'extract dans la méthode show
          // $product = $viewData['product'];
          
          $brand_id = $product->getBrand_id(); // recupère le brand_id du produit
          $brand = new App\Models\Brand;  // créer un objet marque
          $brandObjet = $brand->find($brand_id);  // on va chercher la marque correspondant au brand_id du produit
          $brandName = $brandObjet->getName(); // on recupère le nom de la marque
          
          


          // dump($product);
        ?>
        <div class="col-lg-6 col-sm-12">
          <div class="mb-3">
            <h3 class="h3 text-uppercase mb-1"><?= $product->getName() ?></h3>
            <div class="text-muted">by <em><?= $brandName ?></em></div>
            <div>
              <?php  $productRate = $product->getRate();
              for ($etoile = 1; $etoile < 6; $etoile++):  
                if ($etoile <= $productRate):?>
                    <i class="fa fa-star"></i>
                <?php else: ?>
                  <i class="fa fa-star-o"></i>
              
              

              <?php endif ?>
                <?php endfor ?>
              
            </div>
          </div>
          <div class="my-2">
            <div class="text-muted"><span class="h4"><?= $product->getPrice() ?></span> TTC</div>
          </div>
          <div class="product-action-buttons">
            <form action="" method="post">
              <input type="hidden" name="product_id" value="1">
              <button class="btn btn-dark btn-buy"><i class="fa fa-shopping-cart"></i><span class="btn-buy-label ml-2">Ajouter au panier</span></button>
            </form>
          </div>
          <div class="mt-5">
            <p>
              <?= $product->getDescription() ?>
            </p>
          </div>
        </div>
        <!-- /product-->
      </div>
      
    </div>
  </section>