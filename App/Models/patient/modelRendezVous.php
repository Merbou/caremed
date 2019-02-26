<?php
require_once ("App/Models/model.php"); 
require_once ("App/Models/modelSoin.php"); 

class modelRendezVous extends model{

    private $id,$user_id,$type_soin,$descrip_rv,$created_at,$modification_at;

    function __construct($post){
        
        /////inialiser les valeurs des champs de formulaire
        if(!empty($post['type_soin']))$this->type_soin=(string) $post['type_soin'];
        if(!empty($post['descrip']))$this->descrip_rv=(string) $post['descrip'];
        $this->user_id=(int)$_SESSION['id'];
        
    }


    public function insertRV(){

           //connexion a la BDD
           $bdd=$this->getBdd();
                
           ///insert la requete si tout est parfait
           $req="INSERT INTO rendez_vous (user_id,type_soin,descrip_rv,created_at,modification_at) VALUES (?,?,?,NOW(),NOW())";
           
           $requete=$bdd->prepare($req);

           return $requete->execute(array($this->user_id,$this->type_soin,$this->descrip_rv));
           
           
    }


    public function getId(){
        return $this->id;
    }
            public function getType_soin(){
                return $this->type_soin;
            }
                public function getDescrip_rv(){
                    return $this->descrip_rv;
                }
                    public function getCreated_at(){
                        return $this->created_at;
                    }
                        public function getModification_at(){
                            return $this->modification_at;
                        }

}