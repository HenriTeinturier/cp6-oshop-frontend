# Requetes SQL

## Récupération de la liste des catégories sur la page d'accueil

```sql
SELECT * FROM `category` WHERE `home_order` > 0 ORDER BY `home_order` ASC LIMIT 5
```

## Récupération de la liste des types pour le footer

```sql
SELECT * FROM `type` WHERE `footer_order` > 0 ORDER BY `footer_order` ASC LIMIT 5

```

## Récupération de la liste des brand pour le footer

```sql
SELECT * FROM `brand` WHERE `footer_order` > 0 ORDER BY `footer_order` ASC LIMIT 5
```

## Récupération des produits qui appartiennent à une catégorie donnée

```sql
SELECT * FROM `product` WHERE `category_id` = "$ID de la catégorie"

```

## Récupérer le nom d'une catégorie pour l'afficher dans le titre de la page

```sql
SELECT * FROM `category` WHERE  `id` = "$id de la categorie"
```

## Récupérer des produits pour une catégorie donnée avec le nom du type pour chaque produit

```sql
SELECT 
`product`.* , 
`type`.`name` AS `type_name` 
FROM `product`
INNER JOIN `type`
ON `type`.`id` = `product`.`type_id`
WHERE  `category_id` = 1
```

## Récupération de la catégorie pour l'afficher dans le titre de la page

```sql
SELECT * FROM `category`
WHERE `id` = "ID de la catégorie (à remplacer)"
```
