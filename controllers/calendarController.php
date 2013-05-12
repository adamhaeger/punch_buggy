    <?php
    date_default_timezone_set('Australia/Darwin');
    require 'models/calendar.php';
    $calendar = new Calendar(date('j'), date('n'), date('Y'));

    $headers = array('monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday');
    
    ?>