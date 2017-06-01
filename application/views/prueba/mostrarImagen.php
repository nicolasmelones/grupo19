<?php
// se recibe el valor que identifica la imagen en la tabla
$id = $_GET['id'];

// se recupera la información de la imagen
$sql = "SELECT imagen, tipoImagen FROM gauchada WHERE id=3";

$result = mysqli_query($link, $sql);	

$row = mysqli_fetch_array($result);

mysqli_close($link);


// se imprime la imagen y se le avisa al navegador que lo que se está
// enviando no es texto, sino que es una imagen un tipo en particular
header("Content-type: " . $row['tipoImagen']);
echo $row['imagen'];
?>	