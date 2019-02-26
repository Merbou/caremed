<?php 

require_once("App/Models/model.php");

 class  modelRegister extends model
 {
private $name ,$firstName,$email,$password,$compte_type;

        function __construct($post){
            
            /////inialiser les valeurs des champs de formulaire

            if(!empty($post['name']))$this->name= (string) $post['name'];
            if(!empty($post['firstName']))$this->firstName= (string) $post['firstName'];
            if(!empty($post['email']))$this->email=(string) $post['email'];
            ///hasher le password 
            if(!empty($post['password']))$this->password=(string) md5($post['password']);
            ///
            if(!empty($post['compte_type']))$this->compte_type=(string) $post['compte_type']; 
        
        }

        public function RegisteUser(){
            
            //connexion a la BDD
            $bdd=$this->getBdd();
                
            
                ///TEST si email existe
            if(!empty($this->emailExist($this->email,'',$bdd))){
            return ['email'=>"Email utiliser !"]; 
            }

            ///insert la requete si tout est parfait
            $req="INSERT INTO users(nom,prenom,email,password,create_at,modification_at,compte_type) VALUES (?,?,?,?,NOW(),NOW(),'$this->compte_type')";
            
            $requete=$bdd->prepare($req);

            $requete->execute(array($this->name,$this->firstName,$this->email,$this->password));
            
            return $bdd->lastInsertId();


        }

        private function emailExist($email,$id,$bdd){
            $id_user_condi='';
            if($id) $id_user_condi=" AND id=$id";
            return count($bdd->query("SELECT * FROM users WHERE email='$email'$id_user_condi")->fetch());

        }


        public function modificationUser($id){

                //connexion a la BDD
                $bdd=$this->getBdd();
                
                ///TEST si email existe
            if(!empty($this->emailExist($this->email,$id,$bdd))){
                return ['email'=>"Email utiliser !"]; 
                }

                ///insert la requete si tout est parfait
                $req="UPDATE  users 
                SET nom='$this->name',prenom='$this->firstName',email='$this->email',password='$this->password',modification_at=NOW(),compte_type='$this->compte_type'
                WHERE id=$id
                ";
                $requete=$bdd->query($req);
                return $id;

        }

        ///les Getters

        public function getName(){
            return (string) $this->name;
        }
            public function getFirstName(){
               return (string) $this->firstName;
            }
                public function getEmail(){
                    return (string) $this->email;
                }
                    public function getPasswordHash(){
                        return (string) $this->password;
                    }
                        public function getCompte_type(){
                            return (string) $this->compte_type;
                        }

        

 }
