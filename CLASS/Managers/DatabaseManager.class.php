<?php

class DatabaseManager
{
    static public function getConnection()
    {
        try
        {
            $db = new PDO('mysql:host=localhost;dbname=sklep', 'root', '',[
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
            return $db;
        }

        catch(PDOException $e)
        {
            echo 'Error: ' . $e->getMessage();
        }
        
    }

    static public function selectBySQL($SQL)
    {
        $db = self::getConnection();
        
        $result = $db->query($SQL);

        if(!$result) {

            return false;

        } else {
            
            $row = $result->fetchAll();
        
        }

        if(count($row) > 0) {
            return $row;
        } else {
            return false;
        }
        
        
        $db->closeCursor();
        
    }

    static public function updateTable($TABLE, $SET, $WHERE = Array(), $OPER = "AND") 
    {
        $db = self::getConnection();

        $SQL = "UPDATE {$TABLE} SET ";

        foreach($SET as $key => $val) {

            $SQL .= $key."='".$val."',";
        }

        $SQL = rtrim($SQL, ',');

        if(count($WHERE) > 0) {

            $SQL .= " WHERE ";

            foreach($WHERE as $key => $val) {
                
                $SQL .= $key."='".$val."' ".$OPER." ";
            }

            $SQL = substr($SQL, 0, strlen($SQL)-(strlen($OPER)+2));

        }

        $result = $db->prepare($SQL);
        $result->execute();

        if($result) {
            return true;
        } else {
            return false;
        }

        $db->closeCursor();
    }

    static public function deleteFrom($TABLE, $WHERE=Array(), $OPER = "AND") 
    {
        $db = self::getConnection();

        $SQL = "DELETE FROM {$TABLE}";

        if(count($WHERE) > 0) {

            $SQL .= " WHERE ";

            foreach($WHERE as $key => $val) {

                $SQL .= $key."='".$val."' ".$OPER." ";

            }

            $SQL = substr($SQL, 0, strlen($SQL) - (strlen($OPER)+2));

        }

        $result = $db->prepare($SQL);
        $result->execute();

        if(!($result)) {
            return false;
        } else {
            return true;
        }

        $db->closeCursor();
    }

    static function InsertInto($TABLE, $DATA)
    {
        $db = self::getConnection();

        $SQL  = "INSERT INTO {$TABLE}";
        $SQL .= " (";

        foreach($DATA as $key => $val) {
            
            $SQL .= $key.",";
        }

        $SQL  = rtrim($SQL, ",");
        $SQL .= ") ";
        $SQL .= "VALUES";
        $SQL .= " (";

        foreach($DATA as $val) {
            $SQL .= "'".$val."',";
        }

        $SQL  = rtrim($SQL, ',');
        $SQL .= ")";

        $result = $db->prepare($SQL);
        $result->execute();

        if(!($result)) {
            return false;
        } else {
            return true;
        }

        $db->closeCursor();

    }

}