<?php
	session_start();
	$conn=mysqli_connect('localhost','root','');
	if (!$conn) die();
    $db=mysqli_select_db($conn,'my_alkes');
    if (!$db) die();
    echo $SESSION['login'];
    $username=$_POST['u'];
    $password=$_POST['p'];
	$sql="select username,password from utenti where username='$username' and password='$password';";
    $reg=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($reg);
    if ($count==1){
    	$_SESSION['login']=1;
        header('location:home.php');
    }
    else {?>
    <script>
    	window.alert("Username o password errati");
        window.location.replace("index.php");
    </script>
  <?php }
?>