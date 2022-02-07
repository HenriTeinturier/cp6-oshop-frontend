<?php 

require __DIR__. '/classes/Animal.php';
require __DIR__. '/classes/Mammifere.php';
require __DIR__. '/classes/Chien.php';
require __DIR__. '/classes/Chat.php';


$kiki = new Chien;

$kiki->manger();
$kiki->respirer();
$kiki->allaiter();
$kiki->aboyer();

var_dump($kiki);


$felix = new Chat;

$felix->manger();

$felix->dormir();

var_dump($felix);

$chatDeSchrodinger = new Chat;

$chatDeSchrodinger->vivant = "on sait pas";

var_dump($chatDeSchrodinger);