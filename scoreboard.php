<?php
	include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Score-Board</title>
    <link rel="stylesheet" href="styleCSS.css" type="text/css">

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
                <!-- <li><a href="help.php">Help</a></li> -->
                <li><a href="scoreboard.php">ScoreBoard</a></li>
            </ul>
        </div>
    </nav>

    <table id="table" > 
    <thead>
    <tr>
          <th scope="col">Player1: </th>
          <th scope="col">Player2: </th>
          <th scope="col">Winner: </th>
        </tr>
    </thead>
   <tbody>
<?php
$sql=  "select * from player_info";
$result = mysqli_query($conn , $sql);
while($res=mysqli_fetch_assoc($result)){
 echo "<tr> <td>".$res['PLAYER1']."</td> <td>".$res['PLAYER2']."</td> <td>".$res['WINNER']."</td>
 </tr> " ;
} 
?>
   </tbody>
      </table>

       <!-- footer start -->
  <div class="copy-rights">all &copy; rights reserved </div>
  <!-- footer end -->

      <script src="https://kit.fontawesome.com/8f9fff2a16.js" crossorigin="anonymous"></script>

</body>
</html>