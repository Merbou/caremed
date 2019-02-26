<?php 
require_once("App/Views/View.php");

class controllerWelcome
{
   
    private $modelUser;
    private $compte_type;

    function __construct($url,$modelUser){
        if(isset($url)&&count($url)>1)
        throw new Exception('Page introuvable!');
        
        else {

            
            $this->modelUser=$modelUser;
            $type_compte=$this->modelUser->getCompte_type();


            $this->WelcomeView=new View("plateform/$type_compte/welcome");
            $this->WelcomeView->generate($this->getAttArray());

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