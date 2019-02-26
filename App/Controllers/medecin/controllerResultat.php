<?php 
require_once("App/Views/View.php");

class controllerResultat {
    private $modelResultat;
    private $modelUser;
    private $ResultatView;
    private $patientUser;

    function __construct($url,$modelUser,$dossier_id){
        if(isset($url)&&count($url)>2)
        throw new Exception('Page introuvable :(');
        
        else {

            
            $this->modelUser=$modelUser;
            $type_compte=$this->modelUser->getCompte_type();
            $dossier=$this->GetDescripDossier($dossier_id);

             require_once("App/Models/modelResultat.php");
            $this->modelResultat=new modelResultat($dossier_id);
           
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            
                if(!empty($_POST['examForm']))
                $errors=$this->envoyerExam($_POST);

                 if(!empty($_POST['messageForm']))
                 $errors=$this->envoyerMessage($_POST);


            }
            
            $this->ResultatView=new View("plateform/$type_compte/app/resultat");
            
             $this->ResultatView->generate([
             'Resultats'=>$this->modelResultat->searchResultat(),
             $type_compte=>$this->getAttArray(),
             'dossier'=>$dossier,
             'messages'=>$this->getMessages($this->modelUser->getId(),$this->patientUser->getId()),
             'errors'=>empty($errors)?'':$errors
             ]);



        }
    
    }

    private function envoyerExam($post){

        $errors=$this->validatorExam();
        if($errors) return $errors;

        if($this->modelResultat->insertExam($_POST)) return '' ;
        else throw new Exception('Error :( ');
    
    }


    private function validatorExam(){

        $requireMessage=null;

        if(empty($_POST['descrip_resultat']))$requireMessage['descrip']='Description require';

        /// return les messages erreur resultat is il est existe
        return $requireMessage;
    }



    private function envoyerMessage($post){
        $errors=$this->validatorMessage($post);
        if($errors) return $errors;
       
        
        if($this->modelResultat->insertMessage(
            $post,
            $this->getAttArray()['id'],
            $this->patientUser->getId())) return '' ;

        else throw new Exception('Error :( ');
    
    }


    private function validatorMessage($post){

        $requireMessage=null;
        if(empty($post['message']))$requireMessage['message']='Message require';

        /// return les messages erreur resultat is il est existe
        return $requireMessage;
    }
    


    private  function GetDescripDossier($id){
        require_once("App/Models/modelDossier.php");
        $this->modelDossier=new modelDossier();
        $dossier=$this->modelDossier->getDossier($id);

        $this->getPatient($dossier['patient_id']);

        $dossier['patient_Name']=$this->patientUser->getName();
        $dossier['patient_FirstName']=$this->patientUser->getFirstName();
        return $dossier;
            
    }

    private function  getPatient($id){
        require_once("App/Models/modelUser.php");
        $this->patientUser=new modelUser($id);
    }


    private function getMessages($user_out,$user_in){
         return $this->modelResultat->searchMessages($user_out,$user_in);
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