<?php
class Teksti{
    
    private $teksti;

    public function __construct($t){
        $this->teksti=$t;
    }

    public function getTeksti(){
        return $this->teksti;
    }
    public function setTeksti($t){
        $this->teksti = $t;
    }

    public function __toString(){
        return "Teksti: ".$this->teksti;
    }
}
?>