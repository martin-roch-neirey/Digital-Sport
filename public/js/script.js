window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.documentElement.scrollTop > 1) {
    document.getElementById("header").style.background = "rgba(0,0,0,0.75)";
  } else {
    document.getElementById("header").style.background = "rgba(0,0,0,0.55)";
  }
}

function goToCont(){
	var element = document.getElementById("footer");
	element.scrollIntoView({behavior: "smooth"});
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
