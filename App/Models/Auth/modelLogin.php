<?php
require_once ("App/Models/model.php"); 
class modelLogin extends model{

    private $email,$password;

        function __construct($post){
            
            /////inialiser les valeurs des champs de formulaire

            if(!empty($post['email']))$this->email= (string)$post['email'];
            if(!empty($post['password']))$this->password=(string) md5($post['password']);
            
        }

        public function loginUser(){
            
            // la connexion a la BDD si il est néssissaire  
            $bdd=$this->getBdd();
            
            $req="SELECT `id` FROM `users` where `email`='$this->email' AND `password`='$this->password'";
            
            $request=$bdd->query($req);

            return $request->fetch()['id'];

        }


        public function getEmail(){
            return (string) $this->email;
        }

        public function getPasswordHusher(){
            return (string) $this->password;
        }

         



}