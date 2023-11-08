<?php
$db = new PDO("sqlite:musicas.sqlite");
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$valorBtn = "Criar";

$id = isset($_GET["id"]) ? $_GET["id"] : null;
        $caminho = null;
        if($id == null){
            $caminho = "ws/save.php?id=$id";
        }else{
            $caminho = "ws/editar.php?id=$id";      
        }
?>
<?php include "parts/head.php"; ?>
<body>
    <?php include "parts/header.php"; ?>
    <main class="container">
    <?php
    if($id != null){
        $valorBtn = "Atualizar";
        $query = $db->query("select * from musicas");
        $musicas = $query->fetchAll();

        foreach ($musicas as $m): {
        }
        ?>
    <?php endforeach; }
    ?>
        <form action="<?php echo $caminho ?>" method="get">
            <div class="form-group">
                <input type="hidden" name="id" value="<?php echo $id ?>">
            </div>
            <div class="form-group">
                <label for="txtMusica">Música</label>
                <input type="text" class="form-control" name="nome" <?php if($id != null){ ?>value="<?= $m->nome ?>"<?php }?> id="txtMusica" placeholder="Nome da música">
            </div>
            <div class="form-group">
                <label for="txtBanda">Banda</label>
                <input type="text" class="form-control" name="banda"  <?php if($id != null){ ?>value="<?= $m->banda ?>"<?php }?> id="txtBanda" placeholder="Nome da banda">
            </div>
            <input type="submit" value="<?php echo $valorBtn ?>" value="Salvar" class="btn btn-success">
        </form>
    </main>
    <?php include "parts/footer.php"; ?>
</body>
</html>