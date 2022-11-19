<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>First-come, Fist-served</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <?php include '../templates/navbar.template.php' ?>
    <div class="container-fluid">
        <div class="row">
            <!-- <form action="../resultados/fcfs.php" method="POST"> -->

            <p>Ingrese los procesos </p>
            <div class="col">
                <div class="input-group">
                    <input type="text" id="nombre" placeholder="nombre del proceso " class="form-control">
                    <input type="text" id="llegada" placeholder="llegada del proceso " class="form-control">
                    <input type="text" id="rafaga" placeholder="rafaga del proceso " class="form-control">
                    <button onclick="addProcess()" class="btn btn-primary">Agregar</button>
                    <!-- <button onclick="updateTables()">iniciar</button> -->
                </div>
            </div>
            <!-- </form> -->
        </div>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Llegada</th>
                        <th scope="col">Rafagas</th>
                    </tr>
                </thead>
                <tbody id="processT">
                </tbody>
            </table>
            <button onclick="llenar()" class="btn btn-primary">Iniciar</button>

            <table class="processT process-table">
                <thead>
                    <tr>
                        <th>E</th>
                    </tr>
                </thead>
                <tbody id="processQ">
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="../js/fcfs.js"></script>
</body>

</html>