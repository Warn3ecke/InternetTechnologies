<?php
$BestaetigungT = Core::$view->BestaetigungT;
$BestaetigungT_list = Core::$view->BestaetigungT_list;
?>
<a href="?task=BestaetigungT&id=<?=$BestaetigungT->id?>" data-ajax="false" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all" align="right">No text</a>
<form id="form_BestaetigungT" method="post" action="?task=BestaetigungT_edit&id=<?=$BestaetigungT->id?>" data-ajax="false" enctype="<?=$BestaetigungT::$enctype?>">
<div class="ui-field-contain">
<?php
$BestaetigungT->renderLabel("id");
$BestaetigungT->render("id");
$BestaetigungT->renderLabel("c_ts");
$BestaetigungT->render("c_ts");
$BestaetigungT->renderLabel("m_ts");
$BestaetigungT->render("m_ts");
$BestaetigungT->renderLabel("literal");
$BestaetigungT->render("literal");
?>
<label for="update">speichern:</label><button type="submit" name="update" id="update" value="1" >update</button>
</div>
</form>
