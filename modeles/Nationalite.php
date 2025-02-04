<?php 
class Nationalite {

    private $num ;

    private $libelle;
/**
 * numContient
 *
 * @var int
 */
    private $numContinent;          
    /**
     * Numero du contient
     * @var int 
     */

    public function getNum()
    {
    return $this->num;
    }

    /**
     * Libele du contient 
     *  @var string
     */
    
    public function setNum($num): self
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
 * Renvoie l'objet contient
 * @return continent
 */
public function getNumContinent()
{
return $this->numContinent :: findyById($this->numContinent); // on recupere le contient 
}

/**
 * Set the value of numContient
 */
public function setNumContinent(Contient $contient): self
{
$this->numContinent = $Continent->getNum();

return $this;
}



    /**
     * retourne l'ensemble nationalite
     *
     * @return nationalite [] tableau d'objet contient
     */
    public static function findAll():arry
    {
        $req=MonPdo::getInstance()-> prepare("select n.num, n.libelle as 'libnation' , c.libelle as 'libcontinent' from nationalite n, continent c where n.numContinent=c.num");
        $req->setFetchMode(PDO::FETCH_OBJ,);
        $req->execute();
        $lesResultats=$req->fetchAll();
        return $lesResultats;
}


/**
 * trouve une nationalite par son num
 * @param integer $id numero continent
 * @return continent objet contient trouve
 */

public static function findById(int $id) :nationalite
{
    $req=MonPdo::getInstance()-> prepare("select * from continent where num= :id"); //on le demande de selectioner le num qui se nom id  avec where
    $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'continent'); //on veut recuperer la class
    $req->binParam('id',$id);
    $req->execute();
    $leResultat=$req->fetchAll();
    return $leResultat; // c est plus les resultat mais c'est le du num prit
}

/**
 * permettre a ajouter
 * @param integer $contient contient a ajouter
 * @return continent resultat (1 si l'operation a reussi , 0 sinon)
 */


public static function  add(contient $contient) :int
{
    $req=MonPdo::getInstance()-> prepare("insert * from nationalite(libelle,numContinent) values(:libelle, :numContinent)"); //
    $req->binParam(':libelle',$natioanlite->getLibelle());
    $req->binParam(':numContinent',$natioanlite->NumContinent());
    $nb=$req->execute();   
    return $nb; //
}
/**
 * permettre modifier
 * @param integer $contient contient a modifier
 * @return contient resultat (1 si l'operation a reussi , 0 sinon)
 */

public static function  update(nationalite $natioanlite) :int
{
$req=MonPdo::getInstance()-> prepare ("update natioanlite set libelle= :libelle, numContient= :numContient where num=id");
$req->binParam('id',$natioanlite->getNum());
$req->binParam('libelle',$natioanlite->getLibelle());
$req->binParam(':numContinent',$natioanlite->NumContinent());
$nb=$req->execute();   
return $nb; 


/**
 * permettre de supprimer
 */


}
public static function  delete(continent $continent) :int // la suppression
{
    $req=MonPdo::getInstance()-> prepare ("delete continent where num= :id "); 
$req->binParam('id',$continent->getNum());
$nb=$req->execute();   
return $nb; //
}


    } 