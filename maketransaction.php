<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Transaction</title>
    <style>
    body{
       text-align:center;
       margin: 0;
       padding: 10px;
       font-family: 'Times New Roman', Times, serif;
       background-color:#171717;
       color:white;
    }
    table{
        text-align: left;
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
    <?php 
        if(isset($_GET['id'])) 
        {   
            session_start();	
            $_SESSION['id'] = $_GET['id'];
        }
    ?>
        
    <?php
        if(isset($_GET['errors']))
        {
            $error=$_GET['errors'];
            echo "<div'>
                $error</div>";
                
        }
        if(isset($_GET['success']))
        {
            $success= $_GET['success'];
            echo "<div'>
            $success</div>";
        }
    ?>
        
    <form method="POST" action="transfermoney.php">		
            <?php
                    $link = mysqli_connect("localhost", "root", "", "spark");
                            
                    // Check connection
                    if($link === false)
                    {
                        die("ERROR: Could not connect. " . mysqli_connect_error());
                    }
                    $txt=$_GET['id'];
                    // Attempt select query execution
                    echo "<table>";
                    $sql = "SELECT * FROM `customer table` where id=".$txt;
                    if($result = mysqli_query($link, $sql))
                    {
                        if(mysqli_num_rows($result) > 0)
                        {
                            while($row = mysqli_fetch_array($result))
                            {
                                echo "<tr>";
                                    echo "<td>"."Sender's Name"."</td>";
                                    echo "<td>" . $row['name'] . "</td>";
                                echo "</tr>";
                                echo "<tr>";
                                    echo "<td>"."Email"."</td>";
                                    echo "<td>" . $row['email'] . "</td>";
                                echo "</tr>"; 
                                echo "<tr>";
                                    echo "<td>"."Acc No"."</td>";
                                    echo "<td>" . $row['acc'] . "</td>";
                                echo "</tr>";
                                echo "<tr>";
                                    echo "<td>"."Balance"."</td>";
                                    echo "<td>" . $row['balance'] . "</td>";
                                echo "</tr>";        
                            }
                            echo "</table>";
                            mysqli_free_result($result);
                        } 
                        else
                        {
                            echo "No records matching your query were found.";
                        }
                    } 
                    else
                    {
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }

            ?> 
            <table> 
                <tr>
                    <td>Reciever's Name</td>
                    <td>
                    <select  required name="whomto" id="listu1">
                        <option value="">Select Users</option>
                            <?php
                        
                                $txt = $_GET['id'];
                                $sql = "SELECT * FROM `customer table` where id!='".$txt."'";
                                $result = mysqli_query($link, $sql);
                                while($row = mysqli_fetch_array($result))
                                {?>
                                <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                                <?php
                                }
                            ?>
                    </select>
                    </td>
                </tr>   

                <tr>
                    <td>Amount</td>
                    <td><input type="text" id="amt" name="credits" required="required"></td>
                </tr>
                <input name="fromwhom" type="hidden" value="<?php echo $txt;?>">
                <br>
            </table> 
            <button class='button2' name='transfer' onclick="myfunction()" >Transfer balances</button>	 
    </form>
                                 
</body>
<script>
    function back(){
        location.href = "customer.php";
    }
</script>
</html>