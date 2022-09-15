# Sandrine Coupart - Diététicienne Nutritionniste

https://sandrine-coupart-dieteticienne.herokuapp.com/

# 1. Deployer le projet symfony en local

Pour déployer l'application web sur votre ordinateur, il vous faut cloner le projet via git ou le télécharger et le copier sur votre serveur local ( wamp, xampp ou mamp ) dans le fichier htdocs ou www .

Après avoir activer votre serveur local Apache ainsi que Mysql, il vous faudra créer une base de données en local avec phpmyadmin et importer le fichier sql.
Pensez également à ajoutez les fichiers de configuration des variables d'environnement (.env, .env.local) à la racine de votre dossier.

Ensuite ouvrer votre terminal dans le dossier et installer les dépendances de symfony avec la commande suivante :
composer install

Vous pouvez maintenant lancer votre serveur web avec la commande suivante :
symfony server:start

A présent, ouvrez votre navigateur à l'adresse suivante :
https://127.0.0.1:8000/


# 2. Déployer le projet symfony en ligne avec Heroku

Le déployement en ligne à était effectué sur Heroku pour le moment mais suite au dernières actualités concernant ce dernier, je vais probablement déployer le projet sur un autre hebergeur en ligne.

# 3. Création d'un administrateur 

Les accès au compte administrateur seront données avec ma copie évaluation pour ainsi préserver la sécurité de l'application web.
