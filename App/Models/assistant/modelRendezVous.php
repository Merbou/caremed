<?php
require_once ("App/Models/model.php"); 

class modelRendezVous extends model{

    private $id,$user_id,$type_soin,$descrip_rv,$created_at,$modification_at;
    private $rendez_vous,$rvs;
   
    function __construct(){
        $this->rvs=$this->searchRV();
        
    }


    public function searchRV(){

           //connexion a la BDD
           $bdd=$this->getBdd();
                
           ///insert la requete si tout est parfait
           $req="SELECT * FROM `rendez_vous`";
           
           $requete=$bdd->query($req)->fetchAll();
           
            return $this->getArrayAll($requete);
           
           
    }

///////organiser tout les rendez vous non affetcer
    public function getArrayAll($RVS){
     
        
        $this->rendez_vous=[];
        $i=0;
        foreach($RVS as $rv){
            if (empty($rv['date_rv'])){
                $this->rendez_vous[$i]['id']=$rv['id'];
                $this->rendez_vous[$i]['user']=$rv['user_id'];
                $this->rendez_vous[$i]['descrip']=$rv['descrip_rv'];
                $this->rendez_vous[$i]['soin']=$rv['type_soin'];
                $this->rendez_vous[$i]['created_at']=$rv['created_at'];
                $this->rendez_vous[$i]['modification_at']=$rv['modification_at'];
                $i++;}
            }
            
        return $this->rendez_vous ;


    }




    public function getSpeParMedecin(){
        require_once("App/Models/modelUser.php");
        require_once ("App/Models/modelSoin.php"); 


        $spe=new modelSoin();
        

        ///get All spe
        $spesArray=$spe->getAllSoins();
        
        $bdd=$this->getBdd();
        
        
        ///get all medecin-spe
        $AllspeMedecin=$this->getMedecinSpe($bdd);
        


        // ///get all medecin
        // $AllMedecin=$this->getAllMedecin($bdd);
        
        


        return $this->afficterMedecin($AllspeMedecin,$spesArray);
        
        
        
        
    }
    
    
            private function getMedecinSpe($bdd){
                
                $req=$bdd->query('SELECT * FROM medecin');
                
                return $req->fetchAll();
                
            }
      
      

            private function getAllMedecin($bdd){
                    return $bdd->query("SELECT * FROM users WHERE compte_type='medecin'");
            }



            private function afficterMedecin($AllspeMedecin,$spesArray){

                $medecinParSpe=[];

                $i=0;
                
                foreach($AllspeMedecin as $SM){
                        //get 'medecin' selon id_medecin dans la table medecin
                    $medecin=new modelUser($SM['user_id']);

                        //affecter le parametre de medecin dans la table $medecinParSpe
                    $medecinParSpe[$i]['id']=$medecin->getId();
                    $medecinParSpe[$i]['NameMr']=$medecin->getName();
                    $medecinParSpe[$i]['FirstNameMr']=$medecin->getFirstName();

                    foreach($spesArray as $spe){
                        if($SM['specialite_id']==$spe['id']){
                            //avoir tout les specialites de ce 'medecin' 
                            $medecinParSpe[$i]['specialite']=$spe['type_soin'];
                        }
                    }
                    $i++;

                }

                return $medecinParSpe;
            
            }







    public function setRendezVousModel($post){

          //connexion a la BDD
          $bdd=$this->getBdd();
          $date = date('Y-m-d', strtotime($post['dateAffecter']));
                
          ///insert la requete si tout est parfait
          $req=$this->getReqSetRv($post) ;
          
          $bdd->query($req);

          $req=$this->getReqInsertDossier($post);
          
          $requete=$bdd->query($req); 
          



           return $requete;

    }


        private function getReqSetRv($post){
            return "UPDATE `rendez_vous` SET  date_rv='".$post['dateAffecter']."' 
            WHERE type_soin='".$post['soin']."' AND user_id=".$post['patient_id'];
        }

        private function getReqInsertDossier($post){
            return "INSERT INTO  dossier(titre,patient_id,medecin_id)
            VALUE('".$post['soin']."',".$post['patient_id'].",".$post['medecinAffecter'].")";

        }




    public function getId(){
        return $this->rendez_vous['id'];
    }
            public function getType_soin(){
                return $this->rendez_vous['type_soin'];
            }
                public function getDescrip_rv(){
                    return $this->rendez_vous['descrip_rv'];
                }
                    public function getCreated_at(){
                        return $this->rendez_vous['created_at'];
                    }
                        public function getModification_at(){
                            return $this->rendez_vous['modification_at'];
                        }

}