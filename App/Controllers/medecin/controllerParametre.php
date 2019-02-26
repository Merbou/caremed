<?php 
require_once("App/Views/View.php");

class controllerParametre
{
   
    private $modelUser;
    private $compte_type;

    function __construct($url,$modelUser){
        if(isset($url)&&count($url)>1)
        throw new Exception('Page introuvable!');
        
        else {
        
            
            $this->modelUser=$modelUser;
            $type_compte=$this->modelUser->getCompte_type();

            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                require_once("App/Models/medecin/modelParametre.php");
                $this->parametre=new modelParametre();

            }
        


            $this->WelcomeView=new View("plateform/$type_compte/app/parametre");
            $this->WelcomeView->generate([
            $type_compte=>$this->getAttArray(),
            'errors'=>(!empty($this->parametre))?$this->setSpe($this->modelUser->getId(),$_POST):''
            ]);

        }
    }

    private function setSpe($id,$post){
    
        $errors=$this->validator();
        if(!empty($errors))return $errors; 
        $this->parametre->setSpe($id,$post);
        return ;
    }

    
    private function validator(){

        $requireMessage=null;

        if(empty($_POST['specialite']))$requireMessage['specialite']='champ require';

        /// return les messages erreur resultat is il est existe
        return $requireMessage;
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