<?php
/**
* Classe d'accès aux données Utilise les services de la classe PDO
* Les attributs sont tous statiques, les 4 premiers pour la connexion
* $monPdo qui contiendra l'unique instance de la classe
*/
class MonPdo
{
    private static $serveur = 'mysql:host=srvmysql.btssio.dedyn.io';
    private static $bdd = 'dbname=BOREELO_biblio'; 
    private static $user = 'BOREELO'; 
    private static $mdp = '15022005';
    private static $monPdo;
    private static $unPdo = null;

    // Constructeur privé, crée l'instance de PDO qui sera sollicitée
    // pour toutes les méthodes de la classe
    private function __construct()
    {
        try {
            MonPdo::$unPdo = new PDO(MonPdo::$serveur.';'.MonPdo::$bdd, MonPdo::$user, MonPdo::$mdp);
            MonPdo::$unPdo->query("SET CHARACTER SET utf8");
            MonPdo::$unPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Erreur de connexion : ' . $e->getMessage();
            die();
        }
    }

    public function __destruct()
    { 
        MonPdo::$unPdo = null;
    }

    /**
    * Fonction statique qui crée l'unique instance de la classe
    * Appel : $instanceMonPdo = MonPdo::getInstance();
    * @return l'unique objet de la classe MonPdo
    */
    public static function getInstance()
    {
        if (self::$unPdo == null) {
            self::$monPdo = new MonPdo();
        }
        return self::$unPdo;
    }
}
?>