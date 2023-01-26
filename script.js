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
gameEnd=true;
gameover.play();
document.querySelector(".imgbox").getElementsByTagName("img")[0].style.width ="250px";

document.querySelector(".info").className+=" gameWon";


document.querySelector(".line").style.width= "24vw";

document.querySelector(".line").style.transform= `translate(${e[3]}vw,${e[4]}vw) rotate(${e[5]}deg)`;

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
