<?php 

$pizzaSizes = array(
	"petite" => 1.50,
	"moyenne" => 4.50,
	"grande" => 7.50
);

$condiments = array(
	"vert" => 2.40,
	"obama" => 2012,
	"愛" => 6.05,
	"chèvre" => 7.06,
	"poivre" => 0.20,
	"sel" => 0.25,
	"tomate" => 0.50,
	"parmesan" => 0.10,
	"ananas" => 0.60,
	"condiment avec un nom tellement trop long que personne ne s'en rappelle" => 0.80
);

define("condimentsPerPizza", 3);

setlocale(LC_MONETARY, 'en_US');
