<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custoner Details</title>
    <style>
     body{
       text-align: center;
       margin: 0;
       padding: 10px;
       font-family: 'Times New Roman', Times, serif;
       background-color:#171717;
       color:white;
    }
    table{
        text-align: center;
        padding-top:40px;
        margin:auto;
        
    }
    tr,td{
        padding:5px 7px;
    }
    button{
        background-color:#333333;
        border:none;
        color:white;
        font-size:14px;
        border-radius:10px;
    }
    button:hover{
        background-color:#dddddd;
        color:black;
    }
    #back{
        float:right;
        padding:10px;
    }
    </style>
</head>
<body>
<table id="table" class="table">
<nav>
    <button id="back" onclick="back()">BACK</button>
</nav>
    <thead>    
        <tr>
            <th>Sr.No.</th>
            <th>Name</th>
            <th>Email
            <th>Acc_No</th>
            <th>Balance</th>  
        </tr>
    <thead>
    <?php

        $link = mysqli_connect("localhost", "root", "", "spark");
        
        if($link === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
        $txt=$_GET['id'];
        $sql = "SELECT * FROM `customer table` where id=".$txt;
        if($result = mysqli_query($link, $sql)){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['acc'] . "</td>";
                        echo "<td>" . $row['balance'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                mysqli_free_result($result);
            } else{
                echo "No records matching your query were found.";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
        
        mysqli_close($link);
    ?>
</body>
<script>
    function back(){
        location.href = "customer.php";
    }
 
</script>
</html>