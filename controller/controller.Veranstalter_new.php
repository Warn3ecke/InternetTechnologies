<?php

if ($_POST["registrieren-ng"] != "1"){
$taskType = "new";
$classSettings =Veranstalter::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::$title="Neu: Veranstalter";
Core::setView("Veranstalter_new", "view1", "new");
Core::setViewScheme("view1", "new", "Veranstalter");
}

if(isset($_GET["chain"])){
    $referrer = $_GET["chain"];
Core::publish($referrer, "referrer");
}
if(isset($_GET["autocomplete"])){
    $autocomplete = 1;
Core::publish($autocomplete, "autocomplete");
}

$Veranstalter=new Veranstalter();
Veranstalter::$activeViewport="new";
Veranstalter::renderScript("new","form_Veranstalter");

if(count($_POST)>0){
$a= $Veranstalter->loadFormData();
if($a===true){
if($Veranstalter->create()!="0"){
foreach($_FILES as $filekey => $file){
if($file["name"]!=""){
$Veranstalter_field =Veranstalter::$dataScheme[$filekey];
switch ($Veranstalter_field["type"]){
case "picture":
$Veranstalter->updateFile($filekey);
break;
case "file": // Hier müsste noch zwischen Bildern und  Dokumenten unterschieden werden
$parentField=Veranstalter::$dataScheme[$Veranstalter_field["sysParent"]];
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
$pfad = $Veranstalter_field["sysParent"] . "_path"; // path wird nirgends ausgelesen sondern jetzt einfach mal so definiert
$filetypes=$parentField["filetypes"];
$Veranstalter->updateFile($filekey, ["pathDB" => $pfad, "path"=>$ordner, "filestypes"=>$filetypes]);
break;
default:
}
}
}
$Veranstalter=new Veranstalter();
if(isset($_POST["back"])){
Core::loadJavascript("includes/js/back.js");
}else{
if ($_POST["registrieren-ng"] != "1"){ 
Core::$view->path["view1"]="views/view.Veranstalter_new.php";
}else{
   $task_source = $_GET["task_source"];
   $array["register"] = "true";
   Core::redirect ($task_source, $array);
}}
}else{
Core::addError("Der Datenbankeintrag war nicht erfolgreich"); 
}
}else{
Core::addError("Die Eingegebenen Daten waren nicht korrekt");
}
}
$_User_uid = User::findAll(User::SQL_SELECT_IGNORE_DERIVED);
Core::publish($_User_uid, "_User_uid");
Core::publish($Veranstalter, "Veranstalter");
//Enumerationen
