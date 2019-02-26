<?php 

class Router    
{

private $_ctrl;
private $path='';
private $modelUser;




public function routeReq(){

    try{

        /// Inclution de Controller selon l'action de l'utilisateur
        $url='';

        /// Si parametre Url n'est pas vide 
            if(isset($_GET['url'])){

                
                //decouper la chaine de url selon le (/)
                $url=explode('/',filter_var($_GET['url'],FILTER_SANITIZE_URL));                
                //prendre le premier paramtre de url
                $url[0]=strtolower($url[0]);
 

                //Policy methode pour délimiter les pages selon l'autorisation 
                $url[0]=$this->Policy($url[0]);
                

                //conca pour obtient le nom de la class 
                 $controllerClass="controller".ucfirst($url[0]);

 
                 
                //conca pour obtient le path de fichier de class
                 $controllerFile="App/Controllers$this->path/$controllerClass.php";
                 if(file_exists($controllerFile)){

                    //instentient et inclue la class
                     require_once($controllerFile);
                     $this->_ctrl= new $controllerClass($url,$this->modelUser,empty($url[1])?'':$url[1]); 
                    }
                 else ///sinon generer un exception 
                 throw new Exception('Page not found :(');
            }
            else{
            
                /// si le var url est empty alors retourner la page acceuil 
                if(empty($_SESSION['id']))
                {
                    require_once("controllerAccueil.php");
                $this->_ctrl=new controllerAccueil($url,'');
                
                }else
                {
                    require_once("App/Models/modelUser.php");
                    $this->modelUser=new modelUser($_SESSION['id']);

                    require_once("controllerAccueil.php");
    
                $this->_ctrl=new controllerAccueil($url,$this->modelUser);
                }
            }



    }
    ///Chargement la page des exceptions
    catch(Exception $e){
        $errorMsg=$e->getMessage();
        require_once('App/Views/Error/404.php');
    }
    


        }









///////////////////////////////////////////////////////////////////////////////////////////////////////



        private function Policy($url){

            
            ///redirection selon le get et ID

            //si id exsite pas est url=logout|| alors redection toujour a login  
            if(empty($_SESSION['id'])){
            
                 if ($url=='logout'||$url=='login'){ ///// la condition url=login est just pour initi path a auth
                    
                    
                    $url='login';
                    $this->path='/Auth';
                } 

                

            
            
            
            }

            else{

                //prepare les attrs de user
                require_once("App/Models/modelUser.php");
                $this->modelUser=new modelUser($_SESSION['id']);
                

                // si il est connecter alors redection toujour a welcome page 
                if($url=='login'||$url=='register')$url='welcome';
                else if ($url=='logout'){
                    ///si url =logout alors deconnecter avec redection to login 
                    $url='login';
                    $this->path='/Auth';
                    $_SESSION['id']=null;
                    $this->modelUser=null;

                }else if($url=="welcome")$this->path='';//init le path pour redection to welcome avec des specificaiton de compte(admin,patient ect)
                        else $this->path='/'.$this->modelUser->getCompte_type();


                

            }

            return $url;
            

        } 



} 
?>