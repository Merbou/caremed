<?php 
require_once("App/Views/View.php");

class controllerOrdonnance {
    
    private $modeldossier;
    private $modelUser;

    function __construct($url,$modelUser,$idPatient){
        if(isset($url)&&count($url)>2)
        throw new Exception('Page introuvable!');
        
        else {


            
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                 if(!empty($_POST))$errors=$this->setOrdo($_POST,$idPatient);
            }

            $this->modelUser=$modelUser;
            $type_compte=$this->modelUser->getCompte_type();



            $this->WelcomeView=new View("plateform/$type_compte/app/ordonnance");
            
            $this->WelcomeView->generate([
            $type_compte=>$this->getAttArray()
            ,'errors'=>empty($errors)?'':$errors]);



        }
    
    }


            private function setOrdo($post,$idPatient){

                require_once("App/Models/medecin/modelOrdonnance.php");
                $modelOrdo=new modelOrdonnance();
                
                $errors=$this->validator();
                if(!empty($errors)) return $errors;

                //si les errors exists THEN STOP est retourner les errors

                $modelOrdo->setOrdo($post,$idPatient);

            }

            private function validator(){

                $requireMessage=null;
        
                if(empty($_POST['titre_ordo']))$requireMessage['titre_ordo']='champ require';
                
                $errors=$this->validatorMedi();
                if(!empty($errors)) $requireMessage['nom_medi']=$errors;
                /// return les messages erreur resultat is il est existe
                return $requireMessage;
            }

            private function validatorMedi(){
                if($_POST['nom_medi'][0]==null)return 'champ require' ;
                $size=max(count($_POST['qnt_medi']),count($_POST['descrip_medi']));

                if($size>count($_POST['nom_medi'])) return 'champ require';
                                
                            



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

