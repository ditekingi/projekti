<?php
class Useri{
    
    private $name; 
    private $surname;
    private $emaili;
    private $username;
    private $pass;
    private $roli;

    public function __construct($e, $m, $em, $u, $p, $r){
        $this->name=$e;
        $this->surname=$m;
        $this->emaili=$em;
        $this->username=$u;
        $this->pass=$p;
        $this->roli=$r;
    }
    
    public function getEmri(){
        return $this->name;
    }
    public function setEmri($e){
        $this->name = $e;
    }

    public function getMbiemri(){
        return $this->surname;
    }
    public function setMbiemri($s){
        $this->surname = $s;
    }

    public function getEmaili(){
        return $this->emaili;
    }
    public function setEmaili($em){
        $this->emaili = $em;
    }

    public function getUsername(){
        return $this->username;
    }
    public function setUsername($u){
        $this->username = $u;
    }

    public function getPassword(){
        return $this->pass;
    }
    public function setPassword($p){
        $this->pass = $p;
    }

    public function getRoli(){
        return $this->roli;
    }
    public function setRoli($r){
        $this->roli = $r;
    }

    public function __toString(){
        return "Emri: ".$this->name.", mbiemri ".$this->surname.", email ".$this->emaili.", username ".$this->username.", password ".$this->pass.", roli ".$this->roli;
    }
}
?>