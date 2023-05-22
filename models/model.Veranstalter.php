<?php
class Veranstalter extends DB{

//Variablenliste
public $id;
public $c_ts;
public $m_ts;
public static $settings=array();
public $Verein;
public $Ansprechperson_Vorname;
public $Ansprechperson_Nachname;
public $Ansprechperson_Telefonnummer;
public $Ansprechperson_Email;
public $_User_uid;
public $ts;

public $dataMapping=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme

public static $dataScheme=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme

//Konstanten
const SQL_INSERT='INSERT INTO Veranstalter (_User_uid, `Verein` , `Ansprechperson_Vorname` , `Ansprechperson_Nachname` , `Ansprechperson_Telefonnummer` , `Ansprechperson_Email` ) VALUES (?, ?, ?, ?, ?, ?)';
const SQL_UPDATE='UPDATE Veranstalter SET _User_uid=?, `Verein` =?, `Ansprechperson_Vorname` =?, `Ansprechperson_Nachname` =?, `Ansprechperson_Telefonnummer` =?, `Ansprechperson_Email` =? where id=?';
const SQL_SELECT_PK='SELECT Veranstalter.`c_ts` as `c_ts`, Veranstalter.`m_ts` as `m_ts`, Veranstalter.`id` as `id`, Veranstalter._User_uid as _User_uid, `Veranstalter`.`Verein` as `Verein`, `Veranstalter`.`Ansprechperson_Vorname` as `Ansprechperson_Vorname`, `Veranstalter`.`Ansprechperson_Nachname` as `Ansprechperson_Nachname`, `Veranstalter`.`Ansprechperson_Telefonnummer` as `Ansprechperson_Telefonnummer`, `Veranstalter`.`Ansprechperson_Email` as `Ansprechperson_Email` from Veranstalter where Veranstalter.`id` = ?';
const SQL_SELECT_ALL='SELECT Veranstalter.`c_ts` as `c_ts`, Veranstalter.`m_ts` as `m_ts`, Veranstalter.`id` as `id`, Veranstalter._User_uid as _User_uid, `Veranstalter`.`Verein` as `Verein`, `Veranstalter`.`Ansprechperson_Vorname` as `Ansprechperson_Vorname`, `Veranstalter`.`Ansprechperson_Nachname` as `Ansprechperson_Nachname`, `Veranstalter`.`Ansprechperson_Telefonnummer` as `Ansprechperson_Telefonnummer`, `Veranstalter`.`Ansprechperson_Email` as `Ansprechperson_Email` from Veranstalter';
const SQL_SELECT_IGNORE_DERIVED='SELECT DISTINCT Veranstalter.`c_ts` as `c_ts`, Veranstalter.`m_ts` as `m_ts`, Veranstalter.`id` as `id`, Veranstalter._User_uid as _User_uid, `Veranstalter`.`Verein` as `Verein`, `Veranstalter`.`Ansprechperson_Vorname` as `Ansprechperson_Vorname`, `Veranstalter`.`Ansprechperson_Nachname` as `Ansprechperson_Nachname`, `Veranstalter`.`Ansprechperson_Telefonnummer` as `Ansprechperson_Telefonnummer`, `Veranstalter`.`Ansprechperson_Email` as `Ansprechperson_Email` from Veranstalter';
const SQL_DELETE='DELETE FROM Veranstalter WHERE id=?';
const SQL_PRIMARY='id';

const SQL_SELECT_Laufevent_a='select Veranstalter.id as id, Veranstalter.Verein as Verein, Veranstalter.Ansprechperson_Vorname as Ansprechperson_Vorname, Veranstalter.Ansprechperson_Nachname as Ansprechperson_Nachname, Veranstalter.Ansprechperson_Telefonnummer as Ansprechperson_Telefonnummer, Veranstalter.Ansprechperson_Email as Ansprechperson_Email from Veranstalter where Veranstalter.id = ?';
const SQL_SELECT_User_uid='select Veranstalter.id as id, Veranstalter.Verein as Verein, Veranstalter.Ansprechperson_Vorname as Ansprechperson_Vorname, Veranstalter.Ansprechperson_Nachname as Ansprechperson_Nachname, Veranstalter.Ansprechperson_Telefonnummer as Ansprechperson_Telefonnummer, Veranstalter.Ansprechperson_Email as Ansprechperson_Email from Veranstalter where Veranstalter._User_uid=?';
}

Veranstalter::$dataScheme=db::buildScheme("Veranstalter");
$fp = fopen("models/json/Veranstalter_complete.json", "w");
fwrite($fp, json_encode(Veranstalter::$dataScheme,JSON_UNESCAPED_UNICODE));
fclose($fp);
Veranstalter::$settings=db::loadSettings("Veranstalter");
$fp = fopen("models/json/Veranstalter_settings_complete.json", "w");
fwrite($fp, json_encode(Veranstalter::$settings,JSON_UNESCAPED_UNICODE));
fclose($fp);
