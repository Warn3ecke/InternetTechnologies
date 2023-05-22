<?php
class BestaetigungT extends DB{
//Variablenliste
public $id;
public $c_ts;
public $m_ts;
public $literal;
public $sort;
public static $settings=array();
public $dataMapping=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme
public static $dataScheme=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme
//Konstanten
const SQL_INSERT='INSERT INTO BestaetigungT (literal, sort) VALUES (?, ?)';
const SQL_UPDATE='UPDATE BestaetigungT SET literal=?, sort=? WHERE id=?';
const SQL_SELECT_PK='SELECT BestaetigungT.* FROM BestaetigungT WHERE id=?';
const SQL_SELECT_ALL='SELECT BestaetigungT.* FROM BestaetigungT';
const SQL_DELETE='DELETE FROM BestaetigungT WHERE id=?';
const SQL_PRIMARY='id';
}
BestaetigungT::$dataScheme=db::buildScheme("BestaetigungT");
$fp = fopen("models/json/BestaetigungT_complete.json", "w");
fwrite($fp, json_encode(db::buildScheme("BestaetigungT"),JSON_UNESCAPED_UNICODE));
fclose($fp);
BestaetigungT::$settings=db::loadSettings("BestaetigungT");
$fp = fopen("models/json/BestaetigungT_settings_complete.json", "w");
fwrite($fp, json_encode(BestaetigungT::$settings,JSON_UNESCAPED_UNICODE));
fclose($fp);
