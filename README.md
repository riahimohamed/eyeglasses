# eyeglasses_beta

Projet d'opticien en ligne spécialiste de votre santé visuelle

Pour installer les différents packages nécessaire au fonctionnement de l'application commande:
$ composer install

Pour céer la base de donnée commande:
$ php bin/console doctrine:database:create

Creation les entities de base et la migration:
$ php bin/console make:migration
$php bin/console doctrine:migration:migrate

Lancez le serveur :
$ php bin/console server:run

Pour accèder à l'administration, aller sur '/secret_admin',

mais avant ça il faut changer le controller src/Controller/SecurityController
au niveau de ligne :

 1- $user->setRoles(['ROLE_USER']);
 Par
 2- $user->setRoles(['ROLE_ADMIN']);
 
 3- Maintenant céer votre compte
 4- Modifier maintenant $user->setRoles(['ROLE_USER']);
