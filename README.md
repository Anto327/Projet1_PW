# Création du projet Symfony

### Créer le squelette de l'application

```
symfony new nom_du_projet --webapp
```

### Configurer le chemin d'accès à la BD dans le fichier `.env`

```
DATABASE_URL="mysql://root:@127.0.0.1:3306/projetpw2?serverVersion=8.0.32&charset=utf8mb4"
```

### Créer l'entité pour les utilisateurs pouvant se connecter (Educateur):

```
php bin/console make:user
```

NB: Le nom de la classe faisant office d'utilisateur sera alors `Educateur`. Ensuite il faut répondre aux questions.

### Créer les entités en répondant aux questions de la commande:

```
php bin/console make:entity
```

NB: Pour rajouter des relations comme Catégorie -> Licencié il faut précisé comme type `relation`. Il faut aussi penser à mettre à jour l'entité Educateur qui aura été générée à l'étape précédente. La mise à jour se fait aussi avec la commande `make:entity`

### Créer la base de données

```
php bin/console doctrine:database:create
```

### Créer les migrations à partir des entités

```
php bin/console doctrine:migrations:diff
```

### Exécuter les migrations

```
php bin/console doctrine:migrations:migrate
```

### Configurer le système d'authentification

```
php bin/console make:auth
```

### Ajouter les règles de contrôle d'accès dans security.yaml

Dans la partie access_control du fichier `security.yaml`

### Installer le package des fixtures pour créer un admin par défaut

```
composer require --dev orm-fixtures
composer require --dev doctrine/doctrine-fixtures-bundle
```

### Compléter le code dans App\DataFixtures\AppFixtures

Rajouter du code dans la fonction `load()` pour créer un 1er admin en base de données afin de pouvoir se connecter.

### Exécuter les fixtures pour charger l'admin par défaut en base

```
php bin/console doctrine:fixtures:load
```

### Créer un CRUD pour chaque entité

```
php bin/console make:crud Categorie
php bin/console make:crud Licencie
php bin/console make:crud Educateur
php bin/console make:crud Contact
php bin/console make:crud MailEtu
php bin/console make:crud MailContact
```
