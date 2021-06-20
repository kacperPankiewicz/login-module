<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
body{
    background: linear-gradient(to right, #009900 0%, #00ccff 100%);
}
#container{

font-family:Arial Black;
margin:auto;
margin-top: 30px;
background: white;
height: auto;
width:500px;
padding:30px;
padding-bottom: 70px;
}
td{
   border-bottom: 3px solid #009900;
   height: 40px;
   font-size: 18px;
   font-family:Arial;
}
table{
    width:100%;
    font-size: 20px;

}
#logout{
    background: #00ccff;
    width: 30%;
    height: 30px;
    color:white;
    margin-right: 5%;
    margin-top: 20px;
    margin-bottom: 20px;
    float:right;
}
b{
    font-size: 20px;
}

</style>
<body>
    
<?php

$_SESSION['login'] = $_POST['login'];
$_SESSION['pass'] = $_POST['pass'];

$conn = new mysqli("localhost","root","","data");

$query = "select email,imie,wiek,zamieszkanie,waga,haslo from users where email='".$_SESSION['login']."' and haslo ='".$_SESSION['pass']."';";
$result = $conn->query($query);



if(empty($_SESSION['login'])&&empty($_SESSION['pass'] ))
{
header('Location: index.php?feedback=empty');
session_destroy();

}

else if(mysqli_num_rows($result) == 0){
    header('Location: index.php?feedback=bad_pass');
    session_destroy();
    

  
}

else{
    echo"<div id='container'><table>";
    while($row = mysqli_fetch_row($result)){
        echo"<h1 style='text-align:center;'>Witaj $row[1] !</h1>";
        echo "<tr><td><b>Email: </b>$row[0]</td></tr>";
        echo "<tr><td><b>Imię: </b>$row[1]</td></tr>";
        echo "<tr><td><b>Wiek: </b>$row[2]</td></tr>";
        echo "<tr><td><b>Zamieszkanie: </b>$row[3]</td></tr>";
        echo "<tr><td><b>Waga: </b>$row[4]</td></tr>";
       
      
       }
    echo "</table>";
}
?>
 <form action="index.php?feedback=logout">
 <input type="hidden" name='feedback' value='logout'>
<input type="submit"  value="wyloguj" id="logout">
</form>
</div>


</body>
</html>