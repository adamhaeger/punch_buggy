<!DOCTYPE html>
<html lang="en">
    <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="assets/bootstrap.min.css" rel="stylesheet">
    <title>Boogy Test</title>

    </head>
<?
date_default_timezone_set('UTC');
require 'models/day.php';
require 'models/week.php';
require 'models/month.php';
require 'models/calendar.php';

//$month = new Month(5, 2013);
$calendar = new Calendar(8, 5, 2013);

//var_dump($calendar->getWeekRows());die;

   $headers = array('monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday');
?>
    
    <body>
        
        <style>
            tr.highlight{
                background-color: red;
            }
            
            tr.highlight td.blank{
                background-color: pink;
            }
            
            td.blank{
                background-color: darkgrey;
            }
            
            h1{
                text-align: center;
            }
            
            #today{
                background-color: yellow;
            }
            
        </style>
        
        <h1><?php echo $calendar->getMonthName();  ?></h1>
        
        <div class="container">
     <table class="table">
           <thead>  
          <tr>  
              <?php foreach ($headers  as $header ) { ?>
                  <th><?php echo $header; ?></th> 
            <?php } ?>
          </tr>  
        </thead> 
        <tbody>
            <?php 
            
            //$weeks = array_chunk($input, $size)
            //var_dump($calendar);die;
            foreach($calendar->getWeekRows() as $weekRow) {  ?> 
            <tr class='<?php if ($weekRow->isHighLighted()) { echo 'highlight'; } ?>'>
                    <?php foreach($weekRow->getDays() as $day) { ?>
                <td class="<?php if($day->isBlank()){ echo 'blank'; } else { echo "current"; }  ?>"
                    <?php if ($day->isToday()){ echo "id='today'"; } ?>
                    ><?php echo $day->getDay(); ?></td> 
                     <?php    } ?>
            </tr>
                   <?php    } ?>
                
     
                
        
                
            
        </tbody>
</table   
</div>
    </body>
