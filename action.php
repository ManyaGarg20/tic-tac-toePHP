<?php
	// Database connection
        $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = mysqli_connect($servername, $username, $password ,"tictactoe");
    
    if(!$conn){
        die("sorry connection failed");
    }

    $Player1 = $_POST['inp1'];
    $Player2 = $_POST['inp2'];
    $winner = 'X';

    $sql1="INSERT INTO player_info(player1,player2,winner) VALUES ('$Player1','$Player2' , 'X')";
   
    $result1 = mysqli_query($conn, $sql1);
    if(!$result1){
        echo "<br> error--" . mysqli_error($conn);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tic-Tac-Toe</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <nav>
        <div class="brand">
            <ul>
                <li><a href="index.php"> MyTicTacToe.com</a></li>
            </ul>
        </div>
        <div class="options">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="instruction.php">Instructions</a></li>
                <li><a href="help.php">Help</a></li>
                <li><a href="scoreboard.php">ScoreBoard</a></li>
            </ul>
        </div>
    </nav>

    <div class="gameContainer">
        <div class="container">
            <div class="line"></div>
            <div class="box bl-0 bt-0">
                <span class="boxtext"></span>
            </div>
            <div class="box bt-0">
                <span class="boxtext"></span>
            </div>
            <div class="box bt-0 br-0">
                <span class="boxtext"></span>
            </div>
            <div class="box bl-0">
                <span class="boxtext"></span>
            </div>
            <div class="box">
                <span class="boxtext"></span>
            </div>
            <div class="box br-0">
                <span class="boxtext"></span>
            </div>
            <div class="box bl-0 bb-0">
                <span class="boxtext"></span>
            </div>
            <div class="box bb-0">
                <span class="boxtext"></span>
            </div>
            <div class="box br-0 bb-0">
                <span class="boxtext"></span>
            </div>
        </div>
        <div class="gameInfo">
            <h1>Welcome to the game</h1>
            <div>
                <span class="info">Turn for: <?php echo($Player1) ?> </span>
                <br>
                <button id="reset" value="reset">RESET</button>
                <div class="music">
                    <p>Click to start/pause music</p>
                    <button><i style="height: 30px; width: 30px" id="vol" class="fa-solid fa-music fa-2lg"></i> </button>
                </div>         
            </div>
            <div class="imgbox">
                <img src="excited_gif.gif" alt="gif">
            </div>
        </div>
    </div>

<script src="script.js"></script>
<script src="https://kit.fontawesome.com/8f9fff2a16.js" crossorigin="anonymous"></script>

</body>
</html>