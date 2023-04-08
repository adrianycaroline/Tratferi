// Contador de Horas

function atualizarHoras() {
    var dataAtual = new Date();
    var horas = dataAtual.getHours();
    var minutos = dataAtual.getMinutes();
    var segundos = dataAtual.getSeconds();
    horas = horas < 10 ? "0" + horas : horas;
    minutos = minutos < 10 ? "0" + minutos : minutos;
    segundos = segundos < 10 ? "0" + segundos : segundos;
    document.getElementById("horas").innerHTML = horas + ":" + minutos + ":" + segundos;
    setTimeout(atualizarHoras, 1000);
}



