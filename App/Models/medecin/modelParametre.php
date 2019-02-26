<?php
require_once ("App/Models/model.php"); 

class modelParametre extends model{


    public function setSpe($id,$post){

           //connexion a la BDD
           $bdd=$this->getBdd();
           
           
            ///////////////////////insert la spe///////////////////////////////
            $spe=strtolower($post["specialite"]);

           $req=$this->searchSpe($spe);

           $specialite_id=$bdd->query($req)->fetch();
 
           if(empty($specialite_id)){
                $req=$this->getReqInsertSpe($spe);

                if(!empty($bdd->query($req))){

                    ///////////////////////lie la spe avec medecin ///////////////////////////////
                    
                                $req=$this->getReqInsertSpeMedecin($id,$bdd->lastInsertId()); 
                                $bdd->query($req);
                  

                }
            }else { 

                  ///////////////////////lie la spe avec medecin ///////////////////////////////
                    
                  $req=$this->getReqInsertSpeMedecin($id,$specialite_id['id']); 
                  $bdd->query($req);
    

            }
    
        return "Success";
    
    //////////////////////////////////////////////////////
    
    }
    
            private function  searchSpe($spe){
            
                
                return "SELECT id FROM `soins` WHERE type_soin='$spe'";
                
        }

        private function getReqInsertSpe($spe){

            return "INSERT INTO 
            soins (type_soin,created_at,modification_at) 
                VALUES ('$spe',NOW(),NOW());";
                
            }
        

            private function getReqInsertSpeMedecin($id,$idSpe){
            
                return "INSERT INTO medecin(user_id,specialite_id) VALUES ($id,".$idSpe.")";; 
                
                
            }



}