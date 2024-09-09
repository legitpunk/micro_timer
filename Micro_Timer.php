<?php

Function Micro_Timer($Start_Time, $Micro_Timer_Counter, $Script_Name)
{
	if($Start_Time === 0){
		return 0;
	}else{
		$time_elapsed_secs = microtime(true) - $Start_Time;
		if(!empty(debug_backtrace()[1]['function'])){
			$string = debug_backtrace()[1]['function'];
			$stringg = basename(__FILE__, '.php');
			//echo 'FunctionName:  '.$string.':  '.$time_elapsed_secs.'<br>';
			echo "<script>$('#Run').append('".$Micro_Timer_Counter.".&nbsp;&nbsp;".$string."<br>');</script>";
			echo "<script>$('#Run').append('<p style=\'display:inline-block;color:cornflowerblue;height: 0px;font-size: 16px;line-height: 20px;\'>".$Script_Name."</p><br>');</script>";
			echo "<script>$('#Run').append('<p style=\'display:inline-block;color:white;height: 0px;font-size: 16px;line-height: 20px;\'>".$time_elapsed_secs."</p><br>');</script>";
			//echo 'ScriptName:  '.$string.':  '.$time_elapsed_secs.'<br>';
			$_SESSION['Micro_Timer_Counter'] = $Micro_Timer_Counter + 1;
		}else{
			echo "<script>$('#Run').append('".$Micro_Timer_Counter.":<br>ScriptName:  ".$string.": ".$time_elapsed_secs."<br>');</script>";
			//echo 'ScriptName:  '.$string.':  '.$time_elapsed_secs.'<br>';
			$_SESSION['Micro_Timer_Counter'] = $Micro_Timer_Counter + 1;
		}
		$start = microtime(true);
		return $start;
	}
}

/**

how to use : 

Create a session variable that holds the micro_timer variable. 
The variable should be a interger of 1, e.g. $_SESSION['Start_Timer'] = 1;
Then every script you want the Micro_Timer to report the script php file name and the timer count between micro_timer function scripts, it'll output by using : 
$_SESSION['Start_Timer'] = Micro_Timer(basename(__FILE__, '.php'), 0);
So put that line above in every file you want to use it on.
Then just add an html div with an id="Run" in your html file and it'll put the results of the report and timers in there. 

**/
