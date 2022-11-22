<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>First-come, Fist-served</title>
    <link rel="stylesheet" href="../style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <?php include '../templates/navbar.template.php' ?>
    <header class="container">
        <h1>First-Come, First-Served (FCFS)</h1>
    </header>

    <div class="container-fluid">
        <div class="row">
            <!-- <form action="../resultados/fcfs.php" method="POST"> -->
                


            <p><h5 class="fw-bold">Ingrese los procesos</h5> </p>
            <div class="col">
                <div class="input-group">
                    <input type="text" id="nombre" placeholder="nombre del proceso " class="form-control">
                    <input type="text" id="llegada" placeholder="llegada del proceso " class="form-control">
                    <input type="text" id="rafaga" placeholder="rafaga del proceso " class="form-control">
                    <button onclick="addProcess()" class="btn btn-primary" id="btnAgregar" >Agregar</button>
                    <!-- <button onclick="updateTables()">iniciar</button> -->
                </div>
            </div>
            <p><h5 class="fw-bold">Lapso de tiempo:</h5> </p>
            <div class="col">
                <input type="text" id="tiempoLapso" value="<?= $_GET['tiempo'] ?>" disabled class="form-control">
            </div>
            <p><h5 class="fw-bold">Procesos iniciales: </h5></p>
            <div class="col">
                <input type="text" id="procesosIniciales" value="<?= $_GET['procesos'] ?>" disabled class="form-control">
            </div>
            <!-- </form> -->
        </div>
        <div class="row">
            <span class="fw-bold">Procesos ingresados</span>
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
            <button onclick="llenar()" class="btn btn-primary" disabled="true" id="btnIniciar">Iniciar</button>
            <button onclick="recargar()" class="btn btn-primary" disabled="true" id="btnReset">Resetear</button>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Llegada</th>
                        <th scope="col">Rafagas</th>
                        <th scope="col">T Finalizacion</th>
                        <th scope="col">T Espera</th>
                        <th scope="col">T Retorno</th>
                    </tr>
                </thead>
                <tbody id="processListos">
                </tbody>
            </table>
        </div>
        <div id="chart-container" class="chart-container">
            <!-- <svg class="svg"></svg> -->
        </div>
        <div>
            <div class="row" id="dataSet">
            </div>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="../js/fcfs.js"></script>
</body>

</html>