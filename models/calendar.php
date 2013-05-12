<?php

require_once 'month.php';
require_once 'day.php';
require_once 'week.php';

class Calendar {

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

    private function setWeekRows() {
        $month = $this->addBlankDays($this->month->getDaysInMonth());
        $out = array();
        $weeks = array_chunk($month, 7);
        foreach ($weeks as $week) {
            $out[] = new Week($week, false);
        }

        $returnWeeks = $this->setHighlightedWeek($out);
        return $returnWeeks;
    }

    private function setHighlightedWeek($weeks) {


        foreach ($weeks as $key => $week) {
            if ($this->isInWeek($this->day, $week)) {

                $weekIndex = $key - 1;

                if ($weekIndex < 0) {

                    $weeks = $this->prependWeek($weeks);

                    $weekIndex = 0;
                }

                $weeks[$weekIndex]->setHighlighted(true);
            }
        }

        return $weeks;
    }

    private function prependWeek($weeks) {
        
        $firstWeek = $weeks[0]->getDays();
        $firstDay = $firstWeek[0];
        $last_day_previous_month = date('j', mktime(0, 0, 0, $this->month->getMonthMumber(), 0, $this->year));
        $startDay = ($firstDay == 1 ? $last_day_previous_month - 1 : $firstDay->getDay() - 1);
        $endDay = $startDay - 6;

        $extraWeekDays = range($endDay, $startDay);

        foreach ($extraWeekDays as $day) {
            $newWeek[] = new Day($day);
        }

        array_unshift($weeks, new Week($newWeek, true));

        return $weeks;
    }

    private function isInWeek($day, $week) {

        $days = $week->getDays();
        foreach ($days as $day) {

            if ($day->getDay() == $this->day && !$day->isBlank()) {
                return true;
            }
        }
        return false;
    }

    private function addBlankDays($month) {

        $first_day_current_month = date('w', mktime(0, 0, 0, $this->month->getMonthMumber(), 1, $this->year));

        $last_day_previous_month = date('j', mktime(0, 0, 0, $this->month->getMonthMumber(), 0, $this->year));

        // Add blank days from last of previous month:
        for ($i = 1; $i < $first_day_current_month; $i++) {
            array_unshift($month, new Day((int) $last_day_previous_month, true));
            $last_day_previous_month--;
        }

        $extraDays = 35 - sizeof($month);

        // Add blank days from start of next month:
        for ($i = 1; $i <= $extraDays; $i++) {
            $month[] = new Day($i, true);
        }

        return $month;
    }

    public function getWeekRows() {
        return $this->weekRows;
    }

    public function getMonthName() {
        return $this->month->getMonthName();
    }

    public function getDay() {
        return $this->day;
    }
    
    public function getYear() {
        return $this->year;
    }
}

?>
