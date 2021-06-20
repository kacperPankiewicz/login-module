<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
body{
    background: linear-gradient(to right, #00ccff 0%, #009900 100%);
}
#container{

font-family:Arial Black;
margin:auto;
margin-top: 30px;
background: white;
height: auto;
width:500px;
padding:30px;
}
.fields{
    width: 90%;
    margin-left:20px;
    height:30px;
}
#sub_button{
    background: #00ccff;
    width: 80%;
    height: 30px;
    color:white;
    margin-left: 10%;
    margin-top: 20px;
    margin-bottom: 20px;
}




</style>
</head>
<body>
    <form action="zaloguj.php" method="POST">

<?php session_start();
?>
<div id ="container">
    <h1 style="text-align:center;"><b>Logowanie</b></h1>
    <label for="login">Login:</label>
    <input type="text" hint="Podaj login" class="fields" name="login">
    <label for="pass">Hasło:</label>
    <input type="password" hint="Podaj hasło" class="fields" name="pass">
<input type="submit" value="Zaloguj" id="sub_button">
<?php 
error_reporting(0);
$feed = $_GET['feedback'];
if(!empty($_SESSION['login'])){
    header('Location: zaloguj.php');
}
    

if($feed == "logout"){
   echo" <font style='color:green;margin-left:30%;'><b>Pozytywnie wylogowano</b></font>";
}
else if($feed == "empty"){
    echo" <font style='color:red;margin-left:34%;'><b>Nie wpisano danych</b></font>";
 }
 else if($feed == "bad_pass"){
    echo" <font style='color:red;margin-left:39%;'><b>Błedne dane</b></font>";
 }
 
 
 else{}




?>
</div>













    </form>
</body>
</html>