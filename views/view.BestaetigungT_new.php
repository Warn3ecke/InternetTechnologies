<?php
$BestaetigungT = Core::$view->BestaetigungT;
$BestaetigungT_list = Core::$view->BestaetigungT_list ;
?>
<a href="?task=BestaetigungT" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all" align="right">No text</a>
<form id="form_BestaetigungT" method="post" action="?task=BestaetigungT_new" data-ajax="false" enctype="<?=$BestaetigungT::$enctype?>">
<div class="ui-field-contain">
<?php
$BestaetigungT = Core::$view->BestaetigungT;
$BestaetigungT->renderLabel("id");
$BestaetigungT->render("id");
$BestaetigungT->renderLabel("c_ts");
$BestaetigungT->render("c_ts");
$BestaetigungT->renderLabel("m_ts");
$BestaetigungT->render("m_ts");
$BestaetigungT->renderLabel("literal");
$BestaetigungT->render("literal");
?>
<label for="update">speichern:</label><button type="submit" onclick="BezHinweis()" name="update" id="update" value="1" >speichern</button>
</div>
</form>
<script>
</script>
