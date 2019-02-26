

<?php 
require_once("App/Views/View.php");

class controllerNews {
    

    function __construct($url,$modelUser){
        if(isset($url)&&count($url)>1)
        throw new Exception('Page introuvable!');
        
        else {


            
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                 if(!empty($_POST))$errors=$this->SetNews($_POST);
            }

            $this->modelUser=$modelUser;
            $type_compte=$this->modelUser->getCompte_type();



            $this->WelcomeView=new View("plateform/$type_compte/app/news");
            
            $this->WelcomeView->generate([
            $type_compte=>$this->getAttArray()]);



        }
    
    }


            private function SetNews($post){

                require_once("App/Models/admin/modelNews.php");
                $modelNews=new modelNews();
                
                //si les errors exists THEN STOP est retourner les errors

                $modelNews->SetNews($post);

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

