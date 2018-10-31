<?php

/**
 * Classe d'acces aux donnees.

 * Utilise les services de la classe PDO
 * pour l'application exempleMVC du cours sur la bdd bddemployes
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO
 * $monPdo qui contiendra l'unique instance de la classe
 * @package default
 * @author AP
 * @version    1.0
 * @link       http://www.php.net/manual/fr/book.pdo.php
 */
class PdoGsb {

    private static $serveur = 'mysql:host=localhost';
    private static $bdd = 'dbname=frangin';
    private static $user = 'root';
    private static $mdp = '';
    private static $monPdo;
    private static $monPdoGsb = null;

    /**
     * Constructeur prive, cree l'instance de PDO qui sera sollicitee
     * pour toutes les methodes de la classe
     */
    private function __construct() {
        try {
            PdoGsb::$monPdo = new PDO(PdoGsb::$serveur . ';' . PdoGsb::$bdd, PdoGsb::$user, PdoGsb::$mdp);
            PdoGsb::$monPdo->query("SET CHARACTER SET utf8");
        } catch (Exception $e) {
            throw new Exception("Erreur ?  la connexion \n" . $e->getMessage());
        }
    }

    public function _destruct() {
        PdoGsb::$monPdo = null;
    }

    /**
     * Fonction statique qui cree l'unique instance de la classe PdoExemple

     * Appel : $instancePdoExemple = PdoExemple::getPdoExemple();

     * @return l'unique objet de la classe PdoExemple
     */
    public static function getPdoGsb() {
        if (PdoGsb::$monPdoGsb == null) {
            PdoGsb::$monPdoGsb = new PdoGsb();
        }
        return PdoGsb::$monPdoGsb;
    }

    public function getInfosUser($login, $mdp) {
        // retourne un tableau associatif contenant le visiteur
        $req = "SELECT * FROM USER where LOGIN = '$login' and MDP = '$mdp'";
        $rs = PdoGsb::$monPdo->query($req);
        $ligne = $rs->fetch(PDO::FETCH_ASSOC);
        return $ligne;
    }

    public function getInfosUserId($id) {
        $req = "SELECT * FROM USER where id = '$id'";
        $rs = PdoGsb::$monPdo->query($req);
        $ligne = $rs->fetch(PDO::FETCH_ASSOC);
        return $ligne;
    }

    public function getSandwichs() {
        $req = "SELECT * FROM Sandwich";
        $rs = PdoGsb::$monPdo->query($req);
        $ligne = $rs->fetchAll();
        return $ligne;
    }

    public function getSauces() {
        $req = "SELECT * FROM SAUCE";
        $rs = PdoGsb::$monPdo->query($req);
        $ligne = $rs->fetchAll();
        return $ligne;
    }

    public function getIngredients() {
        $req = "SELECT * FROM ingredient where id != 0";
        $rs = PdoGsb::$monPdo->query($req);
        $ligne = $rs->fetchAll();
        return $ligne;
    }

    public function getEvent($id) {
        $req = "SELECT * FROM EVENT where id = '$id'";
        $rs = PdoGsb::$monPdo->query($req);
        $ligne = $rs->fetch(PDO::FETCH_ASSOC);
        return $ligne;
    }

    public function getEvents() {
        $req = "SELECT * FROM EVENT WHERE  date > DATE(SYSDATE());";
        $rs = PdoGsb::$monPdo->query($req);
        $ligne = $rs->fetchAll();
        return $ligne;
    }

    public function getFav($idU) {
        $req = "SELECT * FROM commande WHERE idUser = '$idU' and idEvent = '00000'";
        $rs = PdoGsb::$monPdo->query($req);
        $ligne = $rs->fetch(PDO::FETCH_ASSOC);
        return $ligne;
    }

    public function getCommande($idU,$idE){
      $req = "SELECT B.nom as burger, salade, tomate, oignon, S.nom as s1, R.nom as s2, I.nom as retirer,( select GROUP_CONCAT(J.nom SEPARATOR \" + \") from supplement inner join ingredient J on j.id = idI where C.idUser = idU and C.idEvent = idE group by idU, idE ) As supplement FROM commande C Inner join sandwich B on B.id = idBurger INNER Join sauce S on S.id = idS1 Left Join sauce R on R.id = idS2 Left join ingredient I on I.id = aRetirer WHERE idUser = '$idU' and idEvent = '$idE'";
      $rs = PdoGsb::$monPdo->query($req);
      $ligne = $rs->fetch(PDO::FETCH_ASSOC);
      return $ligne;
    }

    public function getIngredientsS($idS){
      $req = "select GROUP_CONCAT(Concat(i.nom, \" x\",c.nombre) SEPARATOR \", \") as ingredients from contenusandwich c inner join ingredient i on c.idI = i.id  Where idS = '$idS' group by c.idS";
      $rs = PdoGsb::$monPdo->query($req);
      $ligne = $rs->fetch(PDO::FETCH_ASSOC);
      return $ligne;
    }

    public function getIngredientsS2($idS){
      $req = "select idI, i.nom as nom from contenusandwich c inner join ingredient i on c.idI = i.id  Where idS = '$idS' order by idI;";
      $rs = PdoGsb::$monPdo->query($req);
      $ligne = $rs->fetchAll();
      return $ligne;
    }

    public function setCommande($idU, $idE,$idB, $s, $t, $o, $s1, $s2,$sans) {
        $req = "INSERT INTO commande (idUser, idEvent, valide, idBurger, salade, tomate, oignon, idS1, idS2, aRetirer) VALUES(".$idU.", ".$idE.", 0, ".$idB.", ".$s.", ".$t.", ".$o.", ".$s1.", ".$s2.", ".$sans.");";
        PdoGsb::$monPdo->exec($req);
    }

    public function setSupp($idU, $idE,$idI) {
        $req = "INSERT INTO supplement (idU, idE, idI) VALUES(".$idU.", ".$idE.", ".$idI.");";
        PdoGsb::$monPdo->exec($req);
    }

    public function delComm($idU, $idE){
      $req = "Delete from commande where idUser = '$idU' and idEvent = '$idE';";
      PdoGsb::$monPdo->exec($req);
    }

    public function delSupp($idU, $idE){
      $req = "Delete from supplement where idU = '$idU' and idE = '$idE';";
      PdoGsb::$monPdo->exec($req);
    }

}

?>
