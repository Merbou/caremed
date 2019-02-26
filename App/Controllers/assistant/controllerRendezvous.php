<?php 
require_once("App/Views/View.php");
require_once ("App/Models/modelSoin.php"); 

class controllerRendezvous {
    private $modelRV;
    private $modelSoin;
            

    function __construct($url,$modelUser){
        if(isset($url)&&count($url)>1)
        throw new Exception('Page introuvable!');
        
        else {

            
            $this->modelUser=$modelUser;
            $type_compte=$this->modelUser->getCompte_type();

            
                        require_once("App/Models/$type_compte/modelRendezvous.php");
                        $this->modelRV=new modelRendezvous();

            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $this->SetRendezVous($_POST);
            }


// print_r($this->modelRV->getSpeParMedecin());
            $this->WelcomeView=new View("plateform/$type_compte/app/rendezVous");
            
            $this->WelcomeView->generate(['errors'=>empty($errors)?'':$errors,
            $type_compte=>$this->getAttArray(),'rvs'=>$this->getRVs(),
            'SpeMedecin'=>$this->modelRV->getSpeParMedecin()
            ]);



        }
    
    }



    private function getRVs(){

 
       return  $this->modelRV->searchRV();


    }


    private function SetRendezVous($post){

        $this->modelRV->setRendezVousModel($post);


    }



    private function getAttArray(){
        $User['id']=$this->modelUser->getId();
        $User['name']=$this->modelUser->getName();
        $User['firstName']=$this->modelUser->getFirstName();
        $User['email']=$this->modelUser->getEmail();
        $User['compte_type']=$this->modelUser->getCompte_type();
        return $User;
    }

}
