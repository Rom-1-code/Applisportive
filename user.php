<?php

class user{

    //Propiétés
    private $_IdUser;
    private $_Pseudo;
    private $_Mdp;
    
    //Construc

    public function __construct($_IdUser,$_Pseudo,$_Mdp)
    {
        $this->_IdUser = $_IdUser;
        $this->_Ipseudo = $_Pseudo;
        $this->_Mdp = $_Mdp; 
    }

    //Methodes

    public function PDO(){
        try
		{
			$Base =  new PDO('mysql:host=localhost; dbname=base_sportive; charset=utf8','root','');
		}
		catch(Exception $erreur)
		{
			echo "accès à la base impossible";
        }
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