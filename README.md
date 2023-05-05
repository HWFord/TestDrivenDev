# Installation
Mettre ce projet dans le dossier www d'un server apache, comme un localhost avec laragon.
une fois le server apahche lancé vous pouvez aller sur 
localhost/TestDrivenDev

Il faut ensuite lancer dans le terminal dans le dossier du projet:

npm install

et

composer require --dev behat/behat 

***

# Pour lancer les tests:

## Jest tests
il faut utiliser la commande: 
npm test

## PHPunit tests
Lancer les tests phpunit: 
./vendor/bin/phpunit tests

Lancer les tests behat:
vendor/bin/behat --init
