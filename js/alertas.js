// $('#Guardar').click(function(){

//     nombre= $('#nombre_usuario').val();
//     usuario = $('#usuario').val();
//     contra = $('#pass').val();
//     rol = $('#rol-usuario').val();
//     $.ajax({

//         url:'./utilidades/registro-usuario.php',
//         type:'POST',
//         dataType: 'json',
//         data:{nombre:nombre,usuario:usuario,contra:contra,rol:rol},
        
//         success:function(response){
//             alert('Mensaje: '+response.mensaje);
//             alert('Estado:' +response.estado);

//             Swal.fire({
//                 position: 'top-center',
//                 icon: 'error',
//                 title: 'Guardado correctamente',
//                 showConfirmButton: true,
//                 time: 5000
//             });
//         },error:function(xhr,status,error){
//             Swal.fire({
//                 position: 'top-center',
//                 icon: 'success',
//                 title: 'Guardado correctamente',
//                 showConfirmButton: true,
//                 time: 5000
//             }).then(function(){
//                 window.location = "./visualizar_usuarios.php";
//           })
//         }
//     });
// })

// $('#Guardar').click(function(){

//     $.post('./utilidades/registro-usuario.php',
//     {
//         nombre:$('#nombre_usuario').val(),
//         usuario:$('#usuario').val(),
//         contra:$('#pass').val(),
//         rol:$('#rol-usuario').val(),
//     },
//     function(estado){
//         alert('Mensaje: '+response.mensaje);
//         alert('Estado: ' +response.estado);
//         Swal.fire({
//             position: 'top-center',
//             icon: 'success',
//             title: 'Usuario Guardado',
//             showConfirmButton: true,
//             timer: 1500
//         }).then(function(){
//             window.location = "./visualizar_usuarios.php";
//         })
//     });
// })