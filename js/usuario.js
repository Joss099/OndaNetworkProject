$(busqueda());

function busqueda(consulta){
    $.ajax({
        url: 'utilidades/ver-usuarios.php',
        type: 'POST',
        dataType: 'html',
        data: {consulta: consulta},
    })
    .done(function(respuesta){
        $("#usuarios").html(respuesta);
    })
    .fail(function(){
        console.log("error");
    })
}

//Capturar el valor del input para realizar la busqueda
$(document).on('keyup', '#buscar-usuario', function(){
    var valor = $(this).val();
    if(valor != ""){
        busqueda(valor);
    }else{
        busqueda();
    }
})