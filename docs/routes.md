# Routes

## Sprint 1

| URL | HTTP Method | Controller | Method | Title | Content | Comment |
|--|--|--|--|--|--|--|
| `/` | `GET` | `MainController` | `home` | Dans les shoe | 5 categorys | home page |
| `/mentions-legales` | `GET` | `MainController` | `mentionsLegales` | Mentions légales | Mentions légales | Mentions légales |
| `/about` | `GET` | `MainController` | `aboutAction` | A propos | About our shop| - |
| `/catalogue/categorie/[i:id]` | `GET` | `CatalogController` | `categoriesAction` | Catégories | page catégory | [id] is an integer |
| `/catalogue/type/[i:id]` | `GET` | `CatalogController` | `typeAction` | Types | page type | [id] is an integer |
| `/catalogue/brand/[i:id]` | `GET` | `CatalogController` | `brandAction` | Marques | page Brand | [id] is an integer |
| `/catalogue/product/[i:id]` | `GET` | `CatalogController` | `productAction` | Produit | page product | [id] is an integer |