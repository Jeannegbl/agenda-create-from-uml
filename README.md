# agenda-create-from-uml

Projet de cours : [LEBIHAN Axel](https://github.com/Spyroxa) et [GABLIN Jeanne](https://github.com/Jeannegbl)

D'après le sujet [agenda-create-from-uml](https://gitlab.com/docusland-courses/uml/agenda-create-from-uml)

___

Ce projet utilise Symfony version 6.4.7 et est sous PHP 8.1.13

## Processus d'Installation

Pour installer et configurer le projet, suivez ces étapes:

1. **Installer Composer**: Si vous ne l'avez pas déjà fait, [téléchargez et installez Composer](https://getcomposer.org/download/).

2. **Installer Scoop**: Scoop est un gestionnaire de paquets pour Windows. Vous pouvez l'installer en suivant les instructions sur [le site officiel de Scoop](https://scoop.sh/).

3. **Installer Symfony CLI**: Symfony CLI est un outil qui facilite le développement avec Symfony. Vous pouvez l'installer en suivant les instructions disponibles sur [le site officiel de Symfony](https://symfony.com/download).

4. **Configuration de PHP**:
    - Allez dans le fichier `php.ini` de votre installation PHP.
    - Décommentez les lignes suivantes en enlevant le point-virgule au début de la ligne: `extension=pdo_sqlite` et `extension=sodium`.

5. **Installer les Dépendances du Projet**: Utilisez Composer pour installer les dépendances du projet:

   ```shell
   composer install
   ```

6. **Vérifier les Prérequis Symfony**: Exécutez la commande suivante pour vérifier si votre environnement remplit les prérequis nécessaires:

   ```shell
   symfony check:requirements
   ```

7. **Configuration de la Base de Données**:
    - Il faut avoir une base de données MySQL ou MariaDB
    - Ouvrez le fichier `.env` à la racine du projet.
    - Modifiez la variable `LOGIN` par votre nom d'utilisateur de base de données
    - Modifiez la variable `PASSWORD` par votre mot de passe
    - Modifiez la variable `DATABASE_URL` pour qu'elle pointe vers votre base de données :

      ```shell
      DATABASE_URL="mysql://LOGIN:PASSWORD@127.0.0.1:3306/DATABASE_URL?serverVersion=8.0.32&charset=utf8mb4"
      ```

8. **Créer la Base de Données**: Exécutez la commande suivante pour créer la base de données:

   ```shell
   php bin/console doctrine:database:create
   ```

9. **Exécuter les Migrations Doctrine**: Appliquez les migrations Doctrine pour mettre à jour le schéma de la base de données:

   ```shell
   php bin/console doctrine:migrations:migrate
   ```
