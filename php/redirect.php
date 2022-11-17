<?php 

    $procesos = $_POST['procesos'];
    $tiempo = $_POST['tiempo'];
    $ut = $_POST['ut'];
    
    switch ($_POST['algoritmo']){
        case '1':
            header("Location:../algoritmos/fcfs.php?procesos={$procesos}&tiempo={$tiempo}&ut={$ut}");
            break;
        case '2':
            header("Location:../algoritmos/prioridadDinamica.php?procesos={$procesos}&tiempo={$tiempo}&ut={$ut}");
            break;
        case '3':
            header("Location:../algoritmos/prioridadEstatica.php?procesos={$procesos}&tiempo={$tiempo}&ut={$ut}");
            break;
        case '4':
            header("Location:../algoritmos/rr.php?procesos={$procesos}&tiempo={$tiempo}&ut={$ut}");
            break;
        case '5':
            header("Location:../algoritmos/sjn.php?procesos={$procesos}&tiempo={$tiempo}&ut={$ut}");
            break;
        case '6':
            header("Location:../algoritmos/srt.php?procesos={$procesos}&tiempo={$tiempo}&ut={$ut}");
            break;
    }

    // algoritmo=2&procesos=asd&tiempo=asd&ut=ms