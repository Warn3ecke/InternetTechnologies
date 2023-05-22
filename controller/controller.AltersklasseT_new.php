<?php
Core::checkAccessLevel(1);
Core::$title="Neu: AltersklasseT";
Core::setView("AltersklasseT_new", "view1", "new");
Core::setViewScheme("view1", "new", "AltersklasseT");
$AltersklasseT=new AltersklasseT();
AltersklasseT::$activeViewport="new";
$AltersklasseT_list = AltersklasseT::findAll();
Core::publish($AltersklasseT_list, "AltersklasseT_list");
if(count($_POST)>0 && $_GET["task"]!="favoriten" && $_POST["registrieren-ng"] != "1" && $_POST["registrieren"] != "1"){
$a= $AltersklasseT->loadFormData();
if($a===true){
if($AltersklasseT->create()!="0"){
foreach($_FILES as $filekey => $file){
if($file["name"]!=""){
$AltersklasseT_field =AltersklasseT::$dataScheme[$filekey];
switch ($AltersklasseT_field["type"]){
case "picture":
$AltersklasseT->updateFile($filekey);
break;
case "file": // Hier müsste noch zwischen Bildern und  Dokumenten unterschieden werden
$parentField=AltersklasseT::$dataScheme[$AltersklasseT_field["sysParent"]];
$filetype=$parentField["type"];
switch($filetype){
case "pictureT":
$ordner="images/";
break;
case "fileT":
$ordner="files/";
break;
default:
$ordner="files/";
}
$pfad = $AltersklasseT_field["sysParent"] . "_path"; // path wird nirgends ausgelesen sondern jetzt einfach mal so definiert
$filetypes=$parentField["filetypes"];
$AltersklasseT->updateFile($filekey, ["pathDB" => $pfad, "path"=>$ordner, "filestypes"=>$filetypes]);
break;
default:
}
}
}
$AltersklasseT=new AltersklasseT();
Core::$view->path["view1"]="views/view.AltersklasseT_new.php";
}else{
Core::addError("Der Datenbankeintrag war nicht erfolgreich"); 
}
}else{
Core::addError("Die Eingegebenen Daten waren nicht korrekt");
}
}
Core::publish($AltersklasseT, "AltersklasseT");
