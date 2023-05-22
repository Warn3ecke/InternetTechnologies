<?php
$GeschlechtT = Core::$view->GeschlechtT;
$GeschlechtT_list = Core::$view->GeschlechtT_list;
?>
<a href="?task=GeschlechtT&id=<?=$GeschlechtT->id?>" data-ajax="false" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all" align="right">No text</a>
<form id="form_GeschlechtT" method="post" action="?task=GeschlechtT_edit&id=<?=$GeschlechtT->id?>" data-ajax="false" enctype="<?=$GeschlechtT::$enctype?>">
<div class="ui-field-contain">
<?php
$GeschlechtT->renderLabel("id");
$GeschlechtT->render("id");
$GeschlechtT->renderLabel("c_ts");
$GeschlechtT->render("c_ts");
$GeschlechtT->renderLabel("m_ts");
$GeschlechtT->render("m_ts");
$GeschlechtT->renderLabel("literal");
$GeschlechtT->render("literal");
?>
<label for="update">speichern:</label><button type="submit" name="update" id="update" value="1" >update</button>
</div>
</form>
