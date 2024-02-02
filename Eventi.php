<?php
class Eventi{
    
    private $emri; 
    private $dita;
    private $muaji;
    private $viti;
    private $ora;

    public function __construct($e,$d,$m,$v,$o){
        $this->emri=$e;
        $this->dita=$d;
        $this->muaji=$m;
        $this->viti=$v;
        $this->ora=$o;
    }
    
    public function getEmri(){
        return $this->emri;
    }
    public function setLibri($e){
        $this->emri = $e;
    }

    public function getDita(){
        return $this->dita;
    }
    public function setDita($d){
        $this->dita = $d;
    }

    public function getMuaji(){
        return $this->muaji;
    }
    public function setMuaji($m){
        $this->muaji = $m;
    }

    public function getViti(){
        return $this->viti;
    }
    public function setViti($v){
        $this->viti = $v;
    }

    public function getOra(){
        return $this->ora;
    }
    public function setOra($a){
        $this->ora = $o;
    }


    public function __toString(){
        return "Eventi: ".$this->emri.", data ".$this->dita.", muaji ".$this->muaji.", viti ".$this->viti.", ora ".$this->ora;
    }
}
?>