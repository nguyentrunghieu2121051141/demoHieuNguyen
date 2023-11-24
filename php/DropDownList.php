<?php
    $today = getdate();
    //Ngày
    echo"Ngày: <select>";
    for ($date = 1; $date <= 31; $date++) {
    echo"<option>$date</option>"; 
    }
    echo "</select>";
    //Tháng
    echo"Tháng: <select>";
        for ($month = 1; $month <= 12; $month++) {
        echo"<option>$month</option>"; 
        }
    echo "</select>";
    //Năm
    echo"Năm: <select>";
        for ($year = 1900; $year <= $today; $year++) {
        echo"<option>$year</option>"; 
        }
    echo "</select>";
?>
