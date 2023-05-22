<?php
$taskType = "edit";
$classSettings =Veranstalter::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::$title="Edit: Veranstalter";
$id=$_GET["id"];
Core::setView("Veranstalter_edit", "view1", "edit");
Core::setViewScheme("view1", "edit", "Veranstalter");
$Veranstalter=new Veranstalter();
Veranstalter::$activeViewport="edit";
$Veranstalter_list = Veranstalter::findAll();
Core::publish($Veranstalter_list, "Veranstalter_list");
Veranstalter::renderScript("edit","form_Veranstalter");
$Veranstalter->loadDBData($id);
if(count($_POST)>0 && $_GET["task"]!="favoriten" && $_POST["registrieren-ng"] != "1" && $_POST["registrieren"] != "1"){
$a= $Veranstalter->loadFormData();
if($a===true){
if($Veranstalter->update()!="0"){
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
default:;
$ordner="files/";;
};
$pfad = $Veranstalter_field["sysParent"] . "_path"; // path wird nirgends ausgelesen sondern jetzt einfach mal so definiert
$filetypes=$parentField["filetypes"];
$Veranstalter->updateFile($filekey, ["pathDB" => $pfad, "path"=>$ordner, "filestypes"=>$filetypes]);
break;
default:
}
}
}
core::redirect("Veranstalter_detail&id=$id");
}else{
Core::addError("Der Datenbankeintrag war nicht erfolgreich"); 
}
}else{
Core::addError("Die Eingegebenen Daten waren nicht korrekt");
}
if (isset($_GET['task_source'])) {
if ($_GET['task_source'] == "login" or $_GET['task_source'] == "user_register") {
core::redirect("login");
}
}
}
$_User_uid = User::findAll();
Core::publish($_User_uid, "_User_uid");
Core::publish($Veranstalter, "Veranstalter");
//Enumerationen
