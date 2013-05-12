<?php
require_once 'month.php';
require_once 'day.php';
require_once 'week.php';

class Calendar{

    private $month;
    private $weekRows;
    private $day;
    private $year;
    
    function __construct($day, $month, $year) {
        
        $this->month = new Month($day, $month, $year);
        $this->day = $day;
        $this->year = $year;
        $this->weekRows = $this->setWeekRows();
        
    }

    private function setWeekRows(){
        $month = $this->addBlankDays($this->month->getDaysInMonth());
        $out = array();
        $weeks = array_chunk($month, 7);
        foreach($weeks as $week){
            $out[] = new Week($week, false);
        }
        
            $returnWeeks = $this->setHighlightedWeek($out);
        return $returnWeeks;
        
    }
    
    
   private function setHighlightedWeek($weeks){
       
       
        foreach($weeks as $key => $week){
           if ($this->isInWeek($this->day, $week)){
               $weekIndex = $key -1;
               if($weekIndex < 0){
                  
                 $weeks = $this->prependWeek($weeks);
               //  echo "hey";
             //    var_dump($weeks);die;
               }
$weeks[$key - 1]->setHighlighted(true);
           }
       }
     
       return $weeks;
    }
    
    private function prependWeek($weeks){
       // var_dump($weeks[0]);die;
        $newWeek = array();
        $firstWeek = $weeks[0];
        $firstWeek = $firstWeek->getDays();
        $firstDay = $firstWeek[0];
        
       // 
        $startDay = $firstDay->getDay() - 1;
        
        $endDay = $startDay - 6;
    //  echo $endDay;die;
        $extraWeekDays = range($startDay, $endDay);
       // var_dump($extraWeekDays);die;
        foreach($extraWeekDays as $day){
            $newWeek[] = new Day($day);
        }
        array_unshift($weeks, new Week($newWeek, true));
        //var_dump($prependedWeek);die;
        
        
        return $weeks;
    }
    
    
    private function isInWeek($day, $week){
  
        $days = $week->getDays();
        foreach($days as $day){

          if ($day->getDay() == $this->day && !$day->isBlank()){ 
              return true;
           } 
        }
        return false; 
        
    }


    private function addBlankDays($month){
      //  echo $this->month->getMonthMumber();die;
        $first_day_current_month = date('w',mktime(0, 0, 0, $this->month->getMonthMumber(), 1, $this->year));  
        
        $last_day_previous_month = date('j', mktime(0, 0, 0, $this->month->getMonthMumber(), 0, $this->year));
     
        // Add blank days from last of previous month:
        for ($i = 0; $i < $first_day_current_month; $i++){
            array_unshift($month, new Day((int)$last_day_previous_month, true));
            $last_day_previous_month--;
        }
        
        $extraDays = 35 - sizeof($month);
                 
        // Add blank days from start of next month:
        for ($i = 1; $i <= $extraDays; $i++){
            $month[] = new Day($i, true);
        }
        
        return $month;
        
    }
    
    public function getWeekRows(){
        return $this->weekRows;
    }
    
    public function getMonthName(){
        return $this->month->getMonthName();
    }
    
}



?>
