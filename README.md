# Contact Manager

Un système de gestion de contacts

## Lancer le projet


Ces instructions vous permettrons de copier le projet et de le démarrer sur vos machine en local pour un but de développement ou tests. Lisez la partie sur le déploiement pour savoir comment mettre en place le projet.

### Prérequis

- Un serveur web
- Git

```
(Apache, Nginx, etc)
```

### Installation

Cloner le projet

```
composer install
```

Vous devriez lancez les fixtures ou vous connecter à la page /registration

```
php bin/console doctrine:fixtures:load
```

Vous pouvez jouer les migrations avec 
```
php bin/console doctrine:migrations:migrate
```

Le fichier SQL est sous :

```
src/Migrations/contact_manager.sql
```

## Lancement des tests

Le test unitaire sur la validation d'email est juste théorique, vue que la validation a été effectuée au niveau des asserts

## Construit avec

* [Symfony](https://symfony.com/) - Le framework utilisé

Faute de temps et par soucis de bien faire. 

Pour la classe abstraite j'ai utilisé AbstractController et l'interface UserInterface ont été utilisé. 

Un poc incomplet en PHP natif pourrait être présenté

```
Rajouts de classes: Request et Response
classe Dispatcher 
classe Router
etc ... 
```

## Contributions

??

## Versioning

We use [Git](https://git-scm.com//) for versioning. 

## Auteurs

* **Walid Mahmoud** - *Web developer PHP /Symfony* - [Tchisuky](https://github.com/MonPetitAnge)

See also the list of [contributors](https://github.com/your/project/contributors) who participated in this project.

## License

??