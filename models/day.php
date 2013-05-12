<?php

class Day {
    
    private $day;
    private $isBlank;
    private $isToday;
    
    function __construct($day, $isBlank = false, $isToday = false){
    
       $this->day = $day;
       $this->isBlank = $isBlank;
       $this->isToday = $isToday;
    }
     
    public function getDay(){
        return $this->day;
    }
    
    public function isBlank(){
        return $this->isBlank;
    }
    
    public function isToday(){
        return $this->isToday;
    }
    

    
}



?>
