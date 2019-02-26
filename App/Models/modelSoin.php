<?php
require_once ("App/Models/model.php"); 

class modelsoin extends model{

    private $id,$type_soin,$created_at,$modification_at;

    



    public function getAllSoins(){

        //connexion a la BDD
        $bdd=$this->getBdd();
             
        $req="SELECT * FROM `soins`";
        
        $request=$bdd->query($req);

        
        return $request->fetchAll();
 }



    public function getSoinType($id){

           //connexion a la BDD
           $bdd=$this->getBdd();
                            
           $req="SELECT * FROM `soins` where `id`=$this->id";
           
           $request=$bdd->query($req);

           return $request->fetch();
    }


    // public function getID(){
    //     return $this->id;
    // }

    // public function getType_soin(){
    //     return $this->type_soin;
    // }
    // public function getDateCreate(){
    //     return $this->created_at;
    // }
    // public function getDateModification(){
    //     return $this->modification_at;
    // }




}