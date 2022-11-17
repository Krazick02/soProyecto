<?php
    include '../php/Proceso.php';
    $nombres=$_POST['nombre'];
    $llegada=$_POST['llegada'];
    $rafaga=$_POST['rafaga'];
    $lista = array() ;
    // $nombresA = array() ;
    // $llegadaA = array() ;
    // $rafagaA = array() ;
    // $v =0;

    // foreach ($nombres as $nombre){
    //     array_push($nombresA,[$v => $nombre]);
    //     $v++;
    // }
    // $v =0;

    // foreach ($llegada as $lleg){
    //     array_push($llegadaA,[$v => $lleg]);
    //     $v++;
    // }
    // $v =0;

    // foreach ($rafaga as $raf){
    //     array_push($rafagaA,[$v => $raf]);
    //     $v++;
    // }

    for ($i = 0; $i < $_POST['procesos']; $i++) {
        $nuevo = new Proceso($nombres[$i],$llegada[$i],$rafaga[$i]);
        array_push($lista,$nuevo);
    }
    
    foreach ($lista as $proceso){
        echo "Nombre :".$proceso->getNombre()." Rafaga :".$proceso->getRafaga()." LLegada :".$proceso->gettEntrada()."<br>";
    }

    //var_dump($nombresA[1]=>$nombre);

    // for($i =0 ; $i<count($nombres);$i++){
    //     echo $nombres[$i].'<br>';
    // }
    // echo $nombres[1].'<br>';

    //var_dump($lista)

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <button onclick="ver()">ver</button> -->

    <?php 
    foreach ($lista as $proceso){
        //echo "Nombre :".$proceso->getNombre()." Rafaga :".$proceso->getRafaga()." LLegada :".$proceso->gettEntrada()."<br>";
        ?>
        

        <button type="button" onclick="verInfoCliente('<?php echo json_encode($proceso);?>')"> Spam</button>


        <?php
    }?>



    <script type="text/javascript">
        function ver(nombre){
            console.log(nombre.nombre);
        }
    </script>
</body>
</html>
    