<?php
Core::checkAccessLevel(1);
Core::$title="Neu: BestaetigungT";
Core::setView("BestaetigungT_new", "view1", "new");
Core::setViewScheme("view1", "new", "BestaetigungT");
$BestaetigungT=new BestaetigungT();
BestaetigungT::$activeViewport="new";
$BestaetigungT_list = BestaetigungT::findAll();
Core::publish($BestaetigungT_list, "BestaetigungT_list");
if(count($_POST)>0 && $_GET["task"]!="favoriten" && $_POST["registrieren-ng"] != "1" && $_POST["registrieren"] != "1"){
$a= $BestaetigungT->loadFormData();
if($a===true){
if($BestaetigungT->create()!="0"){
foreach($_FILES as $filekey => $file){
if($file["name"]!=""){
$BestaetigungT_field =BestaetigungT::$dataScheme[$filekey];
switch ($BestaetigungT_field["type"]){
case "picture":
$BestaetigungT->updateFile($filekey);
break;
case "file": // Hier müsste noch zwischen Bildern und  Dokumenten unterschieden werden
$parentField=BestaetigungT::$dataScheme[$BestaetigungT_field["sysParent"]];
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
$pfad = $BestaetigungT_field["sysParent"] . "_path"; // path wird nirgends ausgelesen sondern jetzt einfach mal so definiert
$filetypes=$parentField["filetypes"];
$BestaetigungT->updateFile($filekey, ["pathDB" => $pfad, "path"=>$ordner, "filestypes"=>$filetypes]);
break;
default:
}
}
}
$BestaetigungT=new BestaetigungT();
Core::$view->path["view1"]="views/view.BestaetigungT_new.php";
}else{
Core::addError("Der Datenbankeintrag war nicht erfolgreich"); 
}
}else{
Core::addError("Die Eingegebenen Daten waren nicht korrekt");
}
}
Core::publish($BestaetigungT, "BestaetigungT");
