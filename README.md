# Création du projet Symfony
### 1. Créer le squelette de l'application

```
symfony new nom_du_projet --webapp
```
### 2. Configurer le chemin d'accès à la BD dans le fichier `.env`

```
DATABASE_URL=
```
### 3. Créer les entités en répondant aux questions de la commande:

```
php bin/console make:entity
```
NB: Pour rajouter des relations comme Catégorie -> Licencié il faut précisé comme type `relation`

# Lancement du projet Symfony

## Etapes

- Créer la base de données

```
php bin/console doctrine:database:create
```
