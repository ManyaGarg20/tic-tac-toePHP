


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tic-Tac-Toe</title>
    <link rel="stylesheet" href="styleCSS.css" type="text/css">
    <script src="jquery-3.6.0.js"></script> 

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
                <span class="info">Turn for: X </span>
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

 <!-- footer start -->
 <div class="copy-rights">all &copy; rights reserved </div>
  <!-- footer end -->

<script >

console.log("welcome to the game");
let audioTurn = new Audio("audio/turn_sound.wav");
let gameover= new Audio("audio/win_sound.wav");
let music = new Audio("audio/music.mp3");
let gameEnd=false;

let vol=document.getElementById("vol");

music.muted=true;
music.autoplay;
music.play();
music.muted =false;
music.volume=0.4;

let turn ="X";
// function to change turn
const changeTurn = ()=>{
    return turn==="X" ?"O":"X";
}

// fxn to check for a win
const checkWin=()=>{
  let boxes= document.getElementsByClassName("boxtext");    
  let wins =
      [  
        [0,1,2,4,5,0],[3,4,5,4,15,0],[6,7,8,4,25,0],[0,3,6,-6,15,90],[1,4,7,3,15,90],[2,5,8,14,15,90],[0,4,8,3,15,45],[2,4,6,4,14,-45]
      ];

wins.forEach( (e )=>{
if((boxes[e[0]].innerText===boxes[e[1]].innerText) && (boxes[e[1]].innerText===boxes[e[2]].innerText) && (boxes[e[0]].innerText!=="")){
  document.querySelector(".info").innerText = boxes[e[0]].innerText + " Won";
  
  // ajax post req
  var name =boxes[e[0]].innerText;
//   console.log(name);
// $.post( 'action.php' , {postname:name},
// function(data,status){
// //  $(".info").html(data + " Won");
// console.log("winner shown");
// });
// console.log("hello");
document.cookie = "cname =" + name;
gameEnd=true;
gameover.play();
document.querySelector(".imgbox").getElementsByTagName("img")[0].style.width ="250px";

document.querySelector(".info").className+=" gameWon";


document.querySelector(".line").style.width= "24vw";

document.querySelector(".line").style.transform= `translate(${e[3]}vw,${e[4]}vw) rotate(${e[5]}deg)`;

setTimeout(function(){
   window.location.reload();
}, 5000);

} 
});
};

// logics
let boxes = document.getElementsByClassName("box");
// bboxes returns an html array so we use array.from to access forEach
Array.from(boxes).forEach((element)=>{
    let boxtext = element.querySelector('.boxtext'); 
    element.addEventListener('click',()=>{
         if(boxtext.innerText==''){
           boxtext.innerText=turn;
           //after putting x/0 in box , change turn for turn of:
           turn=changeTurn();
           audioTurn.play();
           checkWin();
           if(!gameEnd)
           document.getElementsByClassName("info")[0].innerText="Turn for: "+ turn;
         }
    });
});

// reset
document.getElementById("reset").addEventListener("click",()=>{

  let boxes= document.getElementsByClassName("boxtext");    

  Array.from(boxes).forEach((e)=>{
e.innerText="";
  });
  turn="X";
  gameEnd=false;
  document.getElementsByClassName("info")[0].innerText="Turn for: "+ turn;

  document.querySelector(".info").className="info";

  document.querySelector(".imgbox").getElementsByTagName("img")[0].style.width ="0px";
  document.querySelector(".line").style.transform= "translate(0vw,0vw) rotate(0deg)";

  document.querySelector(".line").style.width= "0vw";

  vol.classList.add('fa-music');
});

// pause music
vol.addEventListener("click",()=>{
  if(music.paused){
    music.play();
    vol.classList.remove('fa-microphone-slash');
    vol.classList.add('fa-music');
  }
else if(music.play()){
  music.pause();
vol.classList.remove('fa-music');
vol.classList.add('fa-microphone-slash');
}
});


</script>

<?php include 'connection.php'; ?>
<?php
    $Player1 = $_POST['inp1'];
    $Player2 = $_POST['inp2'];
    $winner= 'A' ;

// here the ajax req sending var name of winner will be sent to databse

// echo $_POST['postname'];
// if(isset($_POST['postname'])){
//     if($_POST['postname']=='X'){
//         $winner=$Player1;
//     }
//     else if($_POST['postname']=='O'){
//         $winner=$Player2;
//     }
//     // $winner = $_POST['postname'];
// }
// else{
//     echo "eroorrriee";
// }

$winner =$_COOKIE['cname'];

    // $sql1="INSERT INTO player_info(player1,player2,winner) VALUES ('$Player1','$Player2' , 'X')";
    $sql1="INSERT INTO player_info(player1,player2,winner) VALUES ('$Player1','$Player2' , '$winner')";
   
    $result1 = mysqli_query($conn, $sql1);
    if(!$result1){
        echo "<br> error--" . mysqli_error($conn);
    }

?>
<script src="https://kit.fontawesome.com/8f9fff2a16.js" crossorigin="anonymous"></script>

</body>
</html>
