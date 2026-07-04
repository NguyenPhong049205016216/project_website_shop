<?php
// biến 
$title = "lập trình web";
if(isset($_FILES['upload'])){
    echo'<pre>';
    print_r($_FILES['upload']);
    $file = $_FILES['upload'];
    $name = $_FILES['name'];
    $name = explode('.', $name); 
    $ext = array_pop($name);
    $name = implode('.', $name);
    $name .= '-'.time(). '.'.uniqid().'.'.$ext; 
    $path = __DIR__. '/upload'.$name;
    $error = [];
    if ($file['error']!==0){
        array_push($error, "klooix server");
    }
    if (!in_array($ext, ['jpg','gpeg','png'])){

        array_push($error, "chỉ chấp nhân file png, gpeg ");
    }
    if (!in_array($ext, ['jpg','gpeg','png'])){ 

        array_push($error, "chỉ chấp nhân file png, gpeg ");
    }
    if (!in_array($ext, ['jpg','gpeg','png'])){

        array_push($error, "chỉ chấp nhân file png, gpeg ");
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Học php</title>
    </head>
    <body>

    </body>

</html>