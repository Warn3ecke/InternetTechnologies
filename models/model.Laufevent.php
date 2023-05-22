<?php
class Laufevent extends DB{

//Variablenliste
public $id;
public $c_ts;
public $m_ts;
public static $settings=array();
public static $access = true;
public $Titel;
public $Beschreibung;
public $Datum;
public $Ameldefrist;
public $Anmeldegebuehr;
public $Ort_PLZ;
public $Ort_Ort;
public $Ort_Strasse;
public $Koordinaten_Laengengrad;
public $Koordinaten_Breitengrad;
public $Ausschreibung_upload;
public $Ausschreibung_path;
public $Ausschreibung_title;
public $_Veranstalter;
public $ts;

public $dataMapping=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme

public static $dataScheme=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme

//Konstanten
const SQL_INSERT='INSERT INTO Laufevent (_Veranstalter, `Titel` , `Beschreibung` , `Datum` , `Ameldefrist` , `Anmeldegebuehr` , `Ort_PLZ` , `Ort_Ort` , `Ort_Strasse` , `Koordinaten_Laengengrad` , `Koordinaten_Breitengrad` , `Ausschreibung_upload` , `Ausschreibung_path` , `Ausschreibung_title` ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
const SQL_UPDATE='UPDATE Laufevent SET _Veranstalter=?, `Titel` =?, `Beschreibung` =?, `Datum` =?, `Ameldefrist` =?, `Anmeldegebuehr` =?, `Ort_PLZ` =?, `Ort_Ort` =?, `Ort_Strasse` =?, `Koordinaten_Laengengrad` =?, `Koordinaten_Breitengrad` =?, `Ausschreibung_upload` =?, `Ausschreibung_path` =?, `Ausschreibung_title` =? where id=?';
const SQL_SELECT_PK='SELECT Laufevent.`c_ts` as `c_ts`, Laufevent.`m_ts` as `m_ts`, Laufevent.`id` as `id`, Laufevent._Veranstalter as _Veranstalter, `Laufevent`.`Titel` as `Titel`, `Laufevent`.`Beschreibung` as `Beschreibung`, `Laufevent`.`Datum` as `Datum`, `Laufevent`.`Ameldefrist` as `Ameldefrist`, `Laufevent`.`Anmeldegebuehr` as `Anmeldegebuehr`, `Laufevent`.`Ort_PLZ` as `Ort_PLZ`, `Laufevent`.`Ort_Ort` as `Ort_Ort`, `Laufevent`.`Ort_Strasse` as `Ort_Strasse`, `Laufevent`.`Koordinaten_Laengengrad` as `Koordinaten_Laengengrad`, `Laufevent`.`Koordinaten_Breitengrad` as `Koordinaten_Breitengrad`, `Laufevent`.`Ausschreibung_path` as `Ausschreibung_path`, `Laufevent`.`Ausschreibung_title` as `Ausschreibung_title` from Laufevent where Laufevent.`id` = ?';
const SQL_SELECT_ALL='SELECT Laufevent.`c_ts` as `c_ts`, Laufevent.`m_ts` as `m_ts`, Laufevent.`id` as `id`, Laufevent._Veranstalter as _Veranstalter, `Laufevent`.`Titel` as `Titel`, `Laufevent`.`Beschreibung` as `Beschreibung`, `Laufevent`.`Datum` as `Datum`, `Laufevent`.`Ameldefrist` as `Ameldefrist`, `Laufevent`.`Anmeldegebuehr` as `Anmeldegebuehr`, `Laufevent`.`Ort_PLZ` as `Ort_PLZ`, `Laufevent`.`Ort_Ort` as `Ort_Ort`, `Laufevent`.`Ort_Strasse` as `Ort_Strasse`, `Laufevent`.`Koordinaten_Laengengrad` as `Koordinaten_Laengengrad`, `Laufevent`.`Koordinaten_Breitengrad` as `Koordinaten_Breitengrad`, `Laufevent`.`Ausschreibung_path` as `Ausschreibung_path`, `Laufevent`.`Ausschreibung_title` as `Ausschreibung_title` from Laufevent';
const SQL_SELECT_IGNORE_DERIVED='SELECT DISTINCT Laufevent.`c_ts` as `c_ts`, Laufevent.`m_ts` as `m_ts`, Laufevent.`id` as `id`, Laufevent._Veranstalter as _Veranstalter, `Laufevent`.`Titel` as `Titel`, `Laufevent`.`Beschreibung` as `Beschreibung`, `Laufevent`.`Datum` as `Datum`, `Laufevent`.`Ameldefrist` as `Ameldefrist`, `Laufevent`.`Anmeldegebuehr` as `Anmeldegebuehr`, `Laufevent`.`Ort_PLZ` as `Ort_PLZ`, `Laufevent`.`Ort_Ort` as `Ort_Ort`, `Laufevent`.`Ort_Strasse` as `Ort_Strasse`, `Laufevent`.`Koordinaten_Laengengrad` as `Koordinaten_Laengengrad`, `Laufevent`.`Koordinaten_Breitengrad` as `Koordinaten_Breitengrad`, `Laufevent`.`Ausschreibung_path` as `Ausschreibung_path`, `Laufevent`.`Ausschreibung_title` as `Ausschreibung_title` from Laufevent';
const SQL_DELETE='DELETE FROM Laufevent WHERE id=?';
const SQL_PRIMARY='id';

const SQL_SELECT_Veranstalter='select Laufevent.id as id, Laufevent.Titel as Titel, Laufevent.Beschreibung as Beschreibung, Laufevent.Datum as Datum, Laufevent.Ameldefrist as Ameldefrist, Laufevent.Anmeldegebuehr as Anmeldegebuehr, Laufevent.Ort_PLZ as Ort_PLZ, Laufevent.Ort_Ort as Ort_Ort, Laufevent.Ort_Strasse as Ort_Strasse, Laufevent.Koordinaten_Laengengrad as Koordinaten_Laengengrad, Laufevent.Koordinaten_Breitengrad as Koordinaten_Breitengrad, Laufevent.Ausschreibung_path as Ausschreibung_path, Laufevent.Ausschreibung_title as Ausschreibung_title from Laufevent where Laufevent._Veranstalter = ?';
const SQL_SELECT_Lauf_a='select Laufevent.id as id, Laufevent.Titel as Titel, Laufevent.Beschreibung as Beschreibung, Laufevent.Datum as Datum, Laufevent.Ameldefrist as Ameldefrist, Laufevent.Anmeldegebuehr as Anmeldegebuehr, Laufevent.Ort_PLZ as Ort_PLZ, Laufevent.Ort_Ort as Ort_Ort, Laufevent.Ort_Strasse as Ort_Strasse, Laufevent.Koordinaten_Laengengrad as Koordinaten_Laengengrad, Laufevent.Koordinaten_Breitengrad as Koordinaten_Breitengrad, Laufevent.Ausschreibung_path as Ausschreibung_path, Laufevent.Ausschreibung_title as Ausschreibung_title from Laufevent where Laufevent.id = ?';
}

Laufevent::$dataScheme=db::buildScheme("Laufevent");
$fp = fopen("models/json/Laufevent_complete.json", "w");
fwrite($fp, json_encode(Laufevent::$dataScheme,JSON_UNESCAPED_UNICODE));
fclose($fp);
Laufevent::$settings=db::loadSettings("Laufevent");
$fp = fopen("models/json/Laufevent_settings_complete.json", "w");
fwrite($fp, json_encode(Laufevent::$settings,JSON_UNESCAPED_UNICODE));
fclose($fp);
