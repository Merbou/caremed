<?php 
require_once("App/Views/View.php");

class controllerDossier {

    private $modeldossier;
    private $modelUser;

    function __construct($url,$modelUser,$idPatient){
        if(isset($url)&&count($url)>2)
        throw new Exception('Page introuvable!');
        
        else {

            $this->modelUser=$modelUser;
            $type_compte=$this->modelUser->getCompte_type();


                 require_once("App/Models/modelDossier.php");
                 $this->modeldossier=new modelDossier();


            $this->WelcomeView=new View("plateform/$type_compte/app/dossier");
            
            $this->WelcomeView->generate([$type_compte=>$this->getAttArray(),
            'Dossiers'=>$this->modeldossier->searchDossiers($idPatient)]);



        }
    
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
