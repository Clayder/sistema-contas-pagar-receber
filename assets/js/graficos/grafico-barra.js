function graficoBarra() {

    $.ajax({
        url: 'api.php/?class=home&metodo=graficoBarra',
        type: 'GET',
        dataType: 'json',
        success: function (retorno) {
            montarGraficoBarra(retorno);
        },
        error: function (erro) {
            alert("Erro ao gerar o gráfico de barra");
        }
    })

}

function montarGraficoBarra(dados) {
    
    console.log(dados.pagar);
    console.log(dados.receber);

    var pagar = new Array();
    for(var i = 0; i<12; i++){
        pagar[i] = dados.pagar[i];
    }

    var receber = new Array();
    for(var i = 0; i<12; i++){
        receber[i] = dados.receber[i];
    }

    console.log(pagar);

    new Chart(document.getElementById("mybarChart2"), {
        type: 'bar',
        data: {
            labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
            datasets: [
                {
                    label: "Contas a pagar",
                    backgroundColor: "#E74C3C",
                    data: pagar
                }, {
                    label: "Contas a receber",
                    backgroundColor: "#1ABB9C",
                    data: receber
                }
            ]
        },
        options: {
            title: {
                display: true,
                text: 'Contas (R$)'
            },
            responsive: true
        }

    });
}
        