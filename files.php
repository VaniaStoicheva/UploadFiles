<?php
session_start();
$titlePage="Списък на качени файлове";
include 'include/header.php';
include 'include/functions.php';
$folder='userFolders'.DIRECTORY_SEPARATOR.$_SESSION['username'];
$username=$_SESSION['username'];
echo '<div>'."$username твоите файлове :".'</div>';

$files=  scandir($folder);
 
if(count($files)<=2){
    echo 'Няма качени файлове';
}
else{

    for($i=2;$i<count($files);$i++){
        $filepath=  realpath($files[$i]);
       $filesize=  filesize($filepath);
       $size=formatSizeUnits($filesize);
       
    echo '<div>'.'<a href=download.php?file='.$files[$i].'>'.$files[$i].'</a>'.
            ':'.$size.'<br/>'.'</div>';
}

}
?>
<div><a href="uploadFiles.php">Добави нови файлове</a></div>
<div><a href="logout.php">Изход</a></div>
<div><a href="index.php">Начало</a></div>
<?php
include 'include/footer.php';

