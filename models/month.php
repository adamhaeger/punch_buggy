<?php

require_once 'day.php';

class Month {
    
    private $monthNumber;
    private $monthName;
    private $daysInMonth;
    private $today;
    private $year;
    private $days = array();
    
    function __construct($today, $monthNumber, $year) {
        
        $this->monthNumber = $monthNumber;
        $this->year = $year;
        $this->today = $today;
        $this->monthName = date('F', mktime(0, 0, 0, $monthNumber));
        $this->daysInMonth = cal_days_in_month(CAL_GREGORIAN, $monthNumber, $year);
        $this->daysInMonth = Month::setDays($this->daysInMonth, $this->today);
    }
    
    private function setDays($daysInMonth, $today){
        $out = array();
        $days = range(1, $daysInMonth);
        foreach($days as $day){
            $out[] = ($day == $today ? new Day($day, false, true) : new Day($day));
        }
        return $out;
    } 
    
    public function getDays(){
        return $this->days;
    }

    public function getDaysInMonth(){
        return $this->daysInMonth;
    }
    
     public function getMonthName(){
        return $this->monthName;
    }
    
     public function getMonthMumber(){
        return $this->monthNumber;
    }
    
}

?>
