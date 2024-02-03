<?php
class Mesazhi{
    
    private $mesazhi;

    public function __construct($m){
        $this->mesazhi = $m;
    }
    
    public function getMesazhi(){
        return $this->mesazhi;
    }
    public function setMesazhi($m){
        $this->mesazhi = $m;
    }

    public function __toString(){
        return "Mesazhi: ".$this->mesazhi;
    }
}
?>