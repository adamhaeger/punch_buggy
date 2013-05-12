
<!DOCTYPE html>
<html lang="en">
    <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="assets/bootstrap.min.css" rel="stylesheet">
    <title>Boogy Test</title>

    </head>
<?php

date_default_timezone_set('UTC');

function getCalendar($day, $month) {

    $calendar = array();
   
    // Set 
    $blank_days = date('w',mktime(0,0,0,$month,1,2013));

    $days_in_month = cal_days_in_month(CAL_GREGORIAN, $month, 2013);

// Set blank days:
    $i = 0;
    for ($j = 2; $j < $blank_days; $j++){
        $calendar['date'][$i] = 'blank';
        $i++;
    }
    

    // Set valid days
    $valid_day = 0;
    for ($k = 0; $k < $days_in_month; $k++){
        $calendar['date'][$i] = $valid_day++;
        $i++;
    }
    
    //set trailing blank days
    $total_days = 

    // Divide accumulated days into weeks:
    $calendar = array_chunk($calendar['date'], 7);

    foreach ($calendar as $key => $week){
        if (in_array($day, $week)){
        $calendar[$key - 1]['highlight'] = "highlight"; 
    }
}

return $calendar;
}

$calendar = getCalendar(date('d'), date('m'));
//echo date('l');
     //   var_dump($calendar);die;
        
     $headers = array('monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday');
?>
    
    <body>
        
        <style>
            tr.highlight{
                background-color: red;
            }
        </style>
        
        <div class="container">
     <table class="table table-striped">
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
            foreach($calendar as $week) { ?> 
            <tr class='<?php if (isset($week['highlight'])){ echo 'highlight'; } ?>'>
                <?php foreach($week as $day){ 
                    ?>
                
                
    <?php if ($day == "blank" ){ 
        echo "<td>  </td>";
        } else if ($day != 'highlight'){ 
            echo "<td>" . $day . "</td>";
            }
                
              ?>  
                
                
                
          <?php  } ?>
            </tr>
                
                
     
                
        
                <?php    } ?>
            
        </tbody>
</table   
</div>
    </body>
