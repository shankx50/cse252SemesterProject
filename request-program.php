<?php 
require 'db.php';
require 'passwordhash.php';
session_save_path(dirname(__FILE__) . '/sessions');
session_start();

if (isset($_GET['logout'])) {
    //logout request; destroy the session
    logout();
}

function logout() {
    $_SESSION = array();
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
    session_destroy();
	header('Location: http://www.users.miamioh.edu/poncelsc/cse252/semester2project');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>HAWKS PMS - Request Form</title>
<!-- Bootstrap -->
<link href="../semester project/css/overcast/jquery-ui-1.10.4.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

</head>
<body>
<div class="container">
  <nav class="navbar navbar-default navbar-inverse" role="navigation">
    <div class="container-fluid">
      <ul class="nav navbar-nav navbar-left">
        <li class="active"><a href="#">My Requests</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">My Account</a></li>
        <li><a href="?logout">Sign out</a></li>
      </ul>
    </div>
  </nav>
  
  <!-- Previous requests -->
  
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">My Requests</h3>
    </div>
    <div class="panel-body">
     <div class="table-responsive"> <table class="table table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Timestamp of Request</th>
            <th>Location</th>
            <th>Date and Time</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td >1</td>
            <td>04/07/2014 9:00am</td>
            <td>Shriver MPR</td>
            <td>04/25/2014 7:00pm</td>
            <td>Requested - Approval Pending</td>
          </tr>
        </tbody>
      </table></div>
    </div>
  </div>
  <!-- Place a new request -->
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Place a new request</h3>
    </div>
    <div class="panel-body">
      <form id="request" role="form">
        <div class="form-group">
          <label for="topic">Topic Requested</label>
          <textarea class="form-control" id="topic" form="request" placeholder="Please describe the topic that you want to be addressed by our program."></textarea>
        </div>
        <div class="form-group">
          <div class="calendar center-block">
			  <div class="row">
				  <div class="col-md-8">
            <label for="Date1">Preferred Date 1 : </label><input name="Date1" type="text" class="datepicker"><label for="Time1">Start Time : </label><input type="text" name="Time1" class="timepicker"><br/>
			 <label for="Date2">Preferred Date 2 : </label><input name="Date2" type="text" class="datepicker"><label for="Time2">Start Time : </label><input type="text" name="Time2" class="timepicker"><br/	>
			  <label for="Date3">Preferred Date 3 : </label><input name="Date3" type="text" class="datepicker"><label for="Time3">Start Time : </label><input type="text" name="Time3" class="timepicker">
		  		</div>
		  <div class="col-md-4" ><h4 class="bg-warning">Please note that requests need to be made 14 days in advance.</h4>

		  </div>
          </div>
        </div>
        <div class="form-group">
          <label for="goals">Goals of the Program</label>
          <textarea form="request" class="form-control" id="goals" placeholder="Goal(s) of the Program: What would you like the audience to learn or experience?"></textarea>
        </div>
        <div class="form-group">
          <label for="location">Location</label>
          <br/>
          <input name="Location" type="text" id="location" form="request" placeholder="Location">
        </div>
        <div class="form-group">
          <label for="target">Target Audience</label>
          <br/>
          <input name="Target" type="text" id="target" form="request" placeholder="Target Audience">
        </div>
        <div class="form-group">
          <label for="account">Organization Account Number</label>
          <br/>
          <small>(to be charged if the program is cancelled—see Cancellation Policy below)</small><br />
          <input name="Account" type="text" id="account" form="request" placeholder="Account Number">
        </div>
        <input class=" btn btn-info" type="submit" value="Submit Request">
        <div class="bg-warning">
          <h3>Cancellation Policy:</h3>
          <small>We will call you 48 hours in advance of the program to confirm details. We retain the right to charge a cancellation fee if you cancel less than 48 hours in advance of the scheduled, or if at the scheduled day and time of the program, either the program organizer or agreed upon audience number does show up (“No Show Policy”). The Cancellation Fee is $25.00 and is charged at our discretion unless extenuating circumstances can be shown.”</small> </div>
      </form>
    </div>
  </div>
</div>
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.min.js"></script>

</body>
<script src="js/jquery-ui-1.10.4.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css"/ >
<script src="js/jquery.datetimepicker.js"></script>
<script type="text/javascript">
	$( ".datepicker" ).datetimepicker({ minDate: "+14",
timepicker:false,
format:'m.d.Y' });
	$('.timepicker').datetimepicker({
		datepicker:false,
		format:'H:i'
	});

</script>
</html>