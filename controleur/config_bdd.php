<?php 
//error_reporting(E_ALL);
//ini_set('display_errors','On');

$serveur = $_SERVER['SERVER_NAME']; 
if ($_SERVER['SERVER_NAME']=="127.0.0.1" || $_SERVER['SERVER_NAME']=="localhost")
   { 
   //$serveur ="localhost:3306"; 
   $bdd = "neigesoleil";
   $user="root";
   $mdp=""; 
   } 
  else // 1and1
   { 
   $serveur ="db5006845924.hosting-data.io";
   $bdd = "dbs5651848";
   $user="dbu2909969";
   $mdp="Wanuke70"; 
  }   
  echo "<br/><h2>-------------serveur=".$serveur.", bdd=".$bdd.", user=".$user."</h2>";
?>
