<?php
$taskType = "detail";
$classSettings =Veranstalter::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::publish($access, "access");
Core::$title="Detail: Veranstalter";
Core::setView("Veranstalter_detail", "view1", "detail");
Core::setViewScheme("view1", "detail", "Veranstalter");
$Veranstalter_list_2 = Veranstalter::findAll();
Core::publish($Veranstalter_list_2, "Veranstalter_list_2");
$Veranstalter_list=[];
$Veranstalter=new Veranstalter();
Veranstalter::$activeViewport="detail";
$Veranstalter->loadDBData($_GET["id"]);
Core::publish($Veranstalter, "Veranstalter");
//Beziehungen:
//Enumerationen
//to: Laufevent  _a:
$Laufevent_a=new Laufevent();
$Laufevent_a_list=[];
$Laufevent_a_list = $Laufevent_a->query(Laufevent::SQL_SELECT_Veranstalter, [$Veranstalter->id]);
Core::publish($Laufevent_a_list, "Laufevent_a_list");
Core::publish($Laufevent_a, "Laufevent_a");
Core::$view->path["view_Laufevent_a"]="views/view.Laufevent_a_detail_overview.php";
//to: User _uid :
$User_uid=new User();
$User_uid_list=[];
$User_uid_list=$User_uid->query(User::SQL_SELECT_Veranstalter_uid, [$Veranstalter ->id]);
Core::publish($User_uid_list, "User_uid_list");
Core::publish($User_uid, "User_uid");
Core::$view->path["view_User_uid"]="views/view.User_uid_detail_overview.php";
