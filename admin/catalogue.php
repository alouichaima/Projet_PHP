
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**

 *
 * @author IMS
 */
require '../connexion.php';

class catalogue {
  public $id;
    public $nom; 
   public $description; 
   public $image;
 public function __construct($id,$nom,$description,$image){
     $this->id=$id;
     $this->nom=$nom;                 
     $this->description=$description; 
     $this->image=$image;             
            
 }
 public function affiche(){
     echo $this->nom.' , ';
     echo $this->description.' , ';
     echo $this->image;
 }
 public function insert($conn){
     $st=$conn->prepare("insert into catalogue values(default,?,?,?)");
     $st->execute(array($this->nom,$this->description,$this->image));

    }
 public function selection($conn){
   
     $st=$conn->prepare("select * from catalogue");
      $st->execute();
     return $st;
     
 } 
 
 //un methode qui prend en valeur la connexion a la base et le id pour lequel on veut sélectionner les informations de l abase
 public function selection_id($conn,$id){
     //requete parametrée
     $st=$conn->prepare("select * from catalogue where ID=?");
     $st->execute(array($id));
     $row=$st->fetch();
     $this->nom=$row['nom'];
     $this->description=$row['description'];
     $this->image=$row['image'];
 }
 //la fonction update prend en valeur la connexion et l'identifian tqui a été récupéré
 public function update ($conn,$id){
     //preparer  la requete de mise a jour
     $st=$conn->prepare("update catalogue set nom=?,description=?,image=? where ID=?");
     //executer la requete sur les valeurs de le produit homme sélectionnée
     $r=$st->execute(array($this->nom,$this->description,$this->image,$id));
     //var_dump($r);
     
 }
 //la meme chose pour la suppression
 public function supprimer($conn,$id){
     $st=$conn->prepare("delete from catalogue where ID=?");
     $st->execute(array($id));
 }
}

?>
