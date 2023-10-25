Le fichier test.php permet de tester index.php.
Si on décommente les commentaires, on peut obtenir les minimum, maximum et moyenne de temps d'exécution de 1000 tests.

index.php résoud les formules, et pour ce faire, il s'inspire de "operators.php".
operators.php contient chaque opérateur.
Pour des raisons, le signe '-' doit être mis tout en haut (si tu y touches, c'est ta faute si ça marche plus :P).


Chaque opérateur contient 5 paramètres :
	- Le signe utilisé dans l'expression,
	- la structure de l'opérateur (le # représente l'opérateur, et n le(s) nombre(s)),
	- la priorité droite ou gauche de l'opérateur,
	- la priorité par rapport aux autres opérateurs (plus c'est haut, plus tôt c'est exécuté),
	- la fonction associée pour résoudre l'opération.

Les opérations qui englobent le nom d'une autre opération (sin et asin, par exemple), doivent être placées après (sin, puis asin)


Précision pour la structure de l'opérateur :
	- Elle ne doit contenir que des "#", "n", ",".
	- Elle ne doit contenir qu'un seul #, qui définit la position de l'opérateur.
	- Les différents nombres "n" doivent être séparés par le "#" ou une virgule.
	- La fonction associée doit avoir autant d'arguments que de "n" dans la structure.

Il est possible de construire un opérateur complexe, comme "exemple".

Entrer la ligne de commande : php test.php "2,3exemple5,4" 
renverra la réponse 45.