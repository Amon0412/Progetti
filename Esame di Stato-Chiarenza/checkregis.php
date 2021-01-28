<?php
	session_start();
	$conn=mysqli_connect('localhost','root','');
	if (!$conn) die();
    $db=mysqli_select_db($conn,'my_alkes');
    if (!$db) die();
if ($_POST) {
	$username=$_POST['u'];
    if ($_POST['p']!=$_POST['cp']) {?>
    <script>
    	window.alert("Le password non coincidono");
        window.location.replace("regis.php");
    </script>
    <?php
    }
    else $password=$_POST['p'];
    if ($_POST['e']!=$_POST['ce']) {?>
    <script>
    	window.alert("Le email non coincidono");
        window.location.replace("regis.php");
    </script>
    <?php
    }
    else $email=$_POST['e'];
    $data=$_POST['d'];
    $sql="select username,email from utenti where username='$username' or email='$email';";
    $reg=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($reg);
    if ($count!=1) {
    	$sql="insert into utenti (username,password,data,email) values ('$username','$password','$data','$email');";
        $fai=mysqli_query($conn,$sql);
        $_SESSION['login']=1;
        ?>
        <script>
    	window.alert("Registrato correttamente");
        window.location.replace("home.php");
    	</script>
        <?php
    }
    else {
    ?>
    <script>
    	window.alert("Credenziali già esistenti");
        window.location.replace("regis.php");
    </script>
    <?php
    }
}
else { 
	header('location:regis.php');
}
?>