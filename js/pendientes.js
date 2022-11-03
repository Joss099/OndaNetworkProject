$(busqueda());

function busqueda(consulta){
    $.ajax({
        url: 'utilidades/buscar-ordenes-pendientes.php',
        type: 'POST',
        dataType: 'html',
        data: {consulta: consulta},
    })
    .done(function(respuesta){
        $("#ordenes").html(respuesta);
    })
    .fail(function(){
        console.log("error");
    })
}

//Capturar el valor del input para realizar la busqueda
$(document).on('keyup', '#buscar-ordenes', function(){
    var valor = $(this).val();
    if(valor != ""){
        busqueda(valor);
    }else{
        busqueda();
    }
})