<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPARK</title>
    <style>
    body{
       
            text-align: center;
            margin: 0;
            padding: 10px;
            font-family: 'Times New Roman', Times, serif;
    }
    a{
        padding : 3px 10px;
        text-decoration:none;
        color:black;
    }

    a:hover{
        background-color:#ddd;
        border-radius:10px;
    }
    img{
            weight:90vh;
            height:90vh;
    }

    #ct{
        text-align: left;
    
    }
    #ob{
        font-size: 40px;
       
    }

    #spark {
            float: left;
            border-style: none;
            font-size: 20px;
            background-color: transparent;
            padding: 0px 0px 0px 10px;
        }
    #container{
            display: grid;
            height: 100vh;
            grid-template-columns: 0.5fr 1fr;
            grid-template-rows: 25px 1fr;
            grid-template-areas:
                " nav nav  "
                " ct ph";
                
        }

    nav {
        grid-area: nav;
        padding:10px 10px;

        
    }


    #ct{
        grid-area: ct;
        margin-top: auto;
        margin-bottom: auto;
        padding:0px 50px;
       
    }
    #ph{
        grid-area: ph;
        margin-top: auto;
        margin-bottom: auto;
    }
    .sub {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            float: right;
        }
    .subb{
        padding:5px 0px ;
    }

    </style>
</head>
<body>
<div id="container">
    <nav>
        <a id="spark" onclick="reloadP()"><strong>SPARK</strong></a>
            <span class="sub">
                <a href="customer.php">CUSTOMER LIST</a>
               <a href="transaction.php" >TRANSACTIONS</a>
            </span>
    </nav>
    <div id="ct">
        <div id="ob">
            <strong>ONLINE</br> BANKING</strong>
        </div>
        <div class="subb">
             <a href="customer.php" >CUSTOMER LIST</a>
        </div>
        <div class="subb">
            <a href="transaction.php">TRANSACTIONS</a>
        </div>
    </div>
    <div id="ph">
     <img src="bank1.png" alt="bank" >
    </div>
</div>
    
</body>
</html>