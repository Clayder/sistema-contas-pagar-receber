function pizza() {
    $.ajax({
        url: 'api.php/?class=categoria&metodo=graficoPizza',
        type: 'GET',
        dataType: 'json',
        beforeSend: function () {
            $('#carregando').fadeIn();
        },
        timeout: 3000,
        success: function (retorno) {
            //$('#resposta').html(retorno);
            montarGraficoPizza(retorno);
        },
        error: function (erro) {
            //$('#resposta').html(erro);
            alert("Erro ao gerar o gráfico de gasto por categoria");
        }
    })


}

function montarGraficoPizza(dadosCategoria) {
    new Chart(document.getElementById("doughnut-chart"), {
        type: 'doughnut',
        data: {
            labels: dadosCategoria.nomeSetores,
            datasets: [
                {
                    label: "Gastos ( R$)",
                    backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850"],
                    data: dadosCategoria.valores
                }
            ]
        },
        options: {
            title: {
                display: true,
                text: 'Gastos (R$)'
            },
            responsive: true
        }
    });
}