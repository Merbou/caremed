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


            if(!empty($_POST)){
                require_once("App/Models/$type_compte/modelRendezvous.php");
                $this->modelRV=new modelRendezvous($_POST);
                $errors=$this->prenderRV();
            }


            $this->modelSoin=new modelSoin();

            $this->WelcomeView=new View("plateform/$type_compte/app/rendezVous");
            $this->WelcomeView->generate(['errors'=>empty($errors)?'':$errors,$type_compte=>$this->getAttArray(),'soins'=>$this->modelSoin->getAllSoins()]);



        }
    
    }



    private function prenderRV(){

        $errors=$this->validator();
         if($errors) return $errors;

        if($this->modelRV->insertRV()) return '' ;
        else throw new Exception('Error :( ');

    }



    private function validator(){

        $requireMessageLogin=null;

        if(empty($this->modelRV->getDescrip_rv()))$requireMessageLogin['descrip']='Description require';

        /// return les messages erreur resultat is il est existe
        return $requireMessageLogin;
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
