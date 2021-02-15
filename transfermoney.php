<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$link = mysqli_connect("localhost", "root", "", "spark");
        
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if(isset($_POST['transfer']))
{
		
	function function_alert($errors) { 
    echo "<script>alert('$errors');"; 
	echo "window.location.href = 'customer.php'";
	echo "</script>";
	}
	  
	session_start();
    $from_id = trim($_POST['fromwhom']);
    $to_id = trim($_POST['whomto']);
    $credits = trim($_POST['credits']);  
    $error = false;
	
	$from_query = "SELECT * FROM `customer table` WHERE id='$from_id'";
	$from_result = mysqli_query($link, $from_query);
	$row_from = mysqli_fetch_assoc($from_result);
    $from_name = $row_from['name'];
    $from_acc = $row_from['acc'];
	
	$from_creditdb = $row_from['balance'];
	
	$to_query = "SELECT * FROM `customer table` WHERE id='$to_id'";
	$to_result = mysqli_query($link,$to_query);
    $row_to = mysqli_fetch_assoc($to_result);
    $to_name = $row_to['name'];
    $to_acc = $row_to['acc'];
	
    $to_creditdb = $row_to['balance'];
	
	 if((int)$credits>(int)$from_creditdb)
    {
        $errors = "Insufficient Balance";
        $error = true; 
    }
	
	if(!$error)
    {
        $current_date = date("Y-m-d H:i:s");
		//from user credits update
        $userf_finalcredit = "UPDATE `customer table` SET ";
        $userf_finalcredit .= "balance = balance - $credits WHERE id=$from_id";
        $query = mysqli_query($link,$userf_finalcredit);
        
		if(!$query)
        {
            die("QUERY FAILED".mysqli_error($link));
			echo("Error description: " . $mysqli -> error);
        }
		
        $userto_finalcredit = "UPDATE `customer table` SET ";
        $userto_finalcredit .= "balance = balance + $credits WHERE id=$to_id";
        $query = mysqli_query($link,$userto_finalcredit);
        $query1 = "INSERT INTO `transcation table`(From_User,From_Acc,To_User,To_Acc,balanceTransfered,DateTime) VALUES('$from_name','$from_acc','$to_name','$to_acc','$credits','$current_date')";
        $res2 = mysqli_query($link,$query1);
		
		
		if($res2){
			
			$user1 = "SELECT * FROM `customer table` WHERE id='$from_id' OR id='$to_id'";
			$res=mysqli_query($link,$user1);
			$row_count=mysqli_num_rows($res);
			
		}
		else{
				die("QUERY FAILED".mysqli_error($link));
				echo("Error description: " . $mysqli -> error);
        }
        echo '<script>window.location.href = "transaction.php";</script>';

    }
	else{
		function_alert("Insufficient Balance!!Please Try Again");
    }

    
}

      
?>

    
</body>
</html>