<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Details</title>
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
<nav>
    <button id="back" onclick="back()">BACK</button>
</nav>

<table id="table" class="table">

    <thead>    
        <tr>
            <th>Sr.No.</th>
            <th>Name</th>
            <th>View</th>
            <th>Transaction</th>
        </tr>
    <thead>
    <?php

        /* Attempt MySQL server connection. Assuming you are running MySQL
        server with default setting (user 'root' with no password) */
        $link = mysqli_connect("localhost", "root", "", "spark");
        
        // Check connection
        if($link === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
        
        // Attempt select query execution
        $sql = "SELECT * FROM `customer table`";
        if($result = mysqli_query($link, $sql)){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                        echo "<td>". $row['id'] ."</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td><a class='text-white' href='viewuser.php?id= ".$row['id']." '><button class='button1'>View Details</button></a></td>";
                        echo "<td><a class='text-white' href='maketransaction.php?id= ".$row['id']." '><button class='button1'>Make Transaction</button></a></td>";
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