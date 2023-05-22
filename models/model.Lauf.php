<?php
class Lauf extends DB{

//Variablenliste
public $id;
public $c_ts;
public $m_ts;
public static $settings=array();
public static $access = true;
public $Titel;
public $Kategorie;
public $Beschreibung;
public $Startzeit;
public $Streckenlaenge;
public $Preis;
public $Streckenplan_upload;
public $Streckenplan_path;
public $Streckenplan_title;
public $Streckeprofil_upload;
public $Streckeprofil_path;
public $Streckeprofil_title;
public $_Laufevent;
public $ts;

public $dataMapping=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme

public static $dataScheme=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme

//Konstanten
const SQL_INSERT='INSERT INTO Lauf (_Laufevent, `Titel` , `Kategorie` , `Beschreibung` , `Startzeit` , `Streckenlaenge` , `Preis` , `Streckenplan_upload` , `Streckenplan_path` , `Streckenplan_title` , `Streckeprofil_upload` , `Streckeprofil_path` , `Streckeprofil_title` ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
const SQL_UPDATE='UPDATE Lauf SET _Laufevent=?, `Titel` =?, `Kategorie` =?, `Beschreibung` =?, `Startzeit` =?, `Streckenlaenge` =?, `Preis` =?, `Streckenplan_upload` =?, `Streckenplan_path` =?, `Streckenplan_title` =?, `Streckeprofil_upload` =?, `Streckeprofil_path` =?, `Streckeprofil_title` =? where id=?';
const SQL_SELECT_PK='SELECT Lauf.`c_ts` as `c_ts`, Lauf.`m_ts` as `m_ts`, Lauf.`id` as `id`, Lauf._Laufevent as _Laufevent, `Lauf`.`Titel` as `Titel`, `KategorieT0`.`literal` as `Kategorie_literal`, `Lauf`.`Kategorie` as `Kategorie`, `Lauf`.`Beschreibung` as `Beschreibung`, `Lauf`.`Startzeit` as `Startzeit`, `Lauf`.`Streckenlaenge` as `Streckenlaenge`, `Lauf`.`Preis` as `Preis`, `Lauf`.`Streckenplan_path` as `Streckenplan_path`, `Lauf`.`Streckenplan_title` as `Streckenplan_title`, `Lauf`.`Streckeprofil_path` as `Streckeprofil_path`, `Lauf`.`Streckeprofil_title` as `Streckeprofil_title` from Lauf left join `KategorieT` as KategorieT0 on `Lauf`.`Kategorie` = `KategorieT0`.`id`  where Lauf.`id` = ?';
const SQL_SELECT_ALL='SELECT Lauf.`c_ts` as `c_ts`, Lauf.`m_ts` as `m_ts`, Lauf.`id` as `id`, Lauf._Laufevent as _Laufevent, `Lauf`.`Titel` as `Titel`, `KategorieT0`.`literal` as `Kategorie_literal`, `Lauf`.`Kategorie` as `Kategorie`, `Lauf`.`Beschreibung` as `Beschreibung`, `Lauf`.`Startzeit` as `Startzeit`, `Lauf`.`Streckenlaenge` as `Streckenlaenge`, `Lauf`.`Preis` as `Preis`, `Lauf`.`Streckenplan_path` as `Streckenplan_path`, `Lauf`.`Streckenplan_title` as `Streckenplan_title`, `Lauf`.`Streckeprofil_path` as `Streckeprofil_path`, `Lauf`.`Streckeprofil_title` as `Streckeprofil_title` from Lauf left join `KategorieT` as KategorieT0 on `Lauf`.`Kategorie` = `KategorieT0`.`id` ';
const SQL_SELECT_IGNORE_DERIVED='SELECT DISTINCT Lauf.`c_ts` as `c_ts`, Lauf.`m_ts` as `m_ts`, Lauf.`id` as `id`, Lauf._Laufevent as _Laufevent, `Lauf`.`Titel` as `Titel`, `KategorieT0`.`literal` as `Kategorie_literal`, `Lauf`.`Kategorie` as `Kategorie`, `Lauf`.`Beschreibung` as `Beschreibung`, `Lauf`.`Startzeit` as `Startzeit`, `Lauf`.`Streckenlaenge` as `Streckenlaenge`, `Lauf`.`Preis` as `Preis`, `Lauf`.`Streckenplan_path` as `Streckenplan_path`, `Lauf`.`Streckenplan_title` as `Streckenplan_title`, `Lauf`.`Streckeprofil_path` as `Streckeprofil_path`, `Lauf`.`Streckeprofil_title` as `Streckeprofil_title` from Lauf left join `KategorieT` as KategorieT0 on `Lauf`.`Kategorie` = `KategorieT0`.`id` ';
const SQL_DELETE='DELETE FROM Lauf WHERE id=?';
const SQL_PRIMARY='id';

const SQL_SELECT_Laufevent='select Lauf.id as id, Lauf.Titel as Titel, `KategorieT0`.`literal` as `Kategorie_literal`, `Lauf`.`Kategorie` as `Kategorie`, Lauf.Beschreibung as Beschreibung, Lauf.Startzeit as Startzeit, Lauf.Streckenlaenge as Streckenlaenge, Lauf.Preis as Preis, Lauf.Streckenplan_path as Streckenplan_path, Lauf.Streckenplan_title as Streckenplan_title, Lauf.Streckeprofil_path as Streckeprofil_path, Lauf.Streckeprofil_title as Streckeprofil_title from Lauf left join `KategorieT` as KategorieT0 on `Lauf`.`Kategorie` = `KategorieT0`.`id`  where Lauf._Laufevent = ?';
const SQL_SELECT_Laeufer_a='select Lauf.id as id, Lauf.Titel as Titel, `KategorieT0`.`literal` as `Kategorie_literal`, `Lauf`.`Kategorie` as `Kategorie`, Lauf.Beschreibung as Beschreibung, Lauf.Startzeit as Startzeit, Lauf.Streckenlaenge as Streckenlaenge, Lauf.Preis as Preis, Lauf.Streckenplan_path as Streckenplan_path, Lauf.Streckenplan_title as Streckenplan_title, Lauf.Streckeprofil_path as Streckeprofil_path, Lauf.Streckeprofil_title as Streckeprofil_title from Lauf left join `KategorieT` as KategorieT0 on `Lauf`.`Kategorie` = `KategorieT0`.`id`  where Lauf.id = ?';
}

Lauf::$dataScheme=db::buildScheme("Lauf");
$fp = fopen("models/json/Lauf_complete.json", "w");
fwrite($fp, json_encode(Lauf::$dataScheme,JSON_UNESCAPED_UNICODE));
fclose($fp);
Lauf::$settings=db::loadSettings("Lauf");
$fp = fopen("models/json/Lauf_settings_complete.json", "w");
fwrite($fp, json_encode(Lauf::$settings,JSON_UNESCAPED_UNICODE));
fclose($fp);
