<?php 
require_once("App/Views/View.php");
require_once ("App/Models/modelSoin.php"); 

class controllerGestioncompte{
    private $modelcompte;


    function __construct($url,$modelUser){
        if(isset($url)&&count($url)>1)
        throw new Exception('Page introuvable!');
        
        else {


            if(!empty($_POST)){
                require_once("App/Models/modelUser.php");
                $UserDelete=new modelUser($_POST['id']);
                $UserDelete->delete();
            }
            
            $this->modelUser=$modelUser;
            $type_compte=$this->modelUser->getCompte_type();


                

            $this->modelSoin=new modelSoin();

            $this->WelcomeView=new View("plateform/$type_compte/app/comptes");
            $this->WelcomeView->generate([
            $type_compte=>$this->getAttArray(),
            'comptes'=>$this->modelUser->getcomptes('')]);



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
