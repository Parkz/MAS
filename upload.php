******** UPLOAD.HTML ****************
 
<html>
 <body>
 <form action="upload.php" method="post" enctype="multipart/form-data">
 <input type="file" name="myfile" > <br> <br>
 <input type="submit" value="Upload" >
 </form>
 </body>
 </html>
 
********************** UPLOAD.PHP*******************
 
<?php
 
$name = $_FILES['myfile']['name'];
 echo "Name : $name <br>";
 $size = $_FILES['myfile']['size'];
 echo "size : $size <br>";
 $type = $_FILES['myfile']['type'];
 echo "type : $type <br>";
 $temp = $_FILES['myfile']['tmp_name'];
 echo "temp : $temp <br>";
 $error = $_FILES['myfile']['error'];
 echo "Error : $error <br>";
 
if($error > 0)
 {
 die(¡®Error Uploading File !!' .error);
 }
 else
 {
 move_uploaded_file($temp, "upload/".$name);
 echo "file uploaded succesfully !!";
 }
 
?>
