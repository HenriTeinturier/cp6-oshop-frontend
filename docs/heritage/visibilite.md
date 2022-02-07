# Visibilité

Il existe trois types de visibilité 

## Public

Les propriétés et méthodes sont accessbiles **depuis n'importe où dans le code** (extérieur comme intérieur de la classe)

## Private

On bloque l'accès aux propriétés depuis l'extérieur de la classe. **On y a accès que depuis l'intérieur (donc les méthodes)**.

## Nouveau : protected

**Protected** agit exactement comme **private** mais les propriétés/méthodes **protected** sont aussi accessibles depuis **l'intérieur des classes enfants**.


Métaphore : 

- En *public*, n'importe qui peut rentrer chez nous
- En *private*, seuls les habitants (donc qui possèdent la clé) peuvent entrer
- En *protected*, pareil qu'en *private* mais on a donné un double des clés aux enfants.