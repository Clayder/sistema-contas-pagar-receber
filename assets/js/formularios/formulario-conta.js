$(document).ready(function () {
    inserirMascaraMonetaria();
    verificaValorMaiorPermitido(881.90);
    desconto();
});

function inserirMascaraMonetaria() {
    $("input[name=valor]").maskMoney({
        decimal: ",",
        thousands: "."
    });
    $("input[name=desconto]").maskMoney({
        decimal: ",",
        thousands: "."
    });
}

function verificaValorMaiorPermitido(valPermitido) {
    $("input[name=desconto]").prop("disabled", true);
    $("input[name=valor]").blur(function () {
        //pegamos o valor do input sem o formato monetario
        var valor = $("input[name=valor]").maskMoney('unmasked')[0];
        if (valor > valPermitido) {
            $("p.erroValor").text(" O valor não pode ser maior que " + valPermitido);
            $("button.inputButton").prop("disabled", true);
            $("input[name=desconto]").prop("disabled", true);
        } else {
            $("button.inputButton").prop("disabled", false);
            $("p.erroValor").text("");
            $("input[name=desconto]").prop("disabled", false);
        }
    });
}

function desconto() {
    $("button.inserirDesconto").click(function () {
        inserirMascaraMonetaria();
        var valor = $("input[name=valor]").maskMoney('unmasked')[0];
        console.log("Valor " + valor);
        var valorDesconto = $("input[name=desconto]").maskMoney('unmasked')[0];
        console.log("Desconto " + valorDesconto);
        var valorFinal = valor - valorDesconto;
        console.log("Valor final " + valorFinal);
        if (valorFinal > 0) {
            $("input[name=valor]").val(valorFinal.formatMoney(2, ',', '.'));
            $("p.erroValorDesconto").text("");
        } else {
            $("p.erroValorDesconto").text("Valor não permitido");
        }
    });
}

/**
 * Converte um número real para monetário
 * @returns {string}
 */
Number.prototype.formatMoney = function (c, d, t) {
    var n = this, c = isNaN(c = Math.abs(c)) ? 2 : c, d = d == undefined ? "," : d, t = t == undefined ? "." : t,
        s = n < 0 ? "-" : "", i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
};