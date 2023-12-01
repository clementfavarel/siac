# SAE 5.1 - Salon International de l'Art Contemporain

## Description

### [Le SIAC](https://siac-marseille.fr/)

Le SIAC se déroule au Parc Chanot à Marseille du 15 au 18 Mars.

Le SIAC c'est :

La présentation d’œuvres par les artistes eux-mêmes, tous professionnels, et non par des galeristes
Une exposition personnelle pour chacun des artistes sur des stands individuels
La présence permanente durant le salon de chacun des exposants, seuls interlocuteurs des visiteurs.
Une atmosphère unique, des œuvres originales accessibles, des artistes en direct, sont les ingrédients de ce cocktail dédié à la création.

### L'application

L'application permet de visualiser les artistes présents au salon.
Elle se présente sous plusieurs onglets :

-   **Landing Page** : page d'accueil de l'application. Elle permet de visualiser les informations de présentation du salon et de se connecter à l'application.

-   **Authentification** : permet de se connecter à l'application. Si l'utilisateur n'a pas de compte, il peut s'inscrire.

-   **Tutoriel** : Pop-up qui s'affiche lors de la première connexion à l'application. Il permet de visualiser les fonctionnalités de l'application.

-   **Plan** : permet de visualiser le plan du salon et de voir les emplacements des artistes. Si un emplacement est cliqué, un pop-up d'information apparait à l'écran et affiche les informations de l'oeuvre et de l'artiste sous différentes formes : ambiance sonore, interview, photos, etc.

-   **Oeuvres** : permet de visualiser les oeuvres présentes au salon. Si une oeuvre est cliquée, un pop-up d'information apparait à l'écran et quelques informations de l'oeuvre sous différentes formes : ambiance sonore, interview, photos, etc. Un bouton "Voir plus" permet de visualiser l'oeuvre et toutes ses informations.

-   **Artistes** : permet de visualiser les artistes présents au salon. Si sur la page oeuvre le nom d'un artiste est cliqué, on arrive sur la page artiste et on peut visualiser les informations de l'artiste (biographie, oeuvres, etc.).

-   **Scanner** : permet de scanner les QR Codes présents sur les stands et de visualiser les informations de l'oeuvre et de l'artiste avec une animation en Réalité Augmentée.

-   **Profil** : permet de visualiser les informations de l'utilisateur connecté.

## Version

Version 1.0

Docker Container : [clementfavarel/siac](https://hub.docker.com/repository/docker/clementfavarel/siac)

## Installation

### Prérequis (+ Version utilisée)

-   Docker (version 24.0.7 utilisée)
-   docker-compose 1.29.2 (version 1.29.2 utilisée)

### Installation

1. Cloner le dépôt git
    ```sh
    git clone https://github.com/clementfavarel/siac.git
    ```
    ou
    ```sh
    git clone git@github.com:clementfavarel/siac.git
    ```
2. Importer le fichier `src/database/dumps/dump.sql` dans le serveur MySQL/MariaDB
3. Créez une copie du fichier `src/database/config/config.sample.php` et nommez la `config.php`. Ensuite, configurez la connexion à la base de données dans le fichier `src/database/config/config.php` en modifiant les variables de connexion
4. Configurez votre serveur web pour qu'il utilise le dossier `src/` comme dossier racine
5. Lancez votre serveur web et dirigez vous vers l'URL du site

## Utilisation

**Start Docker Container**

```sh
sudo docker compose up
```

[Lien vers le wiki](https://github.com/clementfavarel/siac/wiki)
