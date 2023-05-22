<?php
Core::checkAccessLevel(1);
Core::$title="Edit: GeschlechtT";
$id=$_GET["id"];
Core::setView("GeschlechtT_edit", "view1", "edit");
Core::setViewScheme("view1", "edit", "GeschlechtT");
$GeschlechtT=new GeschlechtT();
GeschlechtT::$activeViewport="edit";
$GeschlechtT_list = GeschlechtT::findAll();
Core::publish($GeschlechtT_list, "GeschlechtT_list");
GeschlechtT::$activeViewport="edit";
$GeschlechtT->loadDBData($id);
if(count($_POST)>0 && $_GET["task"]!="favoriten" && $_POST["registrieren-ng"] != "1" && $_POST["registrieren"] != "1"){
$a= $GeschlechtT->loadFormData();
if($a===true){
if($GeschlechtT->update()!="0"){
foreach($_FILES as $filekey => $file){
if($file["name"]!=""){
$GeschlechtT_field =GeschlechtT::$dataScheme[$filekey];
switch ($GeschlechtT_field["type"]){
case "picture":
$GeschlechtT->updateFile($filekey);
break;
case "file": // Hier müsste noch zwischen Bildern und  Dokumenten unterschieden werden
$parentField=GeschlechtT::$dataScheme[$GeschlechtT_field["sysParent"]];
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
$pfad = $GeschlechtT_field["sysParent"] . "_path"; // path wird nirgends ausgelesen sondern jetzt einfach mal so definiert
$filetypes=$parentField["filetypes"];
$GeschlechtT->updateFile($filekey, ["pathDB" => $pfad, "path"=>$ordner, "filestypes"=>$filetypes]);
break;
default:
}
}
}
core::redirect("GeschlechtT&id=$id");
}else{
Core::addError("Der Datenbankeintrag war nicht erfolgreich"); 
}
}else{
Core::addError("Die Eingegebenen Daten waren nicht korrekt");
}
}
Core::publish($GeschlechtT, "GeschlechtT");
