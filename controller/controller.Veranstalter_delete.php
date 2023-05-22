<?php
$taskType = "delete";
$classSettings =Veranstalter::$settings;
Core::checkAccessGui($classSettings, $taskType);
if(isset($_GET['id'])){
$result=Veranstalter::delete(filter_input(INPUT_GET, "id"));
if($result){
Core::redirect("Veranstalter", ["message"=>"Löschvorgang erfolgreich"]);
}else{
Core::addError("Der Datensatz konnte nicht gelöscht werden");
}
}else{
Core::addError("Der Datensatz konnte nicht gelöscht werden");
}
