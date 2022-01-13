<?php   
if(isset($_GET['logout']))
{			
    session_start();
    session_destroy();
    setcookie("user_id", "", time() - 7200);
	header('Location: index.php ');	
}	
?>