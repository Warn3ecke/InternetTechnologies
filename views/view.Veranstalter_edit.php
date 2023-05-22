<?php
$Veranstalter = Core::$view->Veranstalter;
$Veranstalter_list = Core::$view->Veranstalter_list ;
if (isset($_GET['task_source'])){
$task_source = $_GET['task_source'];
}else{
$task_source = "Veranstalter";
}
if ($_GET['task'] == "user_edit"){
$task_source = "user_edit";
}
if ($task_source!="user_edit"){
$Favoriten=new Favoriten();
$icon=$Favoriten->find_task("Veranstalter_edit",$_SESSION['uid']);
if ($icon =="star"){
$hover = "hinzufügen";
}else{
$hover = "entfernen";
}
?>
<a href="?task=<?=$task_source?>&id=<?=$Veranstalter->id?>" data-ajax="false" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all" align="right" style="display:inline-block;">No text</a>
<div class="tooltip_hs" style="margin-left:20px;position:absolute">
<a href="?task=favoriten&db_task=Veranstalter_edit&icon=<?=$icon?>&id=<?=$Veranstalter->id?>" class="ui-nodisc-icon ui-alt-icon" data-ajax="false" data-role="button" data-icon="<?=$icon?>" data-iconpos="notext" data-theme="b" data-inline="true" ></a>
<span style="font-size: 15px" class="tooltiptext">Favorit <?=$hover?></span>
</div>
<?php
}
?>
<form id="form_Veranstalter" method="post" action="?task=Veranstalter_edit&id=<?=$Veranstalter->id?>&task_source=<?=$task_source?>" data-ajax="false" enctype="<?=$Veranstalter::$enctype?>">
<div class="ui-field-contain">
<?php
$Veranstalter->renderLabel("id");
$Veranstalter->render("id");
$Veranstalter->renderLabel("c_ts");
$Veranstalter->render("c_ts");
$Veranstalter->renderLabel("m_ts");
$Veranstalter->render("m_ts");
$Veranstalter->renderLabel("Verein");
$Veranstalter->render("Verein");
$Veranstalter->renderLabel("Ansprechperson_Vorname");
$Veranstalter->render("Ansprechperson_Vorname");
$Veranstalter->renderLabel("Ansprechperson_Nachname");
$Veranstalter->render("Ansprechperson_Nachname");
$Veranstalter->renderLabel("Ansprechperson_Telefonnummer");
$Veranstalter->render("Ansprechperson_Telefonnummer");
$Veranstalter->renderLabel("Ansprechperson_Email");
$Veranstalter->render("Ansprechperson_Email");
$Veranstalter->renderLabel("_User_uid");
$Veranstalter->render("_User_uid");
?>
<button type="submit" name="update" id="update" value="1" style="width:100%">update</button>
</div>
</form>
