## Yapaka.be, Formation en ligne / module de base : points de repère pour prévenir la maltraitance

Outil utilisé pour la réalisation du mooc disponible sur http://www.yapaka.be/mooc

Il utilise le framework laravel, qui nécessite composer et php 5.5+

Pour l'installer :

- cloner ce repository
- "composer install"
- "cp .env.example .env"
- modifier le fichier .env avec les informations de connexion de votre base de donnée
- "php artisan migrate"
- créer un utilisateur
- mettre le champ admin à 1 pour les utilisateurs devant avoir le rôle administrateur (utilisez phpmyadmin pour ce faire)


Disponible sous Licence GPL 3 et http://creativecommons.org/licenses/by-sa/4.0/
