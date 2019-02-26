<?php 
require_once("App/Views/View.php");

class controllerMidecament{

    private $modelUser,$modelOrdo;

    function __construct($url,$modelUser,$id_medi){
        if(isset($url)&&count($url)>2)
        throw new Exception('Page introuvable!');
        
        else {

            
            $this->modelUser=$modelUser;
            $type_compte=$this->modelUser->getCompte_type();


            require_once("App/Models/medecin/modelOrdonnance.php");
            $this->modelOrdo=new modelOrdonnance();

            $this->WelcomeView=new View("plateform/$type_compte/app/midecament");
            
            $this->WelcomeView->generate([$type_compte=>$this->getAttArray(),
            'medicaments'=>$this->getOrdonnace($this->modelUser->getId(),$id_medi)]);



        }
    
    }



        private function getOrdonnace($id_patient,$id_medi){
            

          return   $this->modelOrdo->getOrdonnancesAndMedi($id_patient,$id_medi);
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
