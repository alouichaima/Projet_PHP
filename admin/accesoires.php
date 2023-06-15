
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Accesoires
 *
 * @author IMS
 */
require '../connexion.php';


class accesoire {
  public $id;
    public $nom; 
   public $prix; 
   public $image;
 public function __construct($id,$nom,$prix,$image){
     $this->id=$id;
     $this->nom=$nom;                 
     $this->prix=$prix;                         
     $this->image=$image;             
            
 }
 public function affiche(){
     echo $this->nom.' , ';
     echo $this->prix.' , ';
     echo $this->image;
 }
 public function insert($conn){
     $st=$conn->prepare("insert into accesoire values(default,?,?,?)");
     $st->execute(array($this->nom,$this->prix,$this->image));
     
    
 
    }
 public function selection($conn){
   
     $st=$conn->prepare("select * from accesoire");
  $st->execute();
     
     return $st;
     
 } 
 
 //un methode qui prend en valeur la connexion a la base et le id pour lequel on veut sélectionner les informations de l abase
 public function selection_id($conn,$id){
     //requete parametrée
     $st=$conn->prepare("select * from accesoire where ID=?");
     $st->execute(array($id));
     $row=$st->fetch();
     $this->nom=$row['nom'];
     $this->prix=$row['prix'];
     $this->image=$row['image'];
 }
 //la fonction update prend en valeur la connexion et l'identifian tqui a été récupéré
 public function update ($conn,$id){
     //preparer  la requete de mise a jour
     $st=$conn->prepare("update accesoire set nom=?,prix=?,image=? where ID=?");
     //executer la requete sur les valeurs de la accesoire sélectionnée
     $r=$st->execute(array($this->nom,$this->prix,$this->image,$id));
     //var_dump($r);
     
 }
 //la meme chose pour la suppression
 public function supprimer($conn,$id){
     $st=$conn->prepare("delete from accesoire where ID=?");
     $st->execute(array($id));
 }
}

?>
