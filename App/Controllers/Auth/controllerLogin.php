<?php
require_once("App/Views/View.php");
class controllerLogin
{
    private $viewLogin;
    private $modelLogin;
    function __construct($url){
        if(isset($url)&&count($url)>1)
        throw new Exception('Page introuvable!');

        else {

            if(!empty($_POST)){
                require_once("App/Models/Auth/modelLogin.php");
                $this->modelLogin=new modelLogin($_POST);
                $errors=$this->Login();
            }


            $this->viewLogin=new View("Auth/Login");
            $this->viewLogin->generate((empty($errors))?'':$errors);

        }
    }



    private function Login(){

         $errors=$this->validator();
         if($errors) return $errors;

         if($id=$this->modelLogin->loginUser()){
         $_SESSION['id']=$id;
         header('Location: index.php?url=welcome');

        }

            else return array('email'=>'Compte intouvable');




    }



     //fonction pour validation les formulaire
    private function validator(){

        $requireMessageLogin=null;

        //validationEmail est une validation spécifique pour le champ email
        if($this->validationEmail()){
            $requireMessageLogin['email']=$this->validationEmail();
        }
        if(empty($this->modelLogin->getPasswordHusher()))$requireMessageLogin['password']='Password require';

        /// return les messages erreur resultat is il est existe
        return $requireMessageLogin;
    }







    private function validationEmail(){
        $email=$this->modelLogin->getEmail();
        ///test le champs si il est vide ou non
        if(empty($email)) return 'Email require';
        ///validation si la valeur de champ est une type email
        if(!(preg_match('#(@((live|outlook|gmail|hotmail)(.com|.fr|.net|.uk|.dz)$)$)$#',$email))) return 'Email No Valider';

        //si tout est bien alors return rien
        return '';


    }


}
?>