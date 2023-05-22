<?php
Core::checkAccessLevel(1);
$id = $_GET["id"];
$_id=$_POST["_id"];
$Laufevent_a_list = [];
Core::setView("Veranstalter_handle_Laufevent_a", "view1", "list");
Core::setViewScheme("view1", "list", "Laufevent_a");
Laufevent::$activeViewport="detail";
$Laufevent_a_list = Laufevent::findAll();
Core::publish($Laufevent_a_list, "Laufevent_a_list");
Core::publish($id, "id");
$Laufevent = new Laufevent();
Core::publish($Laufevent, "Laufevent");
if (isset($_id)) {
Laufevent::$activeViewport="detail";
$Laufevent->loadDBData($_id);
$Laufevent->_Veranstalter=$id;
$a=$Laufevent->update();
if($a==true){
core::addMessage("Die Beziehung wurde erfolgreich gespeichert");
}else{
core::addError("Die Beziehung konnte leider nicht gespeichert werden");
}
}
