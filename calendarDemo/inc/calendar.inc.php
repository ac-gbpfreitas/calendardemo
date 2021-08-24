<?php
        //Array with all year months
        $months = array(
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December"
        );
        //function to getData and provide data to create a calendar
        function getCalendarData_gfr_91() {
            //If the variable posted is not empty, than assigned a new value
            if ( !empty($_POST) ) {
                $year = $_POST['year']; //assign user year choice
                $month = $_POST['month']; //assign user month choice
            } else { //Otherwise, assigns the current date
                $year = date("Y");
                $month = date("m");
            }

            //Collect all possible and important data about month and year provided
            $totalDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);
            $jd = gregoriantojd($month,1,$year);
            $firstDay = jddayofweek($jd,0); //First month weekday
            $month = date("M",strtotime($year.'-'.$month)); //Month formater: Jan,Feb,Mar
            //Create an array with all important data
            $date = array(
                "year" => $year,
                "month" => $month,
                "totalDays" => $totalDays,
                "firstDay" => $firstDay
            );
            //return the array
            return $date;
        }
?>