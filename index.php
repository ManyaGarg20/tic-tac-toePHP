<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tic-Tac-Toe</title>
    <link rel="stylesheet" href="styleCSS.css" type="text/css">
</head>
<body >
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
                <!-- <li><a href="help.php">Help</a></li> -->
                <li><a href="scoreboard.php">ScoreBoard</a></li>
            </ul>
        </div>
    </nav>
    
      <div class="scoreboard">
        <form action="action.php" method="POST" id="myForm">
        <div><label for="inp1">Player1: </label>
            <input type="text" name="inp1" id="inp1"></div> 
        
<div>
<label for="inp2">Player2: </label>
            <input type="text" name="inp2" id="inp2">
</div>
            

            <button id="submit" value="submit" name="submit">SUBMIT</button>
        </form>
    </div>

 <!-- footer start -->
 <div class="copy-rights">all &copy; rights reserved </div>
  <!-- footer end -->

<script>
         // Set a Cookie
         function setCookie(cName, cValue) {
        document.cookie = cName + "=" + cValue ;
    }

if (document.cookie.indexOf('visited=true') == -1) {
    // Apply setCookie
    setCookie('cname', '');
   }
</script>

    <script src="https://kit.fontawesome.com/8f9fff2a16.js" crossorigin="anonymous"></>

</body>
</html>