<?php
session_start();
$titlePage="Регистрация";
include 'include/header.php';
$_SESSION['isLoged']='';
$error=false;

if($_POST){
    $username=trim(htmlspecialchars($_POST['name']));
    if(!ctype_alpha($username)|| mb_strlen($username)<2 || mb_strlen($username)>6){
        echo "Името трябва да е между 2 и 6 символа!".'<br/>';
        $error=true;
       } 
    $pass=trim(htmlspecialchars($_POST['pass']));
    $pattern='/^A-Za-z0-9^/';
    if(mb_strlen($pass)<2 || mb_strlen($pass)>8 && !preg_match($pattern,$pass)){
        echo "Грешна парола!".'<br/>';
        $error=true;
       }    
 if(!$error){
  
        $userdata=$username.'!'.md5($pass).'!'."\n";
        if(file_put_contents('users.txt',$userdata,FILE_APPEND)){
            mkdir('userFolders/'.$username);
            $_SESSION['isLoged']=true;
            $_SESSION['username']=$username;
            header('Location:uploadFiles.php');
            exit;
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
<?php
include 'include/footer.php';
         
    

