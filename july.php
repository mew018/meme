<!DOCTYPE html>
<html lang="en">
<head>
  <title>calendar july</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="container text-center">
	
<div class="panel panel-default">
<!-- <div class="panel-heading">enter the number of month</div> -->
<div class="panel-body">	
		<form role="form" class="form-inline">
	  		<div class="form-group">
				<div class="row">
	    	<div class="col-xs-4 col-xs-offset-2"><input type="text" class="form-control" name="month" id="m" placeholder="month number"></div>
	  <div class="col-xs-2"><button type="submit" class="btn btn-primary">Submit</button></div>
	</form>
	</div>
</div></div>

 
<?php
if (isset($month)) {$first_load=2;} else {$first_load=3;}
if (is_numeric($month)) { 
	if ($month<=12  && $month>0) {
		$d=strtotime($month."/01/2016");
		$month_name=date("F",$d);
		$day_of_week=date("N",$d); 
		$day_offset="col-xs-offset-".($day_of_week+1);
		$days_in_this_month=date("t",$d);
		$current_date=1;
		?>
		
		<div class="panel panel-primary">
		<div class="panel-heading"><h1>calendar <?php echo $month_name; ?> grid</h1></div> 
		<div class="panel-body">
		  <div class="row">
		  	<div class="col-xs-1 col-xs-offset-2">Monday</div>
			<div class="col-xs-1">Tuesday</div>
			<div class="col-xs-1">Wednesday</div>
			<div class="col-xs-1">Thursday</div>
			<div class="col-xs-1">Friday</div>
			<div class="col-xs-1" style="color:#FF0000">Saturday</div>
			<div class="col-xs-1" style="color:#FF0000">Sunday</div>
		  </div>
		
<?php
						
	 	echo "<div class=\"row\">";
		$k=date("N", strtotime($month."/".$current_date."/2016"));
		if ($k==6 || $k==7) { $holiday="style=\"color:#FF0000\""; }
		else {$holiday="";}
	 	echo "<div class=\"col-xs-1 ".$day_offset."\" ".$holiday.">".$current_date."</div>";			
	 	for ($i=$day_of_week+1; $i<=7; $i++) {
			$current_date++;
			$k=date("N", strtotime($month."/".$current_date."/2016"));
			if ($k==6 || $k==7) { $holiday="style=\"color:#FF0000\""; }
			else {$holiday="";}
			echo "<div class=\"col-xs-1\" ".$holiday." >".$current_date."</div>";
		    }
		$day_of_week=1;							
		echo "</div>";
		
		for ($j=$current_date+1; $j<$days_in_this_month; $j++) {
			$current_date++;
			echo "<div class=\"row\">";
		 	echo "<div class=\"col-xs-1 col-xs-offset-2\">".$current_date."</div>";	
		 	for ($i=$day_of_week+1; $i<=7; $i++) {
				$current_date++;
				$j++;
				if ($current_date<=$days_in_this_month) { 
					$k=date("N", strtotime($month."/".$current_date."/2016"));
					if ($k==6 || $k==7) { $holiday="style=\"color:#FF0000\""; }
					else {$holiday="";}
					echo "<div class=\"col-xs-1\" ".$holiday." >".$current_date."</div>";
					}
		    }
			$day_of_week=1;							
			echo "</div>";
			}

		
//		echo "<p>yess<br>".$month_name." - ".$day_of_week.$day_offset." days in month=".$days_in_this_month."</p>";
		} // if month 0-12
		else {$wrong_month=1;}
	} //if is numeric
else { $wrong_month=1;} 

if ($wrong_month==1 && $first_load==2) {
?>	
	<div class="panel panel-danger">
      <div class="panel-heading">There is no such month as <?php echo $month; ?></div>
	  <div class="panel-body">Try to enter another number 1-12</div>
    </div>
<?php } //end  if wrong month ?>

</div></div>
</div>

</body>
</html>