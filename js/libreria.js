
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function abrirPagina(pagina, contenedor, parametros, ejecutar = "") {

    $.ajax({
        type: 'post',
        url: pagina,
        data: parametros,
        async: true,
        success: function (data)
        {
            
            $('#' + contenedor).html(data);

            if (ejecutar !== "") {
                eval(ejecutar);
            }

        }
    });
}

function enviarFormulario(formulario, contenedor = "", ejecutar = "") {

//alert("el id es "+id_formulario);
    var url = $(formulario).attr("action"); // El script a dónde se realizará la petición.
    var type = $(formulario).attr("method");
    console.log('la url : ' + url);
    console.log('el type : ' + type);
    var formData = new FormData(formulario);
    $.ajax({
        type: 'post',
        url: url,
//        dataType:"html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data)
        {
            console.log('Se ha procesado con exito el envio del formulario');


            if (contenedor !== "") {
                $('#' + contenedor).html(data);
            }

            if (ejecutar !== "") {
                eval(ejecutar);
            }

        },
        error: function (xhr, status) {
            alert('Disculpe, existió un problema');
            return false;
        },
        // código a ejecutar sin importar si la petición falló o no
        complete: function (xhr, status) {
            console.log('Petición realizada');
            return false;
        }
    });
    return false; // Evitar ejecutar el submit del formulario.   
}

function respuesta_recarga_multiproducto(json) {
    console.log(json);
    if (json.codigo_respuesta === '00') {
        var classCssAlerta = `alert alert-success`;
        var resultadoTransaccion = 'exitosa';
        $("#idBotonImprimir").show();
    } else {
        var classCssAlerta = `alert alert-danger`;
        var resultadoTransaccion = 'fallida, si el problema persiste comuniquese con su distribuidor o mayorista';
    }
    var html = ``;
    html += `<div class="` + classCssAlerta + `">`;
    html += `La transacción ha sido ` + resultadoTransaccion;
    html += `</div>`;
    $("#idTxtSpanCodigoAutorizacion").html(json.codigo_autorizacion);
    $("#idTxtSpanRespuesta").html(json.respuesta);
    $('#id_div_resultado_transaccion').html(html);
    $('#id_div_codigo_autorizacion').show();
    $('#id_div_respuesta').show();
    $("#idBotonEnviar").hide();
    $("#idBotonCancelar").hide();
    if (json.url_descarga) {
        $("#id_div_url_descarga").show();
        $("#idADocumento").attr("href", json.url_descarga);
    }


}