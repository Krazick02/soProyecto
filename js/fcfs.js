function ProcesoF(id, nombre, tEntrada, rafaga) {
    this.id = id;
    this.nombre = nombre;
    this.tEntrada = tEntrada;
    this.rafaga = rafaga;
    this.tFinal = 0;
    this.tEspera = 0;
    this.tRetorno = 0;
    this.estado = 'nuevo';
    this.color = colorRGB();
}

var idCounter = 1;
let realTimeQuewe = [];
var prlist = [];
var currentProcess = {};
var rafagasCount = 0;
var running = false;

let regex = /^\d+$/;

function addProcess() {
    nombre = document.getElementById("nombre").value;
    llegada = document.getElementById("llegada").value;
    rafaga = document.getElementById("rafaga").value;
    if (nombre && llegada && rafaga && regex.test(llegada) && regex.test(rafaga)) {
        newprocess = new ProcesoF(
            idCounter,
            nombre,
            llegada,
            rafaga,
        );
        idCounter++;
        prlist.push(newprocess);
        updateTables();
    } else {
        alert("Es necesario que los datos esten completos y que LLegada y rafagas son numeros enteros");
    }
    vaciar();
}

function updateTables() {
    document.getElementById("processT").innerHTML = "";
    document.getElementById("processQ").innerHTML = "";
    for (i = 0; i < prlist.length; i++) {
        row = document.getElementById("processT").insertRow(i);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        cell1.innerHTML = prlist[i].id;
        cell2.innerHTML = prlist[i].nombre;
        cell3.innerHTML = prlist[i].tEntrada;
        cell4.innerHTML = prlist[i].rafaga;
    }
}

function inicio() {
    running = true;
}

function pause() {
    running = false;
}

function reinicio() {
    processesCounter = 1;
    prlist = [];
    currentProcess = {};
    rafagasCount = 0;
    running = false;
}

function organizar() {
    prlist.sort((P1, P2) => {
        if (P1.tEntrada < P2.tEntrada) {
            return -1;
        } else if (P1.tEntrada > P2.tEntrada) {
            return 1;
        } else {
            return 0;
        }
    })
}

//Pendiente por verificar
function llenar() {
    document.getElementById("processQ").innerHTML = "";
    let p = 0;
    let i = 0;
    let x = 0;
    let y = 0;
    row = document.getElementById("processQ").insertRow(p);
    for (i = 0; i < 1000; i++) {
        var cell = row.insertCell(i);
        cell.innerHTML = '';
    }
    p++;
    prlist.forEach(process => {
        row = document.getElementById("processQ").insertRow(p);
        let act = rafagasCount;
        let dest = process.tEntrada > rafagasCount ? process.tEntrada : rafagasCount;
        for (i = act; i < dest; i++) {
            var cell = row.insertCell(i);
            cell.innerHTML = '+';
            rafagasCount++;
        }
        p++;
    });
}





















function draw() {
    updateTables();
    if (running) {
        drawstuff();
    } else {
        if (realTimeQuewe.length == 0) {
            background(225);
        }
    }
}

function drawPNames() {
    prlist.forEach((process) => {
        textSize(32);
        text("P" + process.id, 9, 15 + 29 * (prlist.indexOf(process) + 1));
    });
}

function drawstuff() {
    drawPNames();
    prlis.forEach((element) => {
        if (element.at == burstcounter) {
            realTimeQuewe.push(element);
            console.log("agregado a la RTQ");
        }
    });

    if (realTimeQuewe.length > 0) {
        if (
            realTimeQuewe[0].realtimeBuffer >
            realTimeQuewe[0].totalduration - quantum &&
            realTimeQuewe[0].totalduration - quantum >= 0
        ) {
            realTimeQuewe[0].realtimeBuffer--;
        } else if (
            realTimeQuewe[0].realtimeBuffer == 0 ||
            realTimeQuewe[0].realtimeBuffer ==
            realTimeQuewe[0].totalduration - quantum
        ) {
            headToBack();
        } else if (
            realTimeQuewe[0].realtimeBuffer > 0 &&
            realTimeQuewe[0].totalduration - quantum < 0
        ) {
            realTimeQuewe[0].realtimeBuffer--;
        }
    }
    drawlines();
    burstcounter++;
}

function drawlines() {
    strokeWeight(4);
    for (index = 1; index <= prlis.length; index++) {
        if (realTimeQuewe.length > 0) {
            try {
                if (realTimeQuewe[0].id == index) {
                    drawRedLine(index, realTimeQuewe[0].color);
                } else {
                    drawWhiteLine(index);
                }
            } catch (error) {
                drawWhiteLine(index);
            }
        } else {
            drawWhiteLine(index);
        }
    }
}

































function vaciar() {
    document.getElementById("nombre").value = '';
    document.getElementById("llegada").value = '';
    document.getElementById("rafaga").value = '';
}

function generarNumero(numero) {
    return (Math.random() * numero).toFixed(0);
}

function colorRGB() {
    var coolor = "(" + generarNumero(255) + "," + generarNumero(255) + "," + generarNumero(255) + ")";
    return "rgb" + coolor;
}