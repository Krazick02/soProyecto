// function ProcesoF(id, nombre, tEntrada, rafaga) {
//     this.id = id;
//     this.nombre = nombre;
//     this.tEntrada = tEntrada;
//     this.rafaga = rafaga;
//     this.tFinal = 0;
//     this.tEspera = 0;
//     this.tRetorno = 0;
//     this.estado = 'nuevo';
//     this.prioridad = 0;
//     this.color = colorRGB();
// }

var idCounter = 1;
// let realTimeQuewe = [];
var prlist = [];
var procesoEnP = 0;
var procesosLong = 0;
var timerProceso;
// var currentProcess = {};
// var rafagasCount = 0;
// var running = false;

//nuevos 
var colaListos = [];
var colaBloqueados = [];
var numeroProcesos = 0;
var tiempoActual = 0;
var tiempoLlegada = 0;
var procesoActual = 0;
var pausado = false;

var timerValidarProceso = 0;
var timerAgregarProceso = 0;

var rect = {
    width: 18,
    height: 40
};

var constantes = {
    TIEMPOESPERA: document.getElementById('tiempoLapso'),
    PROCESOSINICIALES: document.getElementById('procesosIniciales'),
};

// Clases
function Proceso(id, nombre, llegada, rafaga) {
    this.id = id;
    this.nombre = nombre;
    this.llegada = llegada;
    this.rafaga = rafaga;
    this.comienzo = 0;
    this.finalizacion = 0;
    this.retorno = 0;
    this.espera = 0;
    this.prioridad = 0;
    this.bloqueado = false;
}

let regex = /^\d+$/;

function agregar_proceso_a_listos(proceso) {
    colaListos.push(proceso);
}

function agregar_proceso_a_bloqueados(proceso) {
    colaBloqueados.push(proceso);
}

function addProcess() {
    nombre = document.getElementById("nombre").value;
    llegada = document.getElementById("llegada").value;
    rafaga = document.getElementById("rafaga").value;

    if (nombre && llegada && rafaga && regex.test(llegada) && regex.test(rafaga)) {
        llegada = parseInt(document.getElementById("llegada").value);
        rafaga = parseInt(document.getElementById("rafaga").value);
        newprocess = new Proceso(
            idCounter,
            nombre,
            llegada,
            rafaga,
        );
        idCounter++;
        prlist.push(newprocess);

        //agregar_columna_tabla_listos(proceso);
        //window.pintar_proceso(proceso, colaListos.length);
        updateTables();
    } else {
        alert("Es necesario que los datos esten completos y que LLegada y rafagas son numeros enteros");
    }
    vaciar();
    if (parseInt(document.getElementById('procesosIniciales').value) === prlist.length) {
        document.getElementById('btnAgregar').disabled = true
        document.getElementById('btnIniciar').disabled = false
    }
}

function updateTables() {
    document.getElementById("processT").innerHTML = "";
    for (i = 0; i < prlist.length; i++) {
        row = document.getElementById("processT").insertRow(i);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        cell1.innerHTML = prlist[i].id;
        cell2.innerHTML = prlist[i].nombre;
        cell3.innerHTML = prlist[i].llegada;
        cell4.innerHTML = prlist[i].rafaga;
    }
}
function updateTables2() {
    document.getElementById("processListos").innerHTML = "";
    for (i = 0; i < colaListos.length; i++) {
        row = document.getElementById("processListos").insertRow(i);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        var cell6 = row.insertCell(5);
        var cell7 = row.insertCell(6);
        cell1.innerHTML = colaListos[i].id;
        cell2.innerHTML = colaListos[i].nombre;
        cell3.innerHTML = colaListos[i].llegada;
        cell4.innerHTML = colaListos[i].rafaga;
        cell5.innerHTML = colaListos[i].finalizacion;
        cell6.innerHTML = colaListos[i].espera;
        cell7.innerHTML = colaListos[i].retorno;
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
    prlist.sort((p1, p2) => {
        if (p1.llegada < p2.llegada) {
            return -1;
        } else if (p1.llegada > p2.llegada) {
            return 1;
        } else {
            return 0;
        }
    })
}

//Pendiente por verificar
function llenar() {
    organizar()
    var tePromedio = 0
    var tfPromedio = 0
    var trPromedio = 0
    prlist.forEach(proceso => {
        var procesoAnterior = colaListos[colaListos.length - 1];
        console.log(procesoAnterior)
        var finalizacionAnterior = proceso.llegada;

        if (typeof procesoAnterior === 'object') {
            if (!procesoAnterior.finalizacion < proceso.llegada) {
                finalizacionAnterior = procesoAnterior.finalizacion;
            } else {
                finalizacionAnterior = proceso.llegada;
            }
        }

        proceso.finalizacion = proceso.rafaga + finalizacionAnterior;

        proceso.retorno = proceso.finalizacion - proceso.llegada;
        if (proceso.retorno < 0) {
            proceso.retorno = 0;
        }
        proceso.espera = proceso.retorno - proceso.rafaga;
        if (proceso.espera < 0) {
            proceso.espera = 0;
        }
        proceso.comienzo = proceso.espera + proceso.llegada;

        agregar_proceso_a_listos(proceso);
        tePromedio += proceso.espera
        trPromedio += proceso.retorno
        tfPromedio += proceso.finalizacion
    })

    trPromedio /= colaListos.length
    tfPromedio /= colaListos.length
    tePromedio /= colaListos.length

    document.getElementById('dataSet').innerHTML = `
    <h5><span class="fw-bold text-danger">Datos Generales</span></h5>
    <h5>Tiempo de espera promedio: <span class="text-danger">: `+ tePromedio + ` UT</span></h5>
    <h5>Tiempo de retorno promedio : <span class="text-danger"> `+ trPromedio + ` UT</span></h5>
    <h5>Tiempo de finalizacion promedio: <span class="text-danger">  `+ tfPromedio + ` UT</span></h5>
    <button class="btn btn-danger" onclick="pdf()" id="btnCrearPdf">
                Guardar en PDF
            </button>`
    //console.log("Tiempo de finalizacion promedio = "+ tfPromedio)
    updateTables2();
    document.getElementById('btnIniciar').disabled = true
    document.getElementById('btnReset').disabled = false
    iniciar()
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
function recargar() {
    location.reload();
}
function iniciar() {
    // timerProceso = setInterval(function () {
    //     procesoEnP++
    // }, constantes.TIEMPOESPERA);

    // if (procesoEnP == colaListos.length) {
    //     clearInterval(timerProceso)
    // }

    // obj chart-container
    var cadena = `<h5>Procesos : </h5>
    <table border=\"1\">
    <tbody>`
    colaListos.forEach(p => {
        cadena += "<tr><th>" + p.nombre + "</th>"
        for (i = 0; i < p.llegada; i++) {
            cadena += `<td>
    <button class="btn btn-light">.</button>
    </td>`
        }
        for (i = p.llegada; i < p.comienzo; i++) {
            cadena += `<td>
            <button class="btn btn-warning">.</button>
            </td>`
        }
        for (i = p.comienzo; i < p.finalizacion; i++) {
            cadena += `<td>
            <button class="btn btn-info">.</button>
            </td>`
        }
        cadena += "</tr>"
    })
    cadena += "</tbody></table>"
    document.getElementById('chart-container').innerHTML = cadena
}

function pdf() {
    // const paginaEnPdf = document.body; // <-- Aquí puedes elegir cualquier elemento del DOM
    // html2pdf()
    //     .set({
    //         margin: 1,
    //         filename: 'documento.pdf',
    //         image: {
    //             type: 'jpeg',
    //             quality: 0.98
    //         },
    //         html2canvas: {
    //             scale: 3, // A mayor escala, mejores gráficos, pero más peso
    //             letterRendering: true,
    //         },
    //         jsPDF: {
    //             unit: "in",
    //             format: "a3",
    //             orientation: 'portrait' // landscape o portrait
    //         }
    //     })
    //     .from(paginaEnPdf)
    //     .save()
    //     .catch(err => console.log(err));
    var doc = new jsPDF('p','pt','letter')
    var margin = 10;
    var scale = (doc.internal.pageSize.width - margin * 2) / document.body.scrollWidth
    doc.html(document.body,{
        x : margin,
        y : margin,
        html2canvas: {
            scale : scale,
        },
        callback : function(doc){
            doc.output('dataurlnewwindow',{filename: 'fichero-pdf.pdf'})
        }
    })
}