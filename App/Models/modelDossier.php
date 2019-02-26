<?php
require_once ("App/Models/model.php"); 

class modelDossier extends model{

    private $id;


    public function searchDossiers($id){
        $this->id=(int)$id;        

        
            $bdd=$this->getBdd();

            $req="SELECT * FROM `dossier` where patient_id=$this->id";
            $response=$bdd->query($req);

            return $this->getAllDossier($response->fetchAll());
        
    }

    private function getAllDossier($AllDossier){
        require_once ("App/Models/modelUser.php");
        $DossierPatient=[];
        $i=0;
        foreach($AllDossier as $dossier){
            $medecin=new modelUser($dossier['medecin_id']);
            $patient=new modelUser($this->id);
            $DossierPatient[$i]['id']=$dossier['id'];            
            $DossierPatient[$i]['medecin_id']['name']=$medecin->getName();
            $DossierPatient[$i]['medecin_id']['firstName']=$medecin->getFirstName();
            
            $DossierPatient[$i]['patient_id']['name']=$patient->getName();
            $DossierPatient[$i]['patient_id']['firstName']=$patient->getFirstName();
            
            $DossierPatient[$i]['soin']=$dossier['titre'];
        $i++;
        }
        

        return $DossierPatient;


    }


    public function getDossier($id){
        $bdd=$this->getBdd();

        $req="SELECT * FROM `dossier` where id=$id";
        $response=$bdd->query($req);

        return $response->fetch();
    }



}