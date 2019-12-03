<?php

date_default_timezone_set('America/Detroit');


//Get previous or next month
if (isset($_GET['ym'])) {
	$ym= $_GET['ym'];
}else {
	$ym=date('Y-m');
}

$timestamp = strtotime($ym, "-01");
if ($timestamp === false) {
	$timestamp=time();
}

$today = date('Y-m-d', time());

$html_title=date('Y / m', $timestamp);

$prev=date('Y-m', mktime(0, 0, 0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));
$next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));

$day_count=date('t', $timestamp);

//puts a values to the days of the week
$str=date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));

//creates the calendar
$weeks = array();
$week = '';

//empty cell
$week .=str_repeat('<td></td>', $str);

for ($day=1; $day<= $day_count; $day++, $str++) {

	$date = $ym.'-'.$day;

	if ($today == $date) {
		$week .= '<td class="today">'.$day;
	} else {
		$week .= '<td>'.$day;
	}
	$week .= '</td>';

	if ($str % 7 == 6 || $day == $day_count) {

		if($day == $day_count) {
			$week .= str_repeat('<td></td>', 6 - ($str %7));
		}
		$weeks[] = '<tr>' .$week.'</tr>';

		$week = '';
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Calendar</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<style>
.calendar {
                font-family: Verdana, sans-serif;
                background-color: white;
}

.month {
                padding: 70px 25px;
                width: 100%;
                background: #1abc9c;
                text-align: center;
                color: white;
                }
th {
                height: 50px;
                text-align: center;
                font-weight: 700;
                }
td {
                height: 100px;
        .checkin {
                background-color: orange;
                }
        .checkout {
                background-color: orange;
                }
</style>
</head>
<body>
	<div class="calendar">
	<div class="month">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3><a href="?ym=<?php echo $prev; ?>">&lt;</a> <?php echo $html_title; ?> <a href="?ym=<?php echo $next; ?>">&gt;</a></h3>
	</div>
                <table class = "table table-bordered">
                        <tr>
                                <th>Sunday</th>
                                <th>Monday</th>
                                <th>Tuesday</th>
                                <th>Wednesday</th>
                                <th>Thursday</th>
                                <th>Friday</th>
                                <th>Saturday</th>
                        </tr>
                        <?php foreach ($weeks as $week) {
                             echo $week;
                             };
                        ?>
                </table>
          </div>
</body>
