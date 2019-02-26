<?php
require_once ("App/Models/model.php"); 

class modelResultat extends model{

    private $id_dossier ,$descrip_resultat,$message;

    function __construct($id_dossier){
        $this->id_dossier=$id_dossier;
    }

    public function searchResultat(){
        $bdd=$this->getBdd();

        $req="SELECT * FROM `resultat` where dossier_id=$this->id_dossier";
        
        $response=$bdd->query($req);

        return $this->getAllResultat($response->fetchAll());
    
    }


    private function getAllResultat($resultats){
        $resultat=[];
        $i=0;
        foreach($resultats as $resultatBdd){
            $resultat[$i]['descrip_resultat']=$resultatBdd['descrip_resultat'];
            $resultat[$i]['path_file']=$resultatBdd['path_file'];
            $i++;
            
        }

    return $resultat;
    }



    public function insertExam($post,$errorsOrPath){
        
        if(!empty($post['descrip_resultat'])){$this->descrip_resultat=$post['descrip_resultat'];
            

              //connexion a la BDD
              $bdd=$this->getBdd();
                  ///insert la requete si tout est parfait
              $req="INSERT INTO resultat (descrip_resultat,path_file,dossier_id) VALUES (?,?,?)";
              
              $requete=$bdd->prepare($req);
   
              return $requete->execute(array($this->descrip_resultat,$errorsOrPath,$this->id_dossier));
    }

}
 






            public function searchMessages($user_out,$user_in){

                $bdd=$this->getBdd();

                return $bdd->query("SELECT * FROM `message` WHERE
                (user_in=$user_in and user_out=$user_out) OR 
                (user_out=$user_in and user_in=$user_out)
                ORDER BY ID DESC LIMIT 10 ")
                ->fetchAll();


            }


            public function insertMessage($post,$user_out,$user_in){
                    
                if(!empty($post['message'])){$this->message=$post['message'];

                    //connexion a la BDD
                    $bdd=$this->getBdd();
                    ///insert la requete si tout est parfait
                    $req="INSERT INTO message (user_in,user_out,message) VALUES (?,?,?)";
                    
                    $requete=$bdd->prepare($req);

                    return $requete->execute(array($user_in,$user_out,$post['message']));
            }

    }




        public function getDescrip_resultat(){
            if(!empty($this->descrip_resultat))return $this->descrip_resultat;

        }

        public function getMessage(){
            if(!empty($this->message))return $this->message;

        }
        

       

}