<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of admin
 *
 * @author a
 */
require '../Personne.php';
//pas obligatoirement en majuscules, on va demarrer une session pour que a chaque fois qu on utilise admin .php, on ouvre une session
session_start();
require '../../../connexion.php';
class admin extends Personne{
    //put your code here
    //pour les attributs il faut specifier la visibilité
    public $login;
    public $photo;

    //il ne faut pas oublier kle mot cke function
    public function __construct($id,$nom,$prenom,$email,$mots_passe,$sexe,$login,$photo)
    {
        parent::__construct($id, $nom, $prenom, $email,$mots_passe, $sexe);

        $this->login=$login;
        $this->photo=$photo;
      
    }
     public function affiche(){
     parent::affiche();
     echo $this->login.' , ';
     echo $this->photo.' , ';

   
 }
    public function insertion($query){
     parent::insert($query);
     //au lieu de faire toutes ls instructions suivantes on peut faire $id_ad=$con->lastInsertId();
     
     $id_ad=$query->lastInsertId();
    /* $st=$con->prepare("select * from personne order by id desc"); 
     
     $st->execute();
     $row=$st->fetch();
     $id_ad=$row['ID']; 
     * */
     
     $st=$query->prepare("insert into admin values(?,?,?)");
     //$id=last_insert_id()
     $st->execute(array($id_ad,$this->login,$this->photo));
     
     

 }
 //la methode verifier permet de verifier si son login et son mot de passe sont corrects
 public function verifier($query){
     $st=$query->prepare("select * from admin where login=? and mots_passe=?");
     $st->execute(array($this->login,$this->mots_passe));
     $num=$st->rowCount();
     //var_dump($num);
     if($num==1)
     {
         $row=$st->fetch();
         //la variable session doit eter en majuscules
         $_SESSION['id_s']=$row['id_admin'];
         header("location:profile.php");
         
         echo 'vous etes connecté(e)';
     }
     
         else 
             echo 'votre login n\'est pas dans la base';
 }
 
 //redefinition l afonction selection_id
  public function selection_id($query,$id){
      parent::selection_id($query,$id);
      $st=$query->prepare("select * from admin where ID=?");
     $st->execute(array($id));
     $row=$st->fetch();
     $this->login=$row['login'];
     $this->mots_passe=$row['mots_passe'];  
      
  }
    
    
    
}