<?php require_once 'controllers/calendarController.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="assets/css/reset.css" rel="stylesheet">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/style.css" rel="stylesheet">
        <title>The Punch Buggy Calendar</title>
    </head>

    <body>
        <div id="wrap">
        <h1><?php echo "Today is: " . $calendar->getMonthName() . " " . $calendar->getDay() . " - " . $calendar->getYear(); ?></h1>
        <div class="container">
            <table class="table">
                <thead>  
                    <tr>  
                        <?php foreach ($headers as $header) { ?>
                            <th class="headers"><?php echo $header; ?></th> 
                        <?php } ?>
                    </tr>  
                </thead> 
                <tbody>
                    <?php foreach ($calendar->getWeekRows() as $weekRow) { ?> 
                  <tr class='<?php if ($weekRow->isHighLighted()) { echo 'highlight'; } ?>'>
                                <?php foreach ($weekRow->getDays() as $day) { ?>
    
                          
                          <td class="<?php echo ($day->isBlank() ? 'blank' : 'current'  ) ?>"
                          <?php echo ($day->isToday() ? "id='today'" : ""); ?>>
                              <p><?php echo $day->getDay(); ?></p><?php echo ($day->isToday() ? "<span class='today'>today</span>" : ""); ?></td> 
                <?php } ?>
                        </tr>
            <?php } ?>
                </tbody>
            </table>   
        </div>
       
<div id="push"></div>
 </div>
   <div id="footer">
      <div class="container">
        <p class="muted credit">Crafted by <a href="http://au.linkedin.com/in/adamhaeger/">Adam Haeger</a>. You should totally <a href="mailto: adamgullerud@gmail.com?subject=You're so hired!">Hire Me!</a> </p>
      </div>
    </div>
    </body>
