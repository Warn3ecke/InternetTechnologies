<?php
$BestaetigungT_list=Core::$view->BestaetigungT_list;
$BestaetigungT=Core::$view->BestaetigungT;
?>
<div data-role="ui-bar ui-bar-a">
<h1>Übersichtsseite BestaetigungT</h1>
</div>
<form>
<input id="filterTable-input" data-type="search">
</form>
<div class="overflowx">
<table data-role="table" id="tbl_BestaetigungT" data-filter="true" data-input="#filterTable-input" class="ui-responsive" data-mode="columntoggle" data-column-btn-theme="b" data-column-btn-text="Spalten" data-column-popup-theme="a">
<thead>
<tr>
<?php $BestaetigungT->renderHeader("id", "table"); ?>
<?php $BestaetigungT->renderHeader("c_ts", "table"); ?>
<?php $BestaetigungT->renderHeader("m_ts", "table"); ?>
<?php $BestaetigungT->renderHeader("literal", "table"); ?>
</tr>
</thead>
<tbody>
<?php foreach($BestaetigungT_list as $enumeration){
?>
<tr>
<?php $enumeration->render("id"); ?>
<?php $enumeration->render("c_ts"); ?>
<?php $enumeration->render("m_ts"); ?>
<?php $enumeration->render("literal"); ?>
<td>
<a href="?task=BestaetigungT_edit&id=<?=$enumeration->id?>" data-ajax="false" data-role="button"  class="ui-btn ui-icon-pencil ui-btn-icon-notext ui-corner-all ui-btn-inline">edit</a>
<a href="?task=BestaetigungT_delete&id=<?=$enumeration->id?>" data-ajax="false" data-role="button"  class="ui-btn ui-icon-delete ui-btn-icon-notext ui-corner-all ui-btn-inline" onclick="return confirm("Soll der Datensatz mit der ID: <?=$enumeration->id." wirklich gelöscht werden?"?>")">delete</a>
</td>
</tr>
<?php
        }
        ?>
</tbody>
</table>
</div>
<a href="?task=BestaetigungT_new" class="ui-btn ui-btn-b ui-icon-plus ui-btn-icon-left" data-ajax="false">Neuanlegen</a><br>
<br>
