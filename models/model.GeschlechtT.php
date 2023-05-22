<?php
class GeschlechtT extends DB{
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
const SQL_INSERT='INSERT INTO GeschlechtT (literal, sort) VALUES (?, ?)';
const SQL_UPDATE='UPDATE GeschlechtT SET literal=?, sort=? WHERE id=?';
const SQL_SELECT_PK='SELECT GeschlechtT.* FROM GeschlechtT WHERE id=?';
const SQL_SELECT_ALL='SELECT GeschlechtT.* FROM GeschlechtT';
const SQL_DELETE='DELETE FROM GeschlechtT WHERE id=?';
const SQL_PRIMARY='id';
}
GeschlechtT::$dataScheme=db::buildScheme("GeschlechtT");
$fp = fopen("models/json/GeschlechtT_complete.json", "w");
fwrite($fp, json_encode(db::buildScheme("GeschlechtT"),JSON_UNESCAPED_UNICODE));
fclose($fp);
GeschlechtT::$settings=db::loadSettings("GeschlechtT");
$fp = fopen("models/json/GeschlechtT_settings_complete.json", "w");
fwrite($fp, json_encode(GeschlechtT::$settings,JSON_UNESCAPED_UNICODE));
fclose($fp);
