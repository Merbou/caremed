<?php 
require_once("App/Views/View.php");

class controllerGestionhoraires {
    

    function __construct($url,$modelUser){
        if(isset($url)&&count($url)>1)
        throw new Exception('Page introuvable!');
        
        else {


            
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                 if(!empty($_POST))$errors=$this->SetHoriare($_POST);
            }

            $this->modelUser=$modelUser;
            $type_compte=$this->modelUser->getCompte_type();



            $this->WelcomeView=new View("plateform/$type_compte/app/horaire");
            
            $this->WelcomeView->generate([
            $type_compte=>$this->getAttArray()]);



        }
    
    }


            private function SetHoriare($post){

                require_once("App/Models/admin/modelHoraire.php");
                $modelHoriare=new modelHoraire();
                
                //si les errors exists THEN STOP est retourner les errors

                $modelHoriare->setHoriare($post);


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

