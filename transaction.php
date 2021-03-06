<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Transactions</title>
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
        padding:5px 50px;
    }
    button{
        background-color:#333333;
        border:none;
        color:white;
        font-size:14px;
        border-radius:10px;
    }
    #back{
        float:right;
        padding:10px;
    }
    </style>
</head>
<body>
<nav>
    <button id="back" onclick="back()">BACK</button>
</nav>
<table id="table" class="table">
    <thead>    
        <tr>
            <th>Sr.No.</th>
            <th>Sender Name</th>
            <th>Sender Acc_No</th>
            <th>Reciever Name</th>
            <th>Reciever Acc_No</th>
            <th>Money Transfered</th>
            <th>Time Stamp</th>
        </tr>
    <thead>
    <?php

        $link = mysqli_connect("localhost", "root", "", "spark");
        if($link === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
 
        $sql = "SELECT * FROM `transcation table`";
        if($result = mysqli_query($link, $sql)){
            if(mysqli_num_rows($result) > 0){
                $counter=1;
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                        echo "<td>". $counter++ ."</td>";
                        echo "<td>" . $row['From_User'] . "</td>";
                        echo "<td>" . $row['From_Acc'] . "</td>";
                        echo "<td>" . $row['To_User'] . "</td>";
                        echo "<td>" . $row['To_Acc'] . "</td>";
                        echo "<td>" . $row['balanceTransfered'] . "</td>";
                        echo "<td>" . $row['DateTime'] . "</td>";
                       
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
        location.href = "index.php";
    }
</script>
</html>