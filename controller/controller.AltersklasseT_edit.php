<?php
Core::checkAccessLevel(1);
Core::$title="Edit: AltersklasseT";
$id=$_GET["id"];
Core::setView("AltersklasseT_edit", "view1", "edit");
Core::setViewScheme("view1", "edit", "AltersklasseT");
$AltersklasseT=new AltersklasseT();
AltersklasseT::$activeViewport="edit";
$AltersklasseT_list = AltersklasseT::findAll();
Core::publish($AltersklasseT_list, "AltersklasseT_list");
AltersklasseT::$activeViewport="edit";
$AltersklasseT->loadDBData($id);
if(count($_POST)>0 && $_GET["task"]!="favoriten" && $_POST["registrieren-ng"] != "1" && $_POST["registrieren"] != "1"){
$a= $AltersklasseT->loadFormData();
if($a===true){
if($AltersklasseT->update()!="0"){
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
default:;
$ordner="files/";;
};
$pfad = $AltersklasseT_field["sysParent"] . "_path"; // path wird nirgends ausgelesen sondern jetzt einfach mal so definiert
$filetypes=$parentField["filetypes"];
$AltersklasseT->updateFile($filekey, ["pathDB" => $pfad, "path"=>$ordner, "filestypes"=>$filetypes]);
break;
default:
}
}
}
core::redirect("AltersklasseT&id=$id");
}else{
Core::addError("Der Datenbankeintrag war nicht erfolgreich"); 
}
}else{
Core::addError("Die Eingegebenen Daten waren nicht korrekt");
}
}
Core::publish($AltersklasseT, "AltersklasseT");
