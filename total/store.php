<?php
session_start();
if ($_SESSION['username']) {
		 header("Location.store.php");
	}else{
		 echo "<script type='text/JavaScript'>
		 alert('You have not login yet, please login to continue');
		 window.location.href = 'login.php';
		 </script>";
	}
?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">

<head>

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.6/dist/semantic.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

    <script type="text/javascript" src="script.js"></script>

    <style>
        body {
            background-color: lightblue;
        }

        button {
            width: auto;
        }

        .column {
            float: left;
            width: 20%;
            padding: 0 10px;
        }

        .row {
            margin: 0 -5px;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            padding: 16px;
            text-align: center;
            background-color: #f1f1f1;
        }
		
		.GFG { 
            background-color: white; 
            border: 2px solid black; 
            color: black; 
            padding: 5px 10px; 
            text-align: center; 
            display: inline-block; 
            font-size: 20px; 
            margin: 40px 1750px; 
            cursor: pointer; 
        }
    </style>
</head>

<body>

    <h1>BlueWave Shopping Mall </h1>
	<div><h3>Welcome <?php echo $_SESSION['username']; ?></h3></div>
	<div>Click <a href="logout.php">here</a> to logout</div>
	
    <tr class="row">
        <div class="column">
            <div class="card">
                <img src="white.jpg" width="250" height="250">
                <h2> White Shirt </h2>
				<h3> 5 SGD </h3>
                <div class="buttonsGrouping">
                    <button class="ui negative button" id="minusBtn">-</button>
                    <div class="ui input"><input type="text" id="quantity" value="1"></div>
                    <button class="ui primary button" id="addBtn">+</button>
                </div>
            </div>
        </div>
        <div class="column">
            <div class="card">
                <img src="black.jpg" width="250" height="250">
                <h2> Black Shirt </h2>
				<h3> 5 SGD </h3>
                <div class="buttonsGrouping">
                    <button class="ui negative button" id="minusBtn">-</button>
                    <div class="ui input"><input type="text" id="quantity" value="1"></div>
                    <button class="ui primary button" id="addBtn">+</button>
                </div>
            </div>
        </div>
        <div class="column">
            <div class="card">
                <img src="red.jpg" width="250" height="250">
                <h2> Red Shirt </h2>
				<h3> 5 SGD </h3>
                <div class="buttonsGrouping">
                    <button class="ui negative button" id="minusBtn">-</button>
                    <div class="ui input"><input type="text" id="quantity" value="1"></div>
                    <button class="ui primary button" id="addBtn">+</button>
                </div>
            </div>
        </div>
        <div class="column">
            <div class="card">
                <img src="yellow.jpg" width="250" height="250">
                <h2> Yellow Shirt </h2>
				<h3> 5 SGD </h3>
                <div class="buttonsGrouping">
                    <button class="ui negative button" id="minusBtn">-</button>
                    <div class="ui input"><input type="text" id="quantity" value="1"></div>
                    <button class="ui primary button" id="addBtn">+</button>
                </div>
            </div>
        </div>
        <div class="column">
            <div class="card">
                <img src="orange.jpg" width="250" height="250">
                <h2> Orange Shirt </h2>
				<h3> 5 SGD </h3>
                <div class="buttonsGrouping">
					<button class="ui negative button" id="minusBtn">-</button>
                    <div class="ui input"><input type="text" id="quantity" value="1"></div>
                    <button class="ui primary button" id="addBtn">+</button>
                </div>
            </div>
        </div>
    </tr>
	
<a href="http://google.com">
	<button class="GFG" >
		Ready to Checkout
	</button>
</body>

</html>