<?php
class AltersklasseT extends DB{
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
const SQL_INSERT='INSERT INTO AltersklasseT (literal, sort) VALUES (?, ?)';
const SQL_UPDATE='UPDATE AltersklasseT SET literal=?, sort=? WHERE id=?';
const SQL_SELECT_PK='SELECT AltersklasseT.* FROM AltersklasseT WHERE id=?';
const SQL_SELECT_ALL='SELECT AltersklasseT.* FROM AltersklasseT';
const SQL_DELETE='DELETE FROM AltersklasseT WHERE id=?';
const SQL_PRIMARY='id';
}
AltersklasseT::$dataScheme=db::buildScheme("AltersklasseT");
$fp = fopen("models/json/AltersklasseT_complete.json", "w");
fwrite($fp, json_encode(db::buildScheme("AltersklasseT"),JSON_UNESCAPED_UNICODE));
fclose($fp);
AltersklasseT::$settings=db::loadSettings("AltersklasseT");
$fp = fopen("models/json/AltersklasseT_settings_complete.json", "w");
fwrite($fp, json_encode(AltersklasseT::$settings,JSON_UNESCAPED_UNICODE));
fclose($fp);
