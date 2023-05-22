<?php
$taskType = "list";
$classSettings =Veranstalter::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::publish($access, "access");
Core::$title="Übersicht: Veranstalter";
Core::setView("Veranstalter_overview", "view1", "list");
Core::setViewScheme("view1", "list", "Veranstalter");
$Veranstalter_list=[];
$Veranstalter=new Veranstalter();
Veranstalter::$activeViewport="list";
if(count($_POST)>0 && $_GET["task"]!="favoriten" && $_POST["registrieren-ng"] != "1" && $_POST["registrieren"] != "1"){
$Veranstalter_list=$Veranstalter->search(filter_input(INPUT_POST, "search"));
}else{
$Veranstalter_list=Veranstalter::findAll();
}
Core::publish($Veranstalter_list, "Veranstalter_list");
Core::publish($Veranstalter, "Veranstalter");
//Enumerationen
