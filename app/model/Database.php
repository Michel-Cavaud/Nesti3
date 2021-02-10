<?php

    $source = "./app/config/configSQL.php";
    if (file_exists($source)) {
            require_once $source;
    }else{
        require_once '../config/configSQL.php';
    }
   
    
    
    
    class Database { 
      
       
        private static $pdo = null;
        
        static function connect() {            
            try { 
                self::$pdo = new PDO( "mysql:host=".HOSTNAME.";"."dbname=".DB, USER, PASSWD, [PDO::ATTR_PERSISTENT=>true]); 
            } catch(PDOException $e) { 
                die("Erreur de connexion à la base de données. Merci de contacter votre administrateur"); 
            }  
        }
        
        public static function disconnect()
        {
            self::$pdo = null;
        }
        
        public static function getPdo(): PDO {
            if(self::$pdo == null){
                self::connect();
            }
            return self::$pdo;
        }
    }