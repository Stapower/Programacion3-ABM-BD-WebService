<?php
class AccesoDatos
{
    private static $ObjetoAccesoDatos;
    private $objetoPDO;
 
    private function __construct()
    {
        try { 
            $dsn = 'mysql:dbname=mascotas;host=localhost';
            $usuario = 'root';//'id135609_stapower';
            $contraseña = '';//'t38127739';
            //$mbd = new PDO($dsn, $usuario, $contraseña, array(PDO::ATTR_EMULATE_PREPARES => false,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            $this->objetoPDO = new PDO($dsn, $usuario, $contraseña, array(PDO::ATTR_EMULATE_PREPARES => false,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                //$mbd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
            $this->objetoPDO->exec("SET CHARACTER SET utf8");
            //echo "Connected successfully";
            } 
        catch (PDOException $e) { 
            print "Error!: " . $e->getMessage(); 
            die();
        }
    }

    public function RetornarConsulta($sql)
    { 
            return $this->objetoPDO->prepare($sql); 
    }
     public function RetornarUltimoIdInsertado()
    { 
        return $this->objetoPDO->lastInsertId(); 
    }
 
    public static function dameUnObjetoAcceso()
    { 
        if (!isset(self::$ObjetoAccesoDatos)) {          
            self::$ObjetoAccesoDatos = new AccesoDatos(); 
        } 
        return self::$ObjetoAccesoDatos;        
    }
 
 
     // Evita que el objeto se pueda clonar
    public function __clone()
    { 
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR); 
    }
}
?>