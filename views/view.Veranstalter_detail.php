<?php $klasse = Core::$view->Veranstalter; 
$access=Core::import("access");
$Favoriten=new Favoriten();
$icon=$Favoriten->find_task("Veranstalter_detail",$_SESSION['uid']);
if ($icon =="plus"){
$hover = "hinzufügen";
}else{
$hover = "entfernen";
}
$Veranstalter_list_2 = Core::$view->Veranstalter_list_2 ; ?>
<h3 class="ui-bar ui-bar-b ui-corner-all ">
<a href="?task=Veranstalter" data-ajax="false" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all ui-btn-inline" align="right">back</a>
<?php if($access["edit"] == "true"){ ?>
<a href="?task=Veranstalter_edit&id=<?=$klasse->id?>&task_source=Veranstalter_detail" data-ajax="false" data-role="button"  class="ui-btn ui-icon-pencil ui-btn-icon-notext   ui-corner-all ui-btn-inline">edit</a>
<?php } ?>
<?php if($access["delete"] == "true"){ ?>
<a href="?task=Veranstalter_delete&id=<?=$klasse->id?>" data-ajax="false" data-role="button"  class="ui-btn ui-icon-delete ui-btn-icon-notext ui-corner-all ui-btn-inline">delete</a>
<?php } ?>

 Veranstalter

<?php if(Core::$user->Gruppe >0){ ?>
<div class="tooltip_hs">
<a href="?task=favoriten&db_task=Veranstalter_detail&icon=<?=$icon?>&id=<?=$klasse->id?>" class="ui-nodisc-icon ui-alt-icon" data-ajax="false" data-role="button" data-icon="<?=$icon?>" data-iconpos="notext" data-theme="b" data-inline="true"></a>
<span style="font-size: 15px" class="tooltiptext">Favorit <?=$hover?></span>
</div>
<?php } ?>

</h3>
<div class="ui-body ui-body-a ui-corner-all">
<div class="ui-field-contain">
<?php
$klasse->renderLabel("id");
$klasse->render("id");
$klasse->renderLabel("c_ts");
$klasse->render("c_ts");
$klasse->renderLabel("m_ts");
$klasse->render("m_ts");
$klasse->renderLabel("Verein");
$klasse->render("Verein");
$klasse->renderLabel("Ansprechperson_Vorname");
$klasse->render("Ansprechperson_Vorname");
$klasse->renderLabel("Ansprechperson_Nachname");
$klasse->render("Ansprechperson_Nachname");
$klasse->renderLabel("Ansprechperson_Telefonnummer");
$klasse->render("Ansprechperson_Telefonnummer");
$klasse->renderLabel("Ansprechperson_Email");
$klasse->render("Ansprechperson_Email");
$klasse->renderLabel("_User_uid");
$klasse->render("_User_uid");
?>
</div>
</div><br><br>
<?php if($access["relations"] == "true"){ ?>
<h3 class="ui-bar ui-bar-b ui-corner-all">Beziehungen</h3>
<div class="ui-body ui-body-a ui-corner-all">
<div data-role="tabs" id="tabs" data-theme="a">
<div data-role="navbar" data-theme="a">
<ul>
<li><a href="#1" data-ajax="false">Laufevent</a></li>
</ul>
</div>
<div id="1" class="ui-body-d ui-content">
<div id="viewLaufevent_a">
<?php
Core::$view->render("view_Laufevent_a");
?>
<form method="post" action="?task=Veranstalter_handle_Laufevent_a&id=<?=$klasse->id?>" data-ajax="false">
<button type="submit" name="auswählen" id="auswählen" class="ui-btn ui-icon-bullets ui-btn-icon-left">Auswählen</button>
</form>
<a href="?task=Laufevent_new&Veranstalter=<?=$klasse->id?>" data-ajax="false" data-role="button"  class="ui-btn ui-btn-b ui-icon-plus ui-btn-icon-left">Neuanlegen</a>
</div>
</div>
</div>
</div>
<?php } ?>
