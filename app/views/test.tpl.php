

  <section class="hero">
    <div class="container">
      <!-- Breadcrumbs -->
      <ol class="breadcrumb justify-content-center">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Détente</li>
      </ol>
      <!-- Hero Content-->
      <div class="hero-content pb-5 text-center">
        <h1 class="hero-heading">Test</h1>
        <div class="row">
          <div class="col-xl-8 offset-xl-2">
            <p class="lead text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
              incididunt.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <table class="demo">
	
	<thead>
	<tr>
		<th>Marques</th>
		<th>Types</th>
		<th>Categories</th>
    <th>Nom & Prenom category 1</th>
    <th>NbetIDFromCategory</th>
	</tr>
	</thead>
	<tbody>
	<tr>
		<td>
      <?php
        $marque = $viewData['marque'];
        echo "une marque selectionné par son id<br>";
        echo $marque->getName()."<br><br>";
      
        $marques = $viewData['marques'];
        echo "toutes les marques:<br>";
        foreach ($marques as $id => $marqueObject):
          echo $marqueObject->getName()."<br>";
        endforeach;
      ?> 
    </td>
		<td>
      <?php 
        $type = $viewData['type'];
        echo "un type selectionné par son id<br>";
        echo $type->getName()."<br><br>";

        $types = $viewData['types'];
        echo "tous les types:<br>";
        foreach ($types as $id => $typeObject):
          echo $typeObject->getName()."<br>";
        endforeach;
      ?>
    </td>
		<td>
      <?php 
        $category = $viewData['category'];
        echo "une category selectionné par son id<br>";
        echo $category->getName()."<br><br>";

        $categorys = $viewData['categorys'];
        echo "toutes les categories:<br>";
        foreach ($categorys as $id => $categoryObject):
          echo $categoryObject->getName()."<br>";
        endforeach;
      ?>  
    </td>
    <td>
      <?php 
        

        $productsTri = $viewData['productsTri'];
        echo "Mega Bonus:tous  nom et prenom de la categorie 1 <br>";
        foreach ($productsTri as $id => $productsTriObject):
          echo $productsTriObject->getName()." ".$productsTriObject->getPrice()." ".$productsTriObject->category_name."<br>";
          
        endforeach;
      ?>  
    </td>
    <td>
      <?php 
        

        $NbetIDFromCategory = $viewData['NbetIDFromCategory'];
        echo "Mega Bonus 2 : Nbr de produits pôur chaque catégorie<br>";
        foreach ($NbetIDFromCategory as $id => $NbetIDFromCategoryObject):
          echo "nb: ".$NbetIDFromCategoryObject->nb." id: ".$NbetIDFromCategoryObject->getId()." categorie: ".$NbetIDFromCategoryObject->category_name."<br>";
          
        endforeach;
      ?>  
    </td>
	</tr>
	</tbody>
</table>





 