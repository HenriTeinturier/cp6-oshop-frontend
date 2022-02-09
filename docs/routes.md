# Routes

## Sprint 1

| URL | HTTP Method | Controller | Method | Title | Content | Comment |
|--|--|--|--|--|--|--|
| `/` | `GET` | `MainController` | `homeAction` | Dans les shoe | 5 categories | - |
| `/about` | `GET` | `MainController` | `aboutAction` | A propos | About our shop| - |
| `/mentions-legales` | `GET` | `MainController` | `legalMentionsAction` | Mention légales | Terms and Conditions | - |
| `/catalogue/categorie/[id]` | `GET` | `CatalogController` | `categoriesAction` | Produits de la catégorie n°[id] | Products attached to a category | [id] represents the category's id |
| `/catalogue/type/[id]` | `GET` | `CatalogController` | `typeAction` | Produits du type n°[id] | Products attached to a type | [id] represents the type's id |
| `/catalogue/marque/[id]` | `GET` | `CatalogController` | `brandAction` | Produits de la marque n°[id] | Products attached to a brand | [id] represents the brand's id |
| `/catalogue/produit/[id]` | `GET` | `CatalogController` | `productAction` | Nom du produit | Product's details| [id] represents the product's id |
