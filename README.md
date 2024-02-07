
## POURQUOI BLS

BLS(BANK LEGAL SOFT) est un projet de gestion des services juridiques de la Banque

## Development Technology

- PHP
- Laravel Framework

## Execution Procedure

Accéder au projet
```bash
$ git clone https://github.com/joelppj/BLS_API.git
$ cd BLS_API

```
Installer les dépendances
```bash

==== INSATALLATION DES DEPENDANCES  ============
composer require laravel/passport
composer require barryvdh/laravel-dompdf


```
Configuration de la base de donnée
```bash

==== DB CONFIGURATION  ============
    ==> Créer une base de donnée
    ==> Allez dans le fichier .env puis renseigner les coordonnées de votre DB que vous venez de créer

```
Migration des data par defaut dans la DB
```bash

==== DB migration  ============
    Tapez::
    ==> $ php artisan migrate --seed(pour migrer les factories par defaut)
```
Démarrer le serveur en développement
```bash

==== DEMARRAGE REEL DU PROJET ============
$ php artisan passport:install
$ php artisan serve
```
Acceder au Projet par :http://127.0.0.1:8000

## CONSOMMATION DE L'API & UTILISATION DES ROUTES


## TEST DE L'API

