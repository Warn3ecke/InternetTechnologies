<?php
if (isset($_GET["id"])) {

$files = glob("../ProjektstartLIM/speicherstände/projektstart/".$_GET["id"]."/*"); // alle Files im Ordner wählen
foreach($files as $file){
  if(is_file($file)) {
    unlink($file); // alle Files löschen
  }
}    
    
unlink("../ProjektstartLIM/speicherstände/projektstart/".$_GET["id"]);
}
require "controller.speicherstande_overview.php";