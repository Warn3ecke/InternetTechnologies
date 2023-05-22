<?php
Core::checkAccessLevel(1);
Core::$title="Übersicht: AltersklasseT";
Core::setView("AltersklasseT_overview", "view1", "list");
Core::setViewScheme("view1", "list", "AltersklasseT");
$AltersklasseT_list=[];
$AltersklasseT=new AltersklasseT();
AltersklasseT::$activeViewport="list";
if(count($_POST)>0 && $_GET["task"]!="favoriten" && $_POST["registrieren-ng"] != "1" && $_POST["registrieren"] != "1"){
$AltersklasseT_list=$AltersklasseT->search(filter_input(INPUT_POST, "search"));
}else{
$AltersklasseT_list=AltersklasseT::findAll();
}
Core::publish($AltersklasseT_list, "AltersklasseT_list");
Core::publish($AltersklasseT, "AltersklasseT");
