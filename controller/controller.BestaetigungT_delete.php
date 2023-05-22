<?php
Core::checkAccessLevel(1);
if(isset($_GET['id'])){
$result=BestaetigungT::delete(filter_input(INPUT_GET, "id"));
if($result){
Core::redirect("BestaetigungT", ["message"=>"Löschvorgang erfolgreich"]);
}else{
Core::addError("Der Datensatz konnte nicht gelöscht werden");
}
}else{
Core::addError("Der Datensatz konnte nicht gelöscht werden");
}
