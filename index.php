<?php
session_start();
?>
<html>
<head>
	<title>Tip Calculator</title>
	<link href="tipcalc.css" rel="stylesheet" type="text/css">
</head>
<body>
	<h1>Guess Check</h1>
	<h2>A Simple Tip Calculator for Dining Out</h2>
	<div class="flexcontainer">
	  <div class="flexform">
	    <form action="index.php" method="POST">
	      <h3>1. Dining with Friends? Enter # of Guests </h3> 
		      <h4>Party Of: </h4>
		      <input type="text" name="guests" placeholder="Enter Number in Party" /><br>
		    <h3>2. Enter Bill Subtotal Below </h3> 
		      <h4>Bill Subtotal</h4>
		      <input type="text" name="subTotal" placeholder="Enter Bill Amount $" /><br>
		    <h3>3. Select Tip Percentage</h3>
          <h4>Tip Percentage</h4>
	        <?php
	            for ($i = 0; $i < 3; $i++) {
	              if($_POST['percentage'] == 10 + $i * 5 ) {
	                echo '<input type="radio" name="percentage" value="'.(10 + $i * 5).'">'. " " .(10 + $i * 5).'%' ."<br>"; 
	              } else {
	                echo '<input type="radio" name="percentage" value="'.(10 + $i * 5).'">'. " " .(10 + $i * 5).'%' ."<br>";
	              }  
	            }
						$subTotal = $_POST['subTotal'];
						$percentage = $_POST['percentage'];
						$guests = $_POST['guests'];
						$tip = $subTotal * $percentage / 100;
						$total = $subTotal + $tip;
						$displaySubTotal = "The subtotal amount is: $". $subTotal ;
						$displayTip = "The tip amount is: $". $tip ;
						$displayTotal = "The total bill is: $". $total ;
					?>
					<br>
        <h3>4. Click "Submit" button</h3>
          <input type="submit"/>
      <br>
      <br>
        
<?php
if ($subTotal < 1 || is_null($subTotal) || $percentage < 1 || is_null($percentage)) {
	exit("<script type='text/javascript'>alert('Please enter valid bill subtotal and tip percentage amounts!')</script>");
} else {
	echo $displaySubTotal ."<br>";
  echo $displayTip ."<br>";
  echo $displayTotal ."<br>";
}
if ($guests > 1){

	$splitTip = $tip / $guests;
	$splitTotal = $total / $guests;
  
  $displaySplitTip = "Each person owes a tip of: $". $splitTip ;
	$displaySplitTotal = "Each person owes a total of: $". $splitTotal;

	echo $displaySplitTip ."<br>";
	echo $displaySplitTotal ."<br>";
}
?>
</form>
    </div>
  </div>
</body>
</html>

