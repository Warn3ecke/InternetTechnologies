<?php
Core::checkAccessLevel(1);
Core::$title="Übersicht: BestaetigungT";
Core::setView("BestaetigungT_overview", "view1", "list");
Core::setViewScheme("view1", "list", "BestaetigungT");
$BestaetigungT_list=[];
$BestaetigungT=new BestaetigungT();
BestaetigungT::$activeViewport="list";
if(count($_POST)>0 && $_GET["task"]!="favoriten" && $_POST["registrieren-ng"] != "1" && $_POST["registrieren"] != "1"){
$BestaetigungT_list=$BestaetigungT->search(filter_input(INPUT_POST, "search"));
}else{
$BestaetigungT_list=BestaetigungT::findAll();
}
Core::publish($BestaetigungT_list, "BestaetigungT_list");
Core::publish($BestaetigungT, "BestaetigungT");
