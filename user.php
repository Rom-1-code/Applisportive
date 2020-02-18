<?php

class user{

    //Propiétés
    private $_IdUser;
    private $_Pseudo;
    private $_Mdp;
    
    //Construc

    public function __construct($_Pseudo,$_Mdp)
    {
    
        $this->_Ipseudo = $_Pseudo;
        $this->_Mdp = $_Mdp; 
    }

    //Methodes

    public function connect($idprog,$pseudo,$mdp,$Base)
    {
        $Base->query('INSERT INTO user (id_programme,pseudo,motdepasse) VALUES ("'.$idprog.'","'.$nom.'","'.$mdp.'")'); //insertion d'une nouvelle ligne dans la bdd
    }

    public function getIdUser(){
        return $this->_IdUser;
    }
    
    public function getPseudo(){
        return $this->_Pseudo;
    }

    public function getMdp(){
        return $this->_Mdp;

    }



    public function afficherUser(){



    }













}













































?>