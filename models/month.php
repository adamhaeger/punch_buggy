<?php

require_once 'week.php';
require_once 'day.php';

class Month {
    
    private $monthNumber;
    private $monthName;
    private $daysInMonth;
    private $today;
    private $year;
    private $days = array();
 //   private $weeks = array();
    
    function __construct($today, $monthNumber, $year) {
        
        $this->monthNumber = $monthNumber;
        $this->year = $year;
        $this->today = $today;
        $this->monthName = date('F');
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
    
    
    

    public function toString(){
        var_dump($this->monthNumber);
        var_dump($this->monthName);
        var_dump($this->daysInMonth);
        var_dump($this->weeks);
    }
    
    

    
    
    
}

?>
