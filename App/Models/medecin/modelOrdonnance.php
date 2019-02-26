<?php
require_once ("App/Models/model.php"); 

class modelOrdonnance extends model{
private $medicaments;






/////////////////////////////////////Set//////////////////////////////////////////////
    public function setOrdo($post,$id_Patient){

        //connexion a la BDD
        $bdd=$this->getBdd();
        
        
        //insert l'ordonnace  de patient (sans medicament)
        $req=$this->getReqInsertOrdo($post['titre_ordo'],$id_Patient);
        $bdd->query($req);

        
        //afficter tout les medicament dans un var sans les autres champs
        $this->medicaments=$this->getAllMedi($post);

         
        //insert les medicament dans lordannace precedente
        $this->queryMultiple($bdd,$bdd->lastInsertId());
        
    }


            ///retourner la req INSERT ordonance
    private function getReqInsertOrdo($titre,$id_Patient){

        return "INSERT INTO ordonnance(titre,patient_id,created_at,modification_at) 
        VALUES('".$titre."',$id_Patient,NOW(),NOW())
        ";

    }

    //avoir tout les medi
    private function getAllMedi($post){
        $medicaments=[];

        foreach($post as $formName =>$formArray){

            if ($formName != 'titre_ordo')
            $medicaments[$formName]=$formArray;

        }
        return $medicaments;

    }



    


    
    
  //insertion de tout les reqs de medi 
  
    private function queryMultiple($bdd,$id){
    $keyForm=['nom_medi','descrip_medi','qnt_medi'];
    $medi=[];
    
    
    $size=max(count($this->medicaments['nom_medi'])
    ,count($this->medicaments['descrip_medi'])
    ,count($this->medicaments['qnt_medi'])
                );

                        
        // parcoure horizontalle est afficter les ligne dans var $medi selon les nom de champ   
        for($i=0;$i<$size;$i++){
            
            foreach($keyForm as $nameForm){
                
                                ///si le champ qnt est négative alors mult avec -1 
                                if($nameForm=="qnt_medi" && $this->medicaments[$nameForm][$i]<0 )
                                $this->medicaments[$nameForm][$i]*=-1;
                                
                //si un champs de la ligne est null sauf le nom alors retourner null
                if($this->medicaments[$nameForm][$i]==null)
                $medi[$nameForm]=null;
                else
                $medi[$nameForm]=$this->medicaments[$nameForm][$i];
            }
            //insert une medi 
            $this->setMedi($medi,$id,$bdd);
            
            
        }
        
    }
    
    private function setMedi($medi,$id,$bdd){
        
        $req=$this->getReqInsertMedi($medi,$id);
        
        $bdd->query($req);
    }
    
    ///retourner la req INSERT medi
    
        private function getReqInsertMedi($medi,$id){
        
        return "INSERT INTO medicament (ordo_id,nom_medi,descrip_medi,qnt_medi)
        VALUES ($id,
        '".$medi['nom_medi']."',
        '".$medi['descrip_medi']."',
        '".$medi['qnt_medi']."')";
        
        }


/////////////////////////////////////get//////////////////////////////////////////////

            public function getAllOrdonnances($id){

                 //connexion a la BDD
            $bdd=$this->getBdd();
            
            
            $req=$this->getAllOrdo($id);


            return $bdd->query($req)->fetchAll();


            }


            private function getAllOrdo($id){
            
                return "SELECT id,titre ,created_at FROM ordonnance  WHERE patient_id=$id";
    
            }


        public function getOrdonnancesAndMedi($id,$id_ordo){
            
            //connexion a la BDD
            $bdd=$this->getBdd();
            
            
            $req=$this->getReqSelectOrdo($id,$id_ordo);


            $Ordo=$bdd->query($req)->fetchAll();

         return $this->organisationOrdo($Ordo);

        }




        
        private function getReqSelectOrdo($id,$id_ordo){
            return "SELECT * FROM ordonnance o ,medicament m
             WHERE 
             patient_id=$id and
             o.id=$id_ordo  and
             o.id= m.ordo_id";

        }



///organiser les medicament dans un tableau

        private function organisationOrdo($Ordo){
            $ordo_orga=[];
            $i=0;
            
            foreach($Ordo as $tableOrdo1){

                $ordo_orga[$i]['nom_medi']=$tableOrdo1['nom_medi'];
                $ordo_orga[$i]['descrip_medi']=$tableOrdo1['descrip_medi'];
                $ordo_orga[$i]['qnt_medi']=$tableOrdo1['qnt_medi'];
             $i++;

            }


            return $ordo_orga;
            
        }


}