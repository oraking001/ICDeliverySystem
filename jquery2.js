function logout(){
	window.localStorage.clear();
	window.localStorage.removeItem("firstname"); 
	window.localStorage.removeItem("lastname"); 
	window.location.replace("http://finz.opmovings.com/index.php");
}