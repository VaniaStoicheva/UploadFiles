<?php
session_start();
$titlePage="Качване на файлове";
include 'include/header.php';

if(count($_FILES)>0){
   
    $uploads_folder='userFolders'.DIRECTORY_SEPARATOR.$_SESSION['username'];
    $newName=trim(htmlspecialchars($_POST['newName']));
    $filename="$newName".'.jpg' ;

    if(move_uploaded_file($_FILES['picture']['tmp_name'],
             
            $uploads_folder.DIRECTORY_SEPARATOR.$filename)){
        echo "Файла е качен успешно!";
            }
    else {
            echo "Грешка при качване на файла";
            }
    }

    
?>
<form method="post" enctype="multipart/form-data">
    File:<input type="file" name="picture"/>
    New name:<input type="text" name="newName"/>
    <input type="submit" name='submit'/>
</form>
 
<div><a href='files.php'>Качени файлове</a></div>
<div><a href="logout.php">Изход</a></div>
<div><a href='index.php'>Начало</a></div>
<?php
include 'include/footer.php';


