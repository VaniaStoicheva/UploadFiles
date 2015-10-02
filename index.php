<?php
$titlePage="Вход";
include 'include/header.php';

if(!isset($_SESSION['isLoged'])){

    if($_POST){
        if(file_exists('users.txt')){
           $username=trim(htmlspecialchars($_POST['name'])); 
           $pass=trim(htmlspecialchars($_POST['pass']));
           $pass=  md5($pass);
           $fileContentArray=file('users.txt');
           
           foreach ($fileContentArray as $value){
               $column=  explode('!',$value);
               
               if($username==trim($column[0]) && $pass==trim($column[1])){
                   echo "Вие имате регистрация";
                   $_SESSION['isLoged']=true;
                   $_SESSION['username']=$username;
                   header('Location:files.php');
                   exit;
               }
           }
               if(!isset($_SESSION['isLoged'])){
                   echo "Невалидно име или парола";
               }
           }
        }
    }
 
?>
<form method="post" >
    <label>Име:</label>
    <input type="text" name="name"/><br/>
    <label>Парола:</label>
    <input type="password" name="pass"/><br/>
    <input type="submit" value="Вход"/><br/>
</form>
<div><a href="register.php">Нова регистрация</a></div>
<?php
include 'include/footer.php';
         
    