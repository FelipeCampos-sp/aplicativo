<?php

abstract class Model {
    private static $Host    = HOST;
    private static $User    = USER;
    private static $Pass    = PASS;
    private static $DB      = DBNAME;
    
    /** @var PDO */
    private static $Connect = null;
    
    private static function connected() {
        try {
            if(self::$Connect == null):
                $dsn = 'mysql:host='.self::$Host.';dbname='.self::$DB;
                $options = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'];
                self::$Connect = new PDO($dsn, self::$User, self::$Pass, $options);
            endif;
        } catch (PDOException $e) {
           echo $e->getMessage();
            die;
        }
        
        self::$Connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return self::$Connect;
    }
    
    public static function getConn() {
        return self::connected();
    }
}
