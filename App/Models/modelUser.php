<?php 

require_once("App/Models/model.php");

 class  modelUser extends model
 {
private $id ,$name ,$firstName,$email,$compte_type;


        function __construct($id){
       
       if(!empty($id)){ 
            $this->id=(int) $id;
            $this->searchAttbUser();
        }
        }
       

        private function searchAttbUser(){

            $bdd=$this->getBdd();

            $req="SELECT `nom`,`prenom`,`email`,`compte_type` FROM `users` where id=$this->id";
            $response=$bdd->query($req);
            $this->setAtt($response->fetch());            
        }
        
        
        private function setAtt($donne){
            
            $this->name=$donne['nom'];
            $this->firstName=$donne['prenom'];
            $this->email=$donne['email'];
            $this->compte_type=$donne['compte_type'];
        
        } 


        public function getAllPatients(){
             
            $bdd=$this->getBdd();

            $req="SELECT `id`,`nom`,`prenom`,`email`,`compte_type` FROM `users` where compte_type='patient' ";
            $response=$bdd->query($req);

           return $response->fetchAll();

        }









        public function getPatients($post){

            if( empty($post['recherche']))return ;
          
            $bdd=$this->getBdd(); 

            $elementsRechercher=explode(' ',$post['recherche']);     
            
           
            $req=$this->getConditionRecherche($elementsRechercher);
           
            
            $response=$bdd->query($req);
            return $response->fetchAll();

        }


            private function getConditionRecherche($elementsRechercher){
        
                if(count($elementsRechercher)==1){                 
    
                    $req=$this->getReqSearchOneAtt($elementsRechercher);
                       
                        
                
            }else {
                $req=$this->getReqSearchMoreAtt($elementsRechercher);
                
            }
            return $req;

            }


                private function getReqSearchOneAtt($elementsRechercher){

                    return "SELECT `id`,`nom`,`prenom`,`email` FROM `users` where
                    compte_type='patient' AND(
                    id= ".(int)$elementsRechercher[0]." OR 
                    nom='$elementsRechercher[0]' OR
                    prenom='$elementsRechercher[0]'
                    )";

                }


                private function getReqSearchMoreAtt($elementsRechercher){

                    return "SELECT `id`,`nom`,`prenom`,`email` FROM `users` where
                    compte_type='patient' AND (
                    
                    (nom='$elementsRechercher[0]' AND
                    prenom='$elementsRechercher[1]')
                     OR
                    (nom='$elementsRechercher[1]' AND 
                    prenom='$elementsRechercher[0]')    )       
                    
                    ";

                }



                public function getcomptes($compte_type){

                    if(!empty($compte_type))

                    $req="SELECT `id`,`nom`,`prenom`,`email`,`compte_type`
                     FROM `users` where compte_type='$compte_type' ";
                    else
                    $req="SELECT `id`,`nom`,`prenom`,`email`,`compte_type`
                     FROM `users` where id <> $this->id ";

                    $bdd=$this->getBdd();

                    $response=$bdd->query($req);
        
                   return $response->fetchAll();
        

                }

                public function getMedecin(){

        
                    $req="SELECT u.`id`,`nom`,`prenom`,`email`,`compte_type`,`type_soin` 
                    FROM `users` as u , `medecin` as  m,`soins` as s
                     where  u.id=m.user_id AND m.specialite_id=s.id";
        
                    $bdd=$this->getBdd();

                    $response=$bdd->query($req);
        
                   return $response->fetchAll();
        
                }



                    public function delete(){

                        $bdd=$this->getBdd();

                        $req="DELETE  FROM `users` where id = $this->id ";
                        $response=$bdd->query($req);
            
                    }









        
        public function getId(){
            return $this->id;
        }

        public function getName(){
            return $this->name;
        }
        
        public function getFirstName(){
            return $this->firstName;
        }
        
        public function getEmail(){
            return $this->email;
        }

        public function getCompte_type(){
            return $this->compte_type;
        }

        

 }