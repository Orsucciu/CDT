<?php

class PdoSuivicours
{
    private $serveur = 'mysql:host=localhost';
    private $bdd = 'dbname=suivicours';
    private $user = 'userSuivi';
    private $mdp = 'mdpSuivi2015';
    private $monPdo;
    public $test;
    /**
     * Constructeur
     **/
    function __construct(){
       $this->monPdo = new PDO($this->serveur.';'.$this->bdd, $this->user, $this->mdp);
       $this->monPdo->query("SET CHARACTER SET utf8");
       
    }

    /**
     * Retourne les informations d'un etudiant
     * @param $login
     * @return l'id, le nom et le prénom sous la forme d'un tableau associatif
     */
    public function getInfosEtudiant($login){
        $req = "select * from etudiant where login='$login' ";
        $rs = $this->monPdo->query($req);
        $ligne = $rs->fetch();
        return $ligne;
    }
    public function getInfosProf($login){
        $req = "select * from professeur where login='$login' ";
        $rs = $this->monPdo->query($req);
        $ligne = $rs->fetch();
        return $ligne;
    }
    
    public function setInfosUsers($table, $login,$nom,$prenom,$mail,$classe)
    {
        
    if($table=="etudiant"){
    $req="INSERT INTO $table VALUES('".$login."','".$nom."','".$prenom."','".$mail."','".$classe."')";
    $this->monPdo->exec($req);
    }
    else
    {
        $req="INSERT INTO $table VALUES('".$login."','".$nom."','".$prenom."','".$mail."');";
        $this->monPdo->exec($req);
    }

    }
    public function getInfosProfMat($login){
        $req = "select * from prof_classe where login='$login' ";
        $rs = $this->monPdo->query($req);
        $ligne = $rs->fetch();
        return $ligne;
    }
    public function setInfosMat($login)
    {   for($i=1;$i<=count($_SESSION["classe"]);$i++){
        $req="INSERT INTO prof_classe VALUES('".$login."','".substr($_SESSION["classe"][$i],7)."', 'non')";
        $this->monPdo->exec($req);
    }
}

    }