# PokéWeb
Réalisé par **Tom CHEDMAIL**, pour l'UE de **Développement Web** au sein de la **Licence 3 Informatique** de l'**Université d'Angers**.

## Exécution
Vous trouverez le code source de cette application dans le dossier [`src/`](src/). Celui-ci doit être placé à la racine d'un serveur web (tel que `/var/www/html` pour un serveur Apache2 sous Debian).

### Docker
Pour plus de simplicité, un environnement Docker est fourni. Ouvrez un terminal dans le dossier où se situe le fichier [`docker-compose.yml`](docker-compose.yml), et effectuez les commandes suivantes :
```bash
# -- Démarrer -- #
docker-compose build
docker-compose up -d --remove-orphans

# -- Arrêter -- #
docker-compose down
```

Vous trouverez le site sur [`http://localhost:8080`](http://localhost:8080) et phpMyAdmin sur [`http://localhost:8081`](http://localhost:8081).

### Base de données
> **Note:** Si vous n'utilisez pas Docker, veuillez modifier les constantes dans [`src/Utils/Database.php`](./src/Utils/Database.php) pour y mettre votre combo nom d'utilisateur/mot de passe ainsi que l'adresse de l'hôte hébergeant votre serveur MySQL/MariaDB.

Pour fonctionner, ce site nécessite une base de données (par défaut nommée `pokemon`), vous pouvez importer [`pokemon_simple_type.sql`](pokemon_simple_type.sql) en vous connectant à phpMyAdmin avec les identifiants suivant (sous Docker) :
- Login : `root`
- Mot de passe : `password`

## Étapes
### Partie 1 : Mise en place
Voici une explication de l’arborescence du projet :
- [`src/`](src/) : Code source de l'application.
  - [`Controllers/`](src/Controllers) : Contient le code pour les contrôleurs.
    - [`IController.php`](src/Controllers/IController.php) : Interface de base pour un contrôleur.
  - [`Models/`](src/Models) : Contient le code pour les modèles.
    - [`IModel.php`](src/Models/IModel.php) : Interface de base pour un modèle.
  - [`public/`](src/public) : Contient les ressources publiques.
  - [`Utils/`](src/Utils) : Contient le code pour les classes utilitaires.
  - [`Views/`](src/Views) : Contient le code pour les vues.
    - [`IView.php`](src/Views/IView.php) : Interface de base pour une vue.
    - [`Template.php`](src/Views/Template.php) : Gabarit.
  - [`routes.php`](src/routes.php) : Contient l'association entre nom de route et les contrôleurs associés.
  - [`index.php`](src/index.php) : Point d'entrée de l'application.

L'application utilise donc un modèle objet dès que possible, en utilisant les fonctionnalités de l'autoloader pour identifier les fichiers PHP qui correspondent à chaque classe (défini dans [`src/index.php`](src/index.php)). Cette organisation a été lourdement inspirée de [Symfony](https://symfony.com/), framework avec lequel j'ai un petit peu d'expérience.

À cette étape, aucune librairie n'a été utilisée.

### Partie 2 : Historisation et XML
J'utilise l'API `DOMDocument` pour l'écriture au sein du fichier XML, cependant elle est assez impraticable pour naviguer à travers l’arborescence DOM, donc lors de la consultation du fichier j'utilise l'API SimpleXML.

J'ai également profité pour faire des changements esthétiques au site, notamment l'ajout d'un GIF sur la page d'accueil, le header qui reste bloqué en haut de la fenêtre et le header qui est transparent avec un effet de flou quand il y a du contenu derrière.

À cette étape, aucune librairie n'a été utilisée.

> **Important** : En cas de problème de lecture/écriture du fichier d'historisation situé dans [`src/log.xml`](src/log.xml), vérifiez les permissions de ce dernier.

### Partie 3 : AJAX
J'ai ajouté une API avec deux endpoints :
- `getTypes` : Renvoie la liste des types.
- `getPokemonsByType` : Renvoie la liste des Pokémons qui correspondent au type donné à l'argument GET `id`.

Ces deux endpoints renvoient une réponse en JSON. Ils sont situés au niveau du contrôleur `api` ([`APIController.php`](src/Controllers/APIController.php)).

À cette étape, aucune librairie n'a été utilisée.