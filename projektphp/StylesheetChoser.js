window.onload = function() {
    var styleslist = document.getElementsByTagName('link');
    var selectElement = document.getElementById("styleChanger");
    if (styleslist.length > 1)
        selectElement.style.visibility = 'visible';
    for (var i=0; i< styleslist.length; i++) {
		    var option = document.createElement("a"); //hyperlink
        option.href = "#";
		    option.title=styleslist[i].title;
		    option.className="styleChange";
		    option.setAttribute( "onClick", "setcss('"+styleslist[i].title+"')" );
        option.innerHTML = styleslist[i].title;
        selectElement.appendChild(option);
        selectElement.appendChild(document.createElement("br"));
       }
	      setcss(getcookie("activeStyle"));
	      for(i=0; i<document.getElementsByClassName("styleChange").length;i++){
		        document.getElementsByClassName("styleChange")[i].addEventListener("click", function(){
			           cookiecreator(this.title);
			           setcss(this.title);
			           console.log(this.title);
               });
	}
}
function setcss(title) {
	  console.log(title);
    for(i=0; i < document.getElementsByTagName("link").length; i++) {
        var a = document.getElementsByTagName("link")[i];
        if(a.getAttribute("rel").indexOf("stylesheet") != false && a.getAttribute("title")) {
            a.disabled = true;
            if(a.getAttribute("title") == title ) {
				           a.disabled = false;
			              }
			if(title == null){
				a.disabled = false;
				break;
			}
        }
    }
}
function cookiecreator(title) {
    document.cookie ="activeStyle"+ "=" + title + "; path=/";
}
function getcookie(name) {
    if (document.cookie!="") {
        var cookies=document.cookie.split("; ");
        for (var i=0; i<cookies.length; i++) {
            var cookieName=cookies[i].split("=")[0];
            var cookieVal=cookies[i].split("=")[1];
            if (cookieName===name) {
                return decodeURI(cookieVal)
            }
        }
    }
}
