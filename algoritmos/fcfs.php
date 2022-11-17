<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>First-come, Fist-served</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <?php include '../templates/navbar.template.php' ?>
    <div class="container-fluid">

    <div class="row">
        <form action="../resultados/fcfs.php" method="POST">

            <p>Ingrese los procesos </p>
            <?php
            for ($i = 1;$i<=$_GET['procesos'];$i++){?>
            <div class="col">
            <div class="input-group">
                <input type="text" name="nombre[]" placeholder="nombre del proceso <?= $i?>" class="form-control">
                <input type="text" name="llegada[]" placeholder="llegada del proceso <?= $i?>" class="form-control">
                <input type="text" name="rafaga[]" placeholder="rafaga del proceso <?= $i?>" class="form-control">
                </div>
            </div>
            <?php } ?>
            <input type="hidden" name="ut" value="<?= $_GET['ut']?>">
            <input type="hidden" name="tiempo" value="<?= $_GET['tiempo']?>">
            <input type="hidden" name="procesos" value="<?= $_GET['procesos']?>">
            <input type="hidden" name="">
                <button type="submit">Enter</button>
        </form>
    </div>




    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>