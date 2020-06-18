window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.documentElement.scrollTop > 1) {
    document.getElementById("header").style.background = "rgba(0,0,0,1)";
  } else {
    document.getElementById("header").style.background = "rgba(0,0,0,0.55)";
  }
}

function goToCont(){
	var element = document.getElementById("footer");
	element.scrollIntoView({behavior: "smooth"});
}

// Button for the inscription

var check_coach_password = function() {
  var stringPassword = document.getElementById('password').value;
  var stringConfirmPassword = document.getElementById('confirm_password').value;
  var passwordLength = document.getElementById('password').value.length;
  var isMdpCorrect;

  if (passwordLength >= 5) {
    if (stringPassword === stringConfirmPassword) {
          isMdpCorrect = true;
          document.getElementById('message').style.color = '';
          document.getElementById('message').innerHTML = '';
          document.getElementById('button').innerHTML = '<button id="button" type="submit">Ajouter</button>';
    } else {
      isMdpCorrect = false;
          document.getElementById('message').style.color = 'red';
          document.getElementById('message').innerHTML = 'Les mots de passe ne correspondent pas';
          document.getElementById('button').innerHTML = '';
    }

  } else {
    isMdpCorrect = false;
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Le mot de passe est trop court (Minimum 5 caractères)';
    document.getElementById('button').innerHTML = '';
  }
}

// Button for the inscription

var check_password = function() {
	var stringPassword = document.getElementById('password').value;
	var stringConfirmPassword = document.getElementById('confirm_password').value;
	var passwordLength = document.getElementById('password').value.length;
	var isMdpCorrect;

  if (passwordLength >= 5) {
    if (stringPassword === stringConfirmPassword) {
          isMdpCorrect = true;
          document.getElementById('message').style.color = '';
          document.getElementById('message').innerHTML = '';
          document.getElementById('button').innerHTML = '<button id="registerNew" type="submit" class="form-submit-button">Confirmer mon inscription</button>';
    } else {
      isMdpCorrect = false;
          document.getElementById('message').style.color = '#f40d42';
          document.getElementById('message').innerHTML = 'Les mots de passe ne correspondent pas';
          document.getElementById('button').innerHTML = '';
    }

  } else {
    isMdpCorrect = false;
    document.getElementById('message').style.color = '#f40d42';
    document.getElementById('message').innerHTML = 'Le mot de passe est trop court (Minimum 5 caractères)';
    document.getElementById('button').innerHTML = '';
  }
}

// Button for the new client password (index.php?controller=pagemembre&action=change_password)

var check_new_password = function() {
  var stringPassword = document.getElementById('new_password').value;
  var stringConfirmPassword = document.getElementById('new_password_confirm').value;
  var passwordLength = document.getElementById('new_password').value.length;
  var isMdpCorrect;

  if (passwordLength >= 5) {
    if (stringPassword === stringConfirmPassword) {
          isMdpCorrect = true;
          document.getElementById('message').style.color = '';
          document.getElementById('message').innerHTML = '';
          document.getElementById('new_password_title').innerHTML = 'Nouveau mot de passe ✔️';
          document.getElementById('new_password_confirm_title').innerHTML = 'Confirmation ✔️';
          document.getElementById('button').innerHTML = '<button type="submit">Enregistrer mes modifications</button>';
    } else {
      isMdpCorrect = false;
          document.getElementById('message').style.color = '#ffffff';
          document.getElementById('new_password_title').innerHTML = 'Nouveau mot de passe ✔️';
          document.getElementById('new_password_confirm_title').innerHTML = 'Confirmation ❌';
          document.getElementById('message').innerHTML = 'Les mots de passe ne correspondent pas';
          document.getElementById('button').innerHTML = '';
    }

  } else {
    isMdpCorrect = false;
    document.getElementById('message').style.color = '#ffffff';
    document.getElementById('new_password_title').innerHTML = 'Nouveau mot de passe ❌';
    document.getElementById('new_password_confirm_title').innerHTML = 'Confirmation ❌';
    document.getElementById('message').innerHTML = 'Le mot de passe est trop court (Minimum 5 caractères)';
    document.getElementById('button').innerHTML = '';
  }
}

// functions to have a timer
// http://codices.b67.me/index.php/javascript/3-chronometre-en-javascript

var setTm=0;    // set timer
var tmStart=0;  // start timer
var tmNow=0;    // timer time (now)
var tmInterv=0; // timer interval
var tTime=[];   // lap time
var nTime=0;    // count lap time

function affTime(tm){ // function to show counter
   var vMin=tm.getMinutes(); //get time (separate)
   var vSec=tm.getSeconds();
   var vMil=Math.round((tm.getMilliseconds())/10); // rounded to the hundredth
   if (vMin<10){
      vMin="0"+vMin;
   }
   if (vSec<10){
      vSec="0"+vSec;
   }
   if (vMil<10){
      vMil="0"+vMil;
   }
   document.getElementById("divChrono").innerHTML=vMin+":"+vSec+":"+vMil; // show time
}

function fChrono(){  // function to get current time
   tmNow=new Date();
   Interv=tmNow-tmStart;
   tmInterv=new Date(Interv);
   affTime(tmInterv);
}

function fStart(){ // function to start timer
   fStop();
   if (tmInterv==0) {
      tmStart=new Date();
   } else { // if we start again after being stopped
      tmNow=new Date();
      Pause=tmNow-tmInterv;
      tmStart=new Date(Pause);
   }
   setTm=setInterval(fChrono,10); // start timer every hundredth second
}

function fStop(){ // function to stop timer
   clearInterval(setTm);
   tTime[nTime]=tmInterv;
}

function fReset(){ // fucntion to erase all var (set timer to 00)
   fStop();
   tmStart=0;
   tmInterv=0;
   tTime=[];
   nTime=0;
   document.getElementById("divChrono").innerHTML="00:00:00";
}
