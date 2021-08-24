<?php

    //HTML function Header render
    function htmlHeader_gfr_91() {
        echo '
            <!DOCTYPE html>
            <html>
                <head>
                    <meta charset="utf-8">
                    <meta name="viewport" content="width=device-width">
                    <title>Lab03-GFR-91</title>
                    <link href="css/lab03-gfr-91.css" rel="stylesheet" type="text/css" /> 
                </head>
                <body>
        ';
    }

    //Function that will create the calendar
    function htmlPrintCalendar_gfr_91($date) {
        //local useful variable day counter
        $day = 1;       
        //Create the HTML table header
        echo '
            <div class="">
                <table>
                    <tr>
                        <td colspan="7">
                            <h2>'.$date["year"].' - '.$date["month"].' - Lab03_GFR_91</h2>
                        </td>
                    </tr>
                    <tr>
                        <td>Sunday</td>
                        <td>Monday</td>
                        <td>Tuesday</td>
                        <td>Wednesday</td>
                        <td>Thursday</td>
                        <td>Friday</td>
                        <td>Saturday</td>
                    </tr>
                    ';

        //Render the table based on the information provided
        for ($i=1;$i<=$date["totalDays"];$i++) {
            //Create the first week
            if ($day == 1) { //Check if it is the first day of the month
                echo "  <tr>
                    ";
                //As weeks have 7 days
                //from day 0 until the first weekday
                for($j=0;$j<$date["firstDay"];$j++){//Format empty cells
                   echo "   <td class='_blank'></td>
                    ";
                }
                //From first weekday until lastweekday
                for($x=$date["firstDay"];$x<7;$x++){ //Assign a day of the month
                    echo "  <td>".$day."</td>
                    ";
                    $day++;//Increments
                }
                echo "</tr>
                "; //Close the table line
            //If it is not the first day of the month
            } elseif( ($day < $date["totalDays"]) && ($day > 1) ) {
                echo "      <tr>
                        ";
                for ($j=0;$j<7;$j++) {
                    //Compare the current counter with the total month days
                    if ($day > $date["totalDays"]) {
                        //If there are no more days to fill, format empty cells
                        echo "  <td class='_blank'></td>
                        ";
                    } else {
                        //If there are days to fill, assign a day
                        echo "  <td>".$day."</td>
                        ";
                        $day++;//Increments
                    }
                }
                echo "</tr>
                "; //Close the table line
            }
        }
        //Close the table
        echo "
                </table>
            </div>
        ";
        
        //Call the months array
        global $months;
        //Create the HTML form with months and 5 years
        echo '
            <div class="formCalendar">
                <form method="POST" action="'.$_SERVER['PHP_SELF'].'" name="form1">
                    <label>Month: </label>
                    <select name="month">
                            ';
                    //Go through the month array from 0 to 11
                    for ($i=0;$i<12;$i++) {
                        //Useful variable to create the month id
                        $id = 1+$i;
                        if ($id == date("m")) {
                            //If id is the current month, assign selected
                            echo '<option selected value="'.$id.'">'.$months[$i].'</option>
                            ';
                        } else {
                            echo '<option value="'.$id.'">'.$months[$i].'</option>
                            ';
                        }
                    }
        echo '</select>
                    <label>Year: </label>
                    <select name="year">
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020" selected>2020</option>
                    </select>
                    <input type="submit" value="Submit">
                </form>
            </div>
        ';
    }

    //HTML function Footer render
    function htmlFooter_gfr_91() {
        echo '  </body>
        </html>';
    }
?>