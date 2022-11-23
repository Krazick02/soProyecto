<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <?php //include 'templates/navbar.template.php' 
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 text-center">
                <div class="col-sm-12 text-center p-5">
                    <div class="card" style="width: 28rem;">
                        <img src="https://sm.ign.com/t/ign_pl/review/p/pokemon-de/pokemon-detective-pikachu-review_qfft.1280.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Proyecto de sistemas operativos</h5>
                            <p class="card-text"><b>Algoritmos de planificacion.</b></p>
                            <p class="card-text">Angel de jesus Aviles Cota.</p>
                            <p class="card-text">Ingenieria en Desarrollo de software.</p>
                            <p class="card-text">7mo Semestre.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-sm-3 text-center p-5">
                <div class="card" style="width: 18rem;">
                    <img src="https://sm.ign.com/t/ign_pl/review/p/pokemon-de/pokemon-detective-pikachu-review_qfft.1280.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Proyecto de sistemas operativos</h5>
                        <p class="card-text"><b>Algoritmos de planificacion.</b></p>
                        <p class="card-text">Angel de jesus Aviles Cota.</p>
                        <p class="card-text">Ingenieria en Desarrollo de software.</p>
                        <p class="card-text">7mo Semestre.</p>
                    </div>
                </div>
            </div> -->
            <div class="col-sm-6 p-5">
                <form action="php/redirect.php" method="post">
                    <div class="row">
                        <div class="col">
                            <h5><span class="text-dark">Seleccione el algoritmo que desea emplear</span></h5>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" checked value="1" name="algoritmo" id="algoritmo1">
                                <label class="form-check-label" for="algoritmo1">
                                    FCFS
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="2" name="algoritmo" id="algoritmo2">
                                <label class="form-check-label" for="algoritmo2">
                                    Prioridad dinamica
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="3" name="algoritmo" id="algoritmo3">
                                <label class="form-check-label" for="algoritmo3">
                                    Prioridad estatica
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="4" name="algoritmo" id="algoritmo4">
                                <label class="form-check-label" for="algoritmo4">
                                    Round robbin
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="5" name="algoritmo" id="algoritmo5">
                                <label class="form-check-label" for="algoritmo5">
                                    Short job next
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="6" name="algoritmo" id="algoritmo6">
                                <label class="form-check-label" for="algoritmo6">
                                    Short remaining time first
                                </label>
                            </div>
                            <br>
                            <div class="mb-3">
                                <label class="form-label" for="procesos"><h5><span class="text-dark">Cuantos procesos desea ejecutar?</span></h5></label>
                                <input class="form-control" type="number" value="3" name="procesos" require id="procesos">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="tiempo"><h5><span class="text-dark">Lapsos de tiempo? (ms)</span></h5></label>
                                <input class="form-control" type="number" value="1000" name="tiempo" require id="tiempo">
                            </div>
                            <div class="mb-3 text-center">
                                <button type="submit" class="btn btn-info">Enter</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>