<?php
class Libri{
    
    private $libri; 
    private $cmimi;
    private $autori;
    private $image;

    public function __construct($l,$c,$a,$i){
        $this->libri=$l;
        $this->cmimi=$c;
        $this->autori=$a;
        $this->image=$i;
    }
    
    public function getLibri(){
        return $this->libri;
    }
    public function setLibri($l){
        $this->libri = $l;
    }

    public function getCmimi(){
        return $this->cmimi;
    }
    public function setCmimi($c){
        $this->cmimi = $c;
    }

    public function getAutori(){
        return $this->autori;
    }
    public function setAutori($a){
        $this->autori = $a;
    }

    public function getImage(){
        return $this->image;
    }
    public function setImage($i){
        $this->image = $i;
    }

    public function __toString(){
        return "Libri: ".$this->libri.", cmimi ".$this->cmimi.", autori ".$this->autori;
    }
}
?>