<?php
require_once ("App/Models/model.php"); 

class modelHoraire extends model{


    public function setHoriare($post){
        //connexion a la BDD
        $bdd=$this->getBdd();
                      
        $req=$this->getReq(['jour'=>'samedi','h_ouverture'=>$post['ouverture1'],'h_fermeteur'=>$post['fermeteur1'],'active'=>empty($post['active1'])?'':$post['active1']],$bdd);

        $req=$this->getReq(['jour'=>'dimanche','h_ouverture'=>$post['ouverture2'],'h_fermeteur'=>$post['fermeteur2'],'active'=>empty($post['active2'])?'':$post['active2']],$bdd);

        $req=$this->getReq(['jour'=>'lundi','h_ouverture'=>$post['ouverture3'],'h_fermeteur'=>$post['fermeteur3'],'active'=>empty($post['active3'])?'':$post['active3']],$bdd);

        $req=$this->getReq(['jour'=>'mardi','h_ouverture'=>$post['ouverture4'],'h_fermeteur'=>$post['fermeteur4'],'active'=>empty($post['active4'])?'':$post['active4']],$bdd);

        $req=$this->getReq(['jour'=>'mercredi','h_ouverture'=>$post['ouverture5'],'h_fermeteur'=>$post['fermeteur5'],'active'=>empty($post['active5'])?'':$post['active5']],$bdd);

        $req=$this->getReq(['jour'=>'jeudi','h_ouverture'=>$post['ouverture6'],'h_fermeteur'=>$post['fermeteur6'],'active'=>empty($post['active6'])?'':$post['active6']],$bdd);

        

    }

    private function getReq($jour,$bdd){
        $active=empty($jour['active'])?0:1;
        $h_ouverture=empty($jour['h_ouverture'])?'':"h_ouverture='".$jour['h_ouverture']."',";
        $h_fermeteur=empty($jour['h_fermeteur'])?'':"h_fermeteur='".$jour['h_fermeteur']."',";
        

        $req ="UPDATE horaire SET
        ".$h_ouverture."
         ".$h_fermeteur."
         active=$active
        WHERE jour='".$jour['jour']."'";

        return $requete=$bdd->query($req);

    }

    
    public function getHoraires(){
        $req="SELECT * FROM horaire";
        $bdd=$this->getBdd();
        return $bdd->query($req)->fetchAll();
                      
    }



}