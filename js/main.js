$(busqueda());

function busqueda(consulta){
    $.ajax({
        url: 'utilidades/buscar-orden.php',
        type: 'POST',
        dataType: 'html',
        data: {consulta: consulta},
    })
    .done(function(respuesta){
        $("#datos").html(respuesta);
    })
    .fail(function(){
        console.log("error");
    })
}

//Capturar el valor del input para realizar la busqueda
$(document).on('keyup', '#buscar-orden', function(){
    var valor = $(this).val();
    if(valor != ""){
        busqueda(valor);
    }else{
        busqueda();
    }
})