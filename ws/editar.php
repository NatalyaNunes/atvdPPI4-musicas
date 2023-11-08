<?php
$db = new PDO("sqlite:../musicas.sqlite");
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$idEditar = $_GET["id"];
$nome = $_GET["nome"];
$banda = $_GET["banda"];

$q = $db->prepare("UPDATE musicas
SET nome=:nome, banda=:banda
WHERE id=:id;");

$q->bindParam(":id", $idEditar);
$q->bindParam(":nome", $nome);
$q->bindParam(":banda", $banda);


$q->execute();

header("Location:../index.php");