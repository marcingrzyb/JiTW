
function send() {
    console.log("wyslane");
    var name = document.getElementById('namewindow').value;
    var text = document.getElementsByName('message')[0].value;
    var message = name + ':' + text;
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', 'chatHandler.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    message = 'message=' + message;
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            getmess();
        }
    };
    xhttp.send(message);
}


function getmess() {
    console.log("gotit");
    var file='chatlogs';
    var target=document.getElementById('messages')
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", file, true);
    xhttp.setRequestHeader("Cache-Control", " must-revalidate");
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            target.innerText = this.responseText; //przekazanie odpowiedzi od serwera do punkcji print
            console.log(this.responseText)
        }
        console.log(this.responseText)
    }

    xhttp.send();
}


function checkboxhandler() {
    var checkbox = document.getElementById('chatcheckbox');
    var messengerActivation = document.getElementById('chatwindow');
    if(checkbox.checked) {
        messengerActivation.style.visibility = 'visible';
    }
    else {
        messengerActivation.style.visibility = 'hidden';
    }
}
function checkactivation() {
    var messengerActivation = document.getElementById('chatwindow');
    console.log(messengerActivation.style.visibility );
    if (messengerActivation.style.visibility == 'visible') {
        return true;
    }
    else {
        return false;
    }
}
var intervalID;

function polling() {
  var checker= checkactivation();
  console.log(checker);
    if (checkactivation()) {
        intervalID=setInterval(getmess, 1000);
        console.log(intervalID);
    }
    else {
        clearInterval(intervalID);
    }
}
