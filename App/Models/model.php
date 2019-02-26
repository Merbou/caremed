<?php 
abstract class model {

    protected static $bdd;

    //Connexion a la base de donne
    private static function setBdd(){
        self::$bdd=new PDO("mysql:host=localhost;dbname=caremed;charset=utf8","root","");
        self::$bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    }

    //Recupirer la Connexion a la base de donne
    protected function getBdd(){
        if(self::$bdd==null)
        self::setBdd();
        return self::$bdd;
    }

}

