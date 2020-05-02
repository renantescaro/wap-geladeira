
function fecharQuantidade(){

    var txtItemAtual = document.getElementById('txtItemAtual')

    if(txtItemAtual.value=='cesta'){

        var lblCesta      = document.getElementById('lblQtdCesta')
        var txtQuantidade = document.getElementById('txtQuantidade')

        lblCesta.textContent = Number(txtQuantidade.value)

    }else if(txtItemAtual.value=='geladeira'){

        var lblGeladeira  = document.getElementById('lblQtdGeladeira')
        var txtQuantidade = document.getElementById('txtQuantidade')

        lblGeladeira.textContent = Number(txtQuantidade.value)
    }

    txtQuantidade.value=0

    $("#modal").modal("hide")
}

function abrirQuantidade(item){
    document.getElementById('txtItemAtual').value = item
    $("#modal").modal()
}

function aumentarQtd(){
    let qtd = document.getElementById('txtQuantidade')
    qtd.value = Number(qtd.value)+1
}

function diminuirQtd(){
    let qtd = document.getElementById('txtQuantidade')
    
    if(qtd.value>0){
        qtd.value = Number(qtd.value)-1
    }
}

function confirmarQtd(){
    fecharQuantidade()
}

function finalizarCompra(){
    var lblCesta     = Number(document.getElementById('lblQtdCesta').textContent)
    var lblGeladeira = Number(document.getElementById('lblQtdGeladeira').textContent)
    var usuarioLogado = document.getElementById('lblUsuario').textContent

    var total = lblCesta + (lblGeladeira * 2)

    if(confirm("Compra no valor de R$ "+total+",00\n"+"Usuário "+usuarioLogado+"\n"+"Confirmar?")){
        confirmarCompra(usuarioLogado, lblCesta, lblGeladeira)
    }
}

function confirmarCompra(usuarioLogado, lblCesta, lblGeladeira){
    var ajax = new XMLHttpRequest()

    var dadosEnviar = new Object()
    dadosEnviar.usuario      = usuarioLogado
    dadosEnviar.qtdCesta     = lblCesta
    dadosEnviar.qtdGeladeira = lblGeladeira

    var dados = JSON.stringify(dadosEnviar)

    ajax.open("POST", "/confirmar-compra", true)
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    
    ajax.send("dados="+dados)

    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            
            if(ajax.responseText=="ok"){
                redirecionarPaginaFinalizacao()
            }else{
                erroConfirmarVenda()
            }
        }
    }
}

function erroConfirmarVenda(){

}

function redirecionarPaginaFinalizacao(){
    window.location.href = '/finalizar'
}

function comprarNovamente(){
    window.location.href = '/'
}