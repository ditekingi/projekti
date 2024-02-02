<?php
class LibriBooks{
    
    private $libri; 
    private $cmimi;
    private $autori;
    private $image;
    private $category;

    public function __construct($l,$c,$a,$i,$ca){
        $this->libri=$l;
        $this->cmimi=$c;
        $this->autori=$a;
        $this->image=$i;
        $this->category=$ca;
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

    public function getCategory(){
        return $this->category;
    }
    public function setCategory($c){
        $this->category = $c;
    }

    public function __toString(){
        return "Libri: ".$this->libri.", cmimi ".$this->cmimi.", autori ".$this->autori;
    }
}
?>