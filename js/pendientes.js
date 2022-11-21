$(document).ready(function() {
    $('#pendientes-table').DataTable({
         "language": {
             "url": "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
         }
     });
     var table = $('#pendientes-table').DataTable();
     $('#buscar-pendientes').on('keyup', function() {
         table.search(this.value).draw();
     });
 });