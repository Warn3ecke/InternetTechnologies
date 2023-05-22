<?php
Core::checkAccessLevel(1);
Core::$title="Übersicht: GeschlechtT";
Core::setView("GeschlechtT_overview", "view1", "list");
Core::setViewScheme("view1", "list", "GeschlechtT");
$GeschlechtT_list=[];
$GeschlechtT=new GeschlechtT();
GeschlechtT::$activeViewport="list";
if(count($_POST)>0 && $_GET["task"]!="favoriten" && $_POST["registrieren-ng"] != "1" && $_POST["registrieren"] != "1"){
$GeschlechtT_list=$GeschlechtT->search(filter_input(INPUT_POST, "search"));
}else{
$GeschlechtT_list=GeschlechtT::findAll();
}
Core::publish($GeschlechtT_list, "GeschlechtT_list");
Core::publish($GeschlechtT, "GeschlechtT");
