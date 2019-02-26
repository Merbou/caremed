

<?php 
class controllerPatients
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
            
            require_once("App/Models/modelUser.php");

            $this->modelUser=new modelUser($modelUser->getId());
            $type_compte=$this->modelUser->getCompte_type();

             
            //instecer de la class view  
            $this->viewRegister=new View("plateform/assistant/app/patients"); 

             //afficter les errors si il existe 
            
            $this->viewRegister->generate([
            $type_compte=>$this->getAttArray(),
            'patients'=>$this->getAllPatients()]);
            
        }
    }






            private function getAllPatients(){
                return $this->modelUser->getAllPatients();
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