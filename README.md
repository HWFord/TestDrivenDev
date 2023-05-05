# Installation
Mettre ce projet dans le dossier www d'un server apache, comme un localhost avec laragon. Une fois le server apache lancé vous pouvez aller sur 
localhost/TestDrivenDev

Il faut ensuite faire deux commandes dans le terminal dans le dossier du projet:

npm install

et

composer require --dev behat/behat 

***

# Pour lancer les tests sur le code:

## Jest tests
il faut utiliser la commande: 
npm test

## PHPunit tests
Lancer les tests phpunit: 
./vendor/bin/phpunit tests

Lancer les tests behat:
vendor/bin/behat --init
