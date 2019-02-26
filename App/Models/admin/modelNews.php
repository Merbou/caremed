<?php
require_once ("App/Models/model.php"); 

class modelNews extends model{


    public function setNews($post){
  
        $bdd=$this->getBdd();
        
        if(empty($post['news'])) {
            $bdd->query("DELETE FROM news");
        return;
        }
        
        //connexion a la BDD
    
        $donnee=$bdd->query("select MAX(id) from news ")->fetch();
        
        $req=(!empty($donnee))?
        "INSERT INTO news (text) VALUES('".$post['news']."')":
        "UPDATE news set text='".$post['news']."' where id=".$donnee['id'] ;
         $requete=$bdd->query($req);
        }


        public function getNews(){
        
            
        //connexion a la BDD
        $bdd=$this->getBdd();
    
        
        $req="SELECT * FROM news";
        $requete=$bdd->query($req)->fetchAll();
        if($requete)return $requete[count($requete)-1];
        

        }
  
       

}