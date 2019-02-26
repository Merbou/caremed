<?php 
require_once("App/Views/View.php");

class controllerResultat {
    private $modelResultat;
    private $modelUser;
    private $ResultatView;
    private $medecinUser;

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
                $errors=$this->envoyerExam($_POST,$dossier_id);

                 if(!empty($_POST['messageForm']))
                 $errors=$this->envoyerMessage($_POST);


            }
            
            $this->ResultatView=new View("plateform/$type_compte/app/resultat");
            
             $this->ResultatView->generate([
             'Resultats'=>$this->modelResultat->searchResultat(),
             $type_compte=>$this->getAttArray(),
             'dossier'=>$dossier,
             'messages'=>$this->getMessages($this->modelUser->getId(),$this->medecinUser->getId()),
             'errors'=>empty($errors)?'':$errors
             ]);



        }
    
    }

    private function envoyerExam($post,$dossier_id){

        $errors=$this->validatorExam();
        if($errors) return $errors;

        $errorsOrPath=$this->uploaded_file($dossier_id);
        if(is_array($errorsOrPath)) return $errorsOrPath;

        if($this->modelResultat->insertExam($_POST,$errorsOrPath)) return '' ;
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
            $this->medecinUser->getId())) return '' ;

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

        $this->getMedecin($dossier['medecin_id']);

        $dossier['medecin_Name']=$this->medecinUser->getName();
        $dossier['medecin_FirstName']=$this->medecinUser->getFirstName();
        return $dossier;
            
    }

    private function  getMedecin($id){
        require_once("App/Models/modelUser.php");
        $this->medecinUser=new modelUser($id);
    }


    private function getMessages($patient,$medecin){
         return $this->modelResultat->searchMessages($patient,$medecin);
    }





    
    private function uploaded_file($dossier_id){

        //si file est pass par form alors en fait la suite
        if(isset($_FILES['file'])){
            $errors=[];
            ///initialiser les var avec des valeurs de file 
            $file_name = $_FILES['file']['name'];
            $file_tmp =$_FILES['file']['tmp_name'];
            $file_type=$_FILES['file']['type'];

            //// avoir l'extensions de file 
            $str_array=explode('.',$file_name);
            $file_ext=strtolower(array_pop($str_array));
            
            $extensions= array("jpeg","jpg","png","txt");
            

            //test le file  
            if(in_array($file_ext,$extensions)=== false){
                $errors['file']="extension not allowed";
                return $errors;
            }
            
                ///creer les dossier par id si il existe             
            if (!file_exists("files/$dossier_id")) {

                mkdir("files/$dossier_id", 0777, true);
            }
                ///upload file si tout est vrai
               move_uploaded_file($file_tmp,"files/$dossier_id/".$file_name);
                return "files/$dossier_id/".$file_name;
            }
        
    }

    private function dowload_file($dossier_id){


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