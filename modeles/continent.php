<?php 
class continent {

    private $num;
    private $libelle;

    /**
     * Numero du continent
     * @var int 
     */
    public function getNum()
    {
        return $this->num;
    }

    /**
     * Libele du continent 
     * @var string
     */
    public function setNum(int $num): self
    {
        $this->num = $num;
        return $this;
    }

    /**
     * lit le libelle
     *
     * @return void
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * ecrit dans le libelle
     */
    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;
        return $this;
    }

    /**
     * retourne l'ensemble continent
     *
     * @return Continent[] tableau d'objet continent
     */
    public static function findAll(): array
    {
        $req = MonPdo::getInstance()->prepare("SELECT * FROM continent");
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'continent');
        $req->execute();
        $lesResultats = $req->fetchAll();
        return $lesResultats;
    }

    /**
     * trouve un continent par son num
     * @param integer $id numero continent
     * @return continent objet continent trouvé
     */
    public static function findById(int $id): continent
    {
        $req = MonPdo::getInstance()->prepare("SELECT * FROM continent WHERE num = :id"); //on le demande de selectioner le num qui se nom id avec where
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'continent'); //on veut recuperer la class
        $req->bindParam('id', $id);
        $req->execute();
        $leResultat = $req->fetch();
        return $leResultat; // c'est plus les résultats mais c'est le du num prit
    }

    /**
     * permettre d'ajouter
     * @param integer $continent continent à ajouter
     * @return int résultat (1 si l'opération a réussi, 0 sinon)
     */
    public static function add(continent $continent): int
    {
        $req = MonPdo::getInstance()->prepare("INSERT INTO continent (libelle) VALUES (:libelle)"); //
        $libelle = $continent->getLibelle();
        $req->bindParam('libelle', $libelle);
        $nb = $req->execute();   
        return $nb; //
    }

    /**
     * permettre de modifier
     * @param integer $continent continent à modifier
     * @return int résultat (1 si l'opération a réussi, 0 sinon)
     */
    public static function update(continent $continent): int
    {
        $req = MonPdo::getInstance()->prepare("UPDATE continent SET libelle = :libelle WHERE num = :num"); //
        $num = $continent->getNum();
        $libelle = $continent->getLibelle();
        $req->bindParam('num', $num);
        $req->bindParam('libelle', $libelle);
        $nb = $req->execute();   
        return $nb; //
    }

    /**
     * permettre de supprimer
     * @param continent $continent la suppression
     * @return int résultat (1 si l'opération a réussi, 0 sinon)
     */
    public static function delete(continent $continent): int
    {
        $req = MonPdo::getInstance()->prepare("DELETE FROM continent WHERE num = :id"); 
        $req->bindParam('id', $continent->getNum());
        $nb = $req->execute();   
        return $nb; //
    }
}
