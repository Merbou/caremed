 <?php 
class View{
    private $file;
    private $script;
    private $link;
    private $style;

    /////init la view dans var $file
    function __construct($action){
     $this->file="App/Views/$action.php";
    }

    ////Generer la view avec view racine 
    public function generate($data){
             

        //$content var qui contient la view avec les donnes de $data   
        $content=$this->generateFile($this->file,$data);
        //$view var qui contient la view precedent inclue dans la view racine 
        $view=$this->generateFile("App/Views/public.php",array(
            "script"=>$this->script,
            "link"=>$this->link,
            "style"=>$this->style,
            "content"=>$content));
        
        //return la view (viewAction+VIEW_Racine)
        echo  $view;
    
    }

    ///Recuperir la view avec les variables $data  
    private function generateFile($file,$data){
        //test l'existente de fichier $file dans la répértoire view
        if(file_exists($file)){
            //extract fonction qui decouper les tableaux en variable  
            
            if (!empty($data)) extract($data);
            // debut des memoiresation 
            ob_start();
            //inclue le fichier $file dans le tompon 
            require_once $file;
            // redirection de sortir de la fichier $file et vider le Buffer 
            return ob_get_clean();

        }
        else 
        throw new Exception("File $file not found :( ");
        
    }

}
 ?>