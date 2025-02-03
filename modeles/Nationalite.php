<?php 
class Nationalite {

    private $num ;

    private $libelle;
/**
 * numContient
 *
 * @var int
 */
    private $numContient;          
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
 * @return contient
 */
public function getNumContient()
{
return $this->numContient :: findyById($this->numContient); // on recupere le contient 
}

/**
 * Set the value of numContient
 */
public function setNumContient(Contient $contient): self
{
$this->numContient = $Contient->getNum();

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
 * @return contient objet contient trouve
 */

public static function findById(int $id) :nationalite
{
    $req=MonPdo::getInstance()-> prepare("select * from contient where num= :id"); //on le demande de selectioner le num qui se nom id  avec where
    $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'contient'); //on veut recuperer la class
    $req->binParam('id',$id);
    $req->execute();
    $leResultat=$req->fetchAll();
    return $leResultat; // c est plus les resultat mais c'est le du num prit
}

/**
 * permettre a ajouter
 * @param integer $contient contient a ajouter
 * @return contient resultat (1 si l'operation a reussi , 0 sinon)
 */


public static function  add(contient $contient) :int
{
    $req=MonPdo::getInstance()-> prepare("insert * from natioanlite(libelle,numContient) values(:libelle, :numContient)"); //
    $req->binParam(':libelle',$natioanlite->getLibelle());
    $req->binParam(':numContient',$natioanlite->NumContient());
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
$req->binParam(':numContient',$natioanlite->NumContient());
$nb=$req->execute();   
return $nb; 


/**
 * permettre de supprimer
 */


}
public static function  delete(contient $contient) :int // la suppression
{
    $req=MonPdo::getInstance()-> prepare ("delete contient where num= :id "); 
$req->binParam('id',$contient->getNum());
$nb=$req->execute();   
return $nb; //
}


    } 