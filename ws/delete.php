<?php
$db = new PDO("sqlite:../musicas.sqlite");
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$id_delete = $_GET["id"];

$preparo = $db->prepare("DELETE FROM musicas WHERE id=:id; ");
$preparo->bindParam(":id", $id_delete);
$preparo->execute();

header("Location:../index.php");
?>