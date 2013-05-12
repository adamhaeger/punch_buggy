<?php

require_once 'day.php';

class Week {

    private $days = array();
    private $isHighLighted;

    function __construct($week, $isHighLighted = false) {
        
        $this->isHighLighted = $isHighLighted;    
        $this->days = $week;
    }

    public function getDays() {
        
        return $this->days;
    }
    
    public function setHighlighted($highLighted) {
       
        $this->isHighLighted = $highLighted;
    }
    
    public function isHighLighted(){
        return $this->isHighLighted;
    }

}

?>
