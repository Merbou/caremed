

<?php
class controllerRegistercompte
{
    private $viewRegister;
    private $modelRegister;

//test le parametre URL si il vide et accepter une seul parametre
    function __construct($url,$modelUser){

        if(isset($url)&&count($url)>1)
        throw new Exception('Page introuvable!');
        else {
            //inclure les fichiers php pour les intencier
            require_once("App/Views/View.php");


            //instencer la class modelRegister avec les valeurs des champs et retourner les errors de validation si il existe

            if(!empty($_POST)){
                require_once("App/Models/Auth/modelRegister.php");
                $this->modelRegister=new modelRegister($_POST);
                $errors=$this->register();
            }

            $this->modelUser=$modelUser;
            $type_compte=$this->modelUser->getCompte_type();


            //instecer de la class view
            $this->viewRegister=new View("plateform/$type_compte/app/Register");

             //afficter les errors si il existe

            $this->viewRegister->generate([
                'errors'=>(empty($errors))?'':$errors,
                $type_compte=>$this->getAttArray()]);

        }
    }








    private function register(){

        //validation des champs de formulaire
        $errors=$this->validator();

        if($errors!=null)return $errors;


        $resultat=$this->modelRegister->RegisteUser();
        if(is_integer($resultat)){
        return; 
        }else return $resultat;



    }







            //fonction pour validation les formulaire
            private function validator(){

                $requireMessageRegister=null;

                /// si un champs est null return un message des erreurs
                if(empty($this->modelRegister->getName())) $requireMessageRegister['name']='Name require';

                if(empty($this->modelRegister->getFirstName()))$requireMessageRegister['firstName']= 'FirstName require';

                //validationEmail est une validation spécifique pour le champ email
                if($this->validationEmail()){
                    $requireMessageRegister['email']=$this->validationEmail();
                }

                if(empty($this->modelRegister->getPasswordHash()))$requireMessageRegister['password']='Password require';

                /// return les messages erreur resultat is il est exicte
                return $requireMessageRegister;
            }





    private function validationEmail(){
        $email=$this->modelRegister->getEmail();

        ///test la champs si il est vide ou non
        if($email==null) return 'Email require';
        ///validation si la valeur de champ est une type email
        if(!(preg_match('#(@((live|outlook|gamil|hotmail)(.com|.fr|.net|.uk|.dz)$)$)$#',$email))) return 'Email No Valider';

        //si tout est bien alors return rien
        return '';


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
?>