<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Personne
 *
 * @author a
 */
//mettre cette instruction ici pour s'assurer que  a chaque fois qu on utilise personne on appelle la connexion
//attention de ne pas oublier les cotes pour le nom de fichier


// require '../../connexion.php';
class Personne {
    
    //put your code here
    /* private $id;
    private $nom;
    private $prenom;
    private $age;
    private $sexe;
    private $ville;
    private $competences;
    private $photo;
     */
    public $id;
    public $nom;
   public $prenom;
   public $email;
   public $mots_passe;
   public $sexe;
    function Personne($id,$nom,$prenom,$email,$mots_passe,$sexe)
    {
        $this->id=$id;
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->email=$email;
        $this->mots_passe=$mots_passe;
        $this->sexe=$sexe;    
        
    }
    function affiche()
    {
        
        echo('nom est     '.$this->nom);
        echo'<br>';
        echo('le prénom est '.$this->prenom);
        echo'<br>';
        echo('l\'email est'.$this->email);
        echo'<br>';
        echo('le mots passe  est'.$this->mots_passe);
        echo'<br>';
        echo('le sexe est'.$this->sexe);
      
         
    }
    function insertion ($query)
    {//preparation de la requete
        $statement=$query->prepare("insert into personne values(default,?,?,?,?,?)");
        //$var_dump permet de verifier si tout va bien, si oui elle affiche true sinon
        //executer la erquete     
        $r= $statement->execute(array($this->nom,$this->prenom,$this->email, $this->mots_passe ,$this->sexe));


 
    }
    
    function selection($query)
    {
        $statement=$query->prepare("select * from personne");
        $statement->execute();
        return $statement;     
    }

        //un methode qui prend en valeur la connexion a la base et le id pour lequel on veut sélectionner les informations de l abase
 public function selection_id($query,$id){
    //requete parametrée
    $statment=$query->prepare("select * from personne where id=?");
    $statment->execute(array($id));
    $row=$statment->fetch();
    $this->nom=$row['nom'];
    $this->prenom=$row['prenom'];
    $this->email=$row['email'];
    $this->sexe=$row['sexe'];
}
//la fonction update prend en valeur la connexion et l'identifian tqui a été récupéré
public function update ($query,$id){
    //preparer  la requete de mise a jour
    $statment= $query->prepare("UPDATE personne SET nom=:nom, prenom=:prenom,email=:email,sexe=:sexe WHERE  id=:id");

    //executer la requete sur les valeurs de la personne sélectionnée
    $r= $statment->execute(array($this->nom,$this->prenom,$this->email,$this->sexe,$id));
    //var_dump($r);
    
}


    
    function affectation($query)
    {
        $st=$query->prepare("select * from personne");
        $st->execute();
        return $st;
        
        
    }
        
    
}