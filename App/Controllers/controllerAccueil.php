<?php 
require_once("App/Views/View.php");

class controllerAccueil
{
   
    private $modelUser;
    private $modelNews;
    private $modelHoraire;

    function __construct($url){
        if(isset($url)&&count($url)>1)
        throw new Exception('Page introuvable!');
        
        else {
            require_once("App/Models/modelUser.php");
            require_once("App/Models/admin/modelNews.php");
            require_once("App/Models/admin/modelHoraire.php");

            $this->modelUser=new modelUser('');
            $this->modelNews=new modelNews();
            $this->modelHoraire=new modelHoraire();

            $this->WelcomeView=new View("plateform/accueil/accueil");
            $this->WelcomeView->generate([
            'comptes'=>$this->modelUser->getMedecin(),
            'News'=>$this->modelNews->getNews(),
            'Horaires'=>$this->modelHoraire->getHoraires()
            ]);

        }
    }





}