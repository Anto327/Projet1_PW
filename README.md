# Création du projet Symfony

### 1. Créer le squelette de l'application

```
symfony new nom_du_projet --webapp
```

### 2. Configurer le chemin d'accès à la BD dans le fichier `.env`

```
DATABASE_URL="mysql://root:@127.0.0.1:3306/projetpw2?serverVersion=8.0.32&charset=utf8mb4"
```

### 3. Créer les entités en répondant aux questions de la commande:

```
php bin/console make:entity
```

NB: Pour rajouter des relations comme Catégorie -> Licencié il faut précisé comme type `relation`

### 4. Créer la base de données

```
php bin/console doctrine:database:create
```

### 5. Créer les migrations à partir des entités

```
php bin/console doctrine:migrations:diff
```

### 6. Exécuter les migrations

```
php bin/console doctrine:migrations:migrate
```

### 7. Créer un CRUD pour chaque entité

```
php bin/console make:crud Categorie
php bin/console make:crud Licencie
php bin/console make:crud Educateur
php bin/console make:crud Contact
php bin/console make:crud MailEtu
php bin/console make:crud MailContact
```
