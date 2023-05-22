<?php
class Laeufer extends DB{

//Variablenliste
public $id;
public $c_ts;
public $m_ts;
public static $settings=array();
public static $access = true;
public $Geschlecht;
public $Alter;
public $Bestaetigung;
public $Bruttozeit;
public $Nettozeit;
public $Altersklasse;
public $Info_Vorname;
public $Info_Nachname;
public $Info_Telefonnummer;
public $Info_Email;
public $Ort_PLZ;
public $Ort_Ort;
public $Ort_Strasse;
public $Bankdaten_Vorname;
public $Bankdaten_Nachname;
public $Bankdaten_IBAN;
public $Bankdaten_BIC;
public $_Lauf;
public $ts;

public $dataMapping=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme

public static $dataScheme=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme

//Konstanten
const SQL_INSERT='INSERT INTO Laeufer (_Lauf, `Geschlecht` , `Alter` , `Bestaetigung` , `Bruttozeit` , `Nettozeit` , `Altersklasse` , `Info_Vorname` , `Info_Nachname` , `Info_Telefonnummer` , `Info_Email` , `Ort_PLZ` , `Ort_Ort` , `Ort_Strasse` , `Bankdaten_Vorname` , `Bankdaten_Nachname` , `Bankdaten_IBAN` , `Bankdaten_BIC` ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
const SQL_UPDATE='UPDATE Laeufer SET _Lauf=?, `Geschlecht` =?, `Alter` =?, `Bestaetigung` =?, `Bruttozeit` =?, `Nettozeit` =?, `Altersklasse` =?, `Info_Vorname` =?, `Info_Nachname` =?, `Info_Telefonnummer` =?, `Info_Email` =?, `Ort_PLZ` =?, `Ort_Ort` =?, `Ort_Strasse` =?, `Bankdaten_Vorname` =?, `Bankdaten_Nachname` =?, `Bankdaten_IBAN` =?, `Bankdaten_BIC` =? where id=?';
const SQL_SELECT_PK='SELECT Laeufer.`c_ts` as `c_ts`, Laeufer.`m_ts` as `m_ts`, Laeufer.`id` as `id`, Laeufer._Lauf as _Lauf, `GeschlechtT0`.`literal` as `Geschlecht_literal`, `Laeufer`.`Geschlecht` as `Geschlecht`, `Laeufer`.`Alter` as `Alter`, `BestaetigungT1`.`literal` as `Bestaetigung_literal`, `Laeufer`.`Bestaetigung` as `Bestaetigung`, `Laeufer`.`Bruttozeit` as `Bruttozeit`, `Laeufer`.`Nettozeit` as `Nettozeit`, `AltersklasseT2`.`literal` as `Altersklasse_literal`, `Laeufer`.`Altersklasse` as `Altersklasse`, `Laeufer`.`Info_Vorname` as `Info_Vorname`, `Laeufer`.`Info_Nachname` as `Info_Nachname`, `Laeufer`.`Info_Telefonnummer` as `Info_Telefonnummer`, `Laeufer`.`Info_Email` as `Info_Email`, `Laeufer`.`Ort_PLZ` as `Ort_PLZ`, `Laeufer`.`Ort_Ort` as `Ort_Ort`, `Laeufer`.`Ort_Strasse` as `Ort_Strasse`, `Laeufer`.`Bankdaten_Vorname` as `Bankdaten_Vorname`, `Laeufer`.`Bankdaten_Nachname` as `Bankdaten_Nachname`, `Laeufer`.`Bankdaten_IBAN` as `Bankdaten_IBAN`, `Laeufer`.`Bankdaten_BIC` as `Bankdaten_BIC` from Laeufer left join `GeschlechtT` as GeschlechtT0 on `Laeufer`.`Geschlecht` = `GeschlechtT0`.`id`  left join `BestaetigungT` as BestaetigungT1 on `Laeufer`.`Bestaetigung` = `BestaetigungT1`.`id`  left join `AltersklasseT` as AltersklasseT2 on `Laeufer`.`Altersklasse` = `AltersklasseT2`.`id`  where Laeufer.`id` = ?';
const SQL_SELECT_ALL='SELECT Laeufer.`c_ts` as `c_ts`, Laeufer.`m_ts` as `m_ts`, Laeufer.`id` as `id`, Laeufer._Lauf as _Lauf, `GeschlechtT0`.`literal` as `Geschlecht_literal`, `Laeufer`.`Geschlecht` as `Geschlecht`, `Laeufer`.`Alter` as `Alter`, `BestaetigungT1`.`literal` as `Bestaetigung_literal`, `Laeufer`.`Bestaetigung` as `Bestaetigung`, `Laeufer`.`Bruttozeit` as `Bruttozeit`, `Laeufer`.`Nettozeit` as `Nettozeit`, `AltersklasseT2`.`literal` as `Altersklasse_literal`, `Laeufer`.`Altersklasse` as `Altersklasse`, `Laeufer`.`Info_Vorname` as `Info_Vorname`, `Laeufer`.`Info_Nachname` as `Info_Nachname`, `Laeufer`.`Info_Telefonnummer` as `Info_Telefonnummer`, `Laeufer`.`Info_Email` as `Info_Email`, `Laeufer`.`Ort_PLZ` as `Ort_PLZ`, `Laeufer`.`Ort_Ort` as `Ort_Ort`, `Laeufer`.`Ort_Strasse` as `Ort_Strasse`, `Laeufer`.`Bankdaten_Vorname` as `Bankdaten_Vorname`, `Laeufer`.`Bankdaten_Nachname` as `Bankdaten_Nachname`, `Laeufer`.`Bankdaten_IBAN` as `Bankdaten_IBAN`, `Laeufer`.`Bankdaten_BIC` as `Bankdaten_BIC` from Laeufer left join `GeschlechtT` as GeschlechtT0 on `Laeufer`.`Geschlecht` = `GeschlechtT0`.`id`  left join `BestaetigungT` as BestaetigungT1 on `Laeufer`.`Bestaetigung` = `BestaetigungT1`.`id`  left join `AltersklasseT` as AltersklasseT2 on `Laeufer`.`Altersklasse` = `AltersklasseT2`.`id` ';
const SQL_SELECT_IGNORE_DERIVED='SELECT DISTINCT Laeufer.`c_ts` as `c_ts`, Laeufer.`m_ts` as `m_ts`, Laeufer.`id` as `id`, Laeufer._Lauf as _Lauf, `GeschlechtT0`.`literal` as `Geschlecht_literal`, `Laeufer`.`Geschlecht` as `Geschlecht`, `Laeufer`.`Alter` as `Alter`, `BestaetigungT1`.`literal` as `Bestaetigung_literal`, `Laeufer`.`Bestaetigung` as `Bestaetigung`, `Laeufer`.`Bruttozeit` as `Bruttozeit`, `Laeufer`.`Nettozeit` as `Nettozeit`, `AltersklasseT2`.`literal` as `Altersklasse_literal`, `Laeufer`.`Altersklasse` as `Altersklasse`, `Laeufer`.`Info_Vorname` as `Info_Vorname`, `Laeufer`.`Info_Nachname` as `Info_Nachname`, `Laeufer`.`Info_Telefonnummer` as `Info_Telefonnummer`, `Laeufer`.`Info_Email` as `Info_Email`, `Laeufer`.`Ort_PLZ` as `Ort_PLZ`, `Laeufer`.`Ort_Ort` as `Ort_Ort`, `Laeufer`.`Ort_Strasse` as `Ort_Strasse`, `Laeufer`.`Bankdaten_Vorname` as `Bankdaten_Vorname`, `Laeufer`.`Bankdaten_Nachname` as `Bankdaten_Nachname`, `Laeufer`.`Bankdaten_IBAN` as `Bankdaten_IBAN`, `Laeufer`.`Bankdaten_BIC` as `Bankdaten_BIC` from Laeufer left join `GeschlechtT` as GeschlechtT0 on `Laeufer`.`Geschlecht` = `GeschlechtT0`.`id`  left join `BestaetigungT` as BestaetigungT1 on `Laeufer`.`Bestaetigung` = `BestaetigungT1`.`id`  left join `AltersklasseT` as AltersklasseT2 on `Laeufer`.`Altersklasse` = `AltersklasseT2`.`id` ';
const SQL_DELETE='DELETE FROM Laeufer WHERE id=?';
const SQL_PRIMARY='id';

const SQL_SELECT_Lauf='select Laeufer.id as id, `GeschlechtT0`.`literal` as `Geschlecht_literal`, `Laeufer`.`Geschlecht` as `Geschlecht`, Laeufer.Alter as Alter, `BestaetigungT1`.`literal` as `Bestaetigung_literal`, `Laeufer`.`Bestaetigung` as `Bestaetigung`, Laeufer.Bruttozeit as Bruttozeit, Laeufer.Nettozeit as Nettozeit, `AltersklasseT2`.`literal` as `Altersklasse_literal`, `Laeufer`.`Altersklasse` as `Altersklasse`, Laeufer.Info_Vorname as Info_Vorname, Laeufer.Info_Nachname as Info_Nachname, Laeufer.Info_Telefonnummer as Info_Telefonnummer, Laeufer.Info_Email as Info_Email, Laeufer.Ort_PLZ as Ort_PLZ, Laeufer.Ort_Ort as Ort_Ort, Laeufer.Ort_Strasse as Ort_Strasse, Laeufer.Bankdaten_Vorname as Bankdaten_Vorname, Laeufer.Bankdaten_Nachname as Bankdaten_Nachname, Laeufer.Bankdaten_IBAN as Bankdaten_IBAN, Laeufer.Bankdaten_BIC as Bankdaten_BIC from Laeufer left join `GeschlechtT` as GeschlechtT0 on `Laeufer`.`Geschlecht` = `GeschlechtT0`.`id`  left join `BestaetigungT` as BestaetigungT1 on `Laeufer`.`Bestaetigung` = `BestaetigungT1`.`id`  left join `AltersklasseT` as AltersklasseT2 on `Laeufer`.`Altersklasse` = `AltersklasseT2`.`id`  where Laeufer._Lauf = ?';
}

Laeufer::$dataScheme=db::buildScheme("Laeufer");
$fp = fopen("models/json/Laeufer_complete.json", "w");
fwrite($fp, json_encode(Laeufer::$dataScheme,JSON_UNESCAPED_UNICODE));
fclose($fp);
Laeufer::$settings=db::loadSettings("Laeufer");
$fp = fopen("models/json/Laeufer_settings_complete.json", "w");
fwrite($fp, json_encode(Laeufer::$settings,JSON_UNESCAPED_UNICODE));
fclose($fp);
