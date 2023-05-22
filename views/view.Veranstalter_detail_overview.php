<?php
$Veranstalter_list=Core::$view->Veranstalter_list;
$Veranstalter=Core::$view->Veranstalter;
$Laufevent=Core::$view->Laufevent;
?>
<div data-role="ui-bar ui-bar-a">
<p><h3>Beziehungsübersicht zur Klasse: Veranstalter <a href="#popup_Veranstalter" data-rel="popup" data-transition="pop" class="my-tooltip-btn ui-btn ui-alt-icon ui-nodisc-icon ui-btn-inline ui-icon-info ui-btn-icon-notext" title="Erfahre mehr">Erfahre mehr</a></h3></p>
<div data-role="popup" id="popup_Veranstalter" class="ui-content" data-theme="a" style="max-width:800px;">
<h3>Informationen zu dieser Beziehung ():</h3><br>
Laufevent (*..*) ---- (1..1) Veranstalter <br><br>
<h4>Bedeutet für diese Seite der Beziehung:</h4>
<p>Das Objekt in dieser Detailansicht (aus der Klasse: Laufevent) muss genau eine Verbindung zu einem Objekt der Partnerklasse (Veranstalter) haben (1..1).</p><br>
<h4>Bedeutet für die Partner-Seite der Beziehung:</h4>
<p>Das Partnerobjekt kann mehrere Verbindungen zu den Objekten aus dieser Klasse haben (*..*).</p>
<h4>Die Information zur Partner-Seite sollte vor allem dann beachtet werden:</h4>
<ul><li>wenn eine Verbindung gelöscht wird</li>
<li>wenn ein Objekt gelöscht wird</li></ul>
... durch einen solchen Vorgang könnte nämlich eine erfüllte Muss-Beziehung, auf Seite des Partnerobjekts auf einmal nicht mehr erfüllt sein!
</div>
</div>
<div class="ui-field-contain">
<?php foreach($Veranstalter_list as $klasse){
$partner=true;
$klasse->renderLabel("id", "detail");
$klasse->render("id", "detail");
$klasse->renderLabel("c_ts", "detail");
$klasse->render("c_ts", "detail");
$klasse->renderLabel("m_ts", "detail");
$klasse->render("m_ts", "detail");
$klasse->renderLabel("Verein", "detail");
$klasse->render("Verein", "detail");
$klasse->renderLabel("Ansprechperson_Vorname", "detail");
$klasse->render("Ansprechperson_Vorname", "detail");
$klasse->renderLabel("Ansprechperson_Nachname", "detail");
$klasse->render("Ansprechperson_Nachname", "detail");
$klasse->renderLabel("Ansprechperson_Telefonnummer", "detail");
$klasse->render("Ansprechperson_Telefonnummer", "detail");
$klasse->renderLabel("Ansprechperson_Email", "detail");
$klasse->render("Ansprechperson_Email", "detail");
$klasse->renderLabel("_User_uid", "detail");
$klasse->render("_User_uid", "detail");
}
if($partner!==true){
echo"Aktuell liegt keine Verbindung zu einem Objekt der Partnerklasse vor.";
}
?>
</div>
