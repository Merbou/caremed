<?php 
require_once("App/Views/View.php");

class controllerOrdonnance {

    private $modelUser,$modelOrdo;

    function __construct($url,$modelUser){
        if(isset($url)&&count($url)>1)
        throw new Exception('Page introuvable!');
        
        else {

            
            $this->modelUser=$modelUser;
            $type_compte=$this->modelUser->getCompte_type();


            require_once("App/Models/medecin/modelOrdonnance.php");
            $this->modelOrdo=new modelOrdonnance();

            $this->WelcomeView=new View("plateform/$type_compte/app/ordonnance");
            
            $this->WelcomeView->generate([$type_compte=>$this->getAttArray(),
            'ordo'=>$this->getAllOrdonnances($this->modelUser->getId())]);



        }
    
    }

        private function getAllOrdonnances($id){

            return $this->modelOrdo->getAllOrdonnances($id);
            
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
