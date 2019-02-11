function validDate(){
  var now = new Date();
  var dd = now.getDate();
  if (dd <= 9) {
    dd = '0' + dd;
  }
  var mm = now.getMonth() + 1; //0-styczen
  if (mm <=9) {
    mm = '0' + mm;
  }
  var yyyy = now.getFullYear();
  return yyyy + '-' + mm + '-' + dd;
}
function validTime(){
  var now = new Date();
  var hh = now.getHours();
  if (hh <=9) {
    hh = '0' + hh;
  }
  var mm = now.getMinutes();
  if (mm <=9) {
    mm = '0' + mm;
  }
  return hh + ':' + mm;
}

function inputValidator(){
      var inTime = document.getElementsByName('time')[0].value; //wartosc podana do godziny
      console.log(inTime);
      var inData = document.getElementsByName('data')[0].value; //wartosc podanado do daty
      console.log(inData);
      //var regdate = new RegExp('^\d{4}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])$'); //regex daty
      //var regtime=new RegExp('^([01][0-9]|2[0-3]):([0-5][0-9])$');  //regex godziny

      if(!inData.match(/^[0-9]{4}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])$/)){
        alert("Podana data nie jest zgodna z formatem RRRR-MM-DD.");
        document.getElementsByName("data")[0].value = validDate();
        console.log(inTime);
        console.log(inData);
        return false;
      }
      if (!inTime.match(/^(0[0-9]|1[0-9]|2[0-3])\:[0-5][0-9]$/)){
        alert("Podana godzina jest niezgodna z formatem HH:MM.");
        console.log(inTime);
        console.log(inData);
        document.getElementsByName("time")[0].value = validTime();
        return false;
      }
}
