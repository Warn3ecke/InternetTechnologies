<?php
$AltersklasseT = Core::$view->AltersklasseT;
$AltersklasseT_list = Core::$view->AltersklasseT_list ;
?>
<a href="?task=AltersklasseT" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all" align="right">No text</a>
<form id="form_AltersklasseT" method="post" action="?task=AltersklasseT_new" data-ajax="false" enctype="<?=$AltersklasseT::$enctype?>">
<div class="ui-field-contain">
<?php
$AltersklasseT = Core::$view->AltersklasseT;
$AltersklasseT->renderLabel("id");
$AltersklasseT->render("id");
$AltersklasseT->renderLabel("c_ts");
$AltersklasseT->render("c_ts");
$AltersklasseT->renderLabel("m_ts");
$AltersklasseT->render("m_ts");
$AltersklasseT->renderLabel("literal");
$AltersklasseT->render("literal");
?>
<label for="update">speichern:</label><button type="submit" onclick="BezHinweis()" name="update" id="update" value="1" >speichern</button>
</div>
</form>
<script>
</script>
