
        $(document).ready(function() {
            $('#ordenes-table').DataTable({
                 "language": {
                     "url": "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                 }
             });
             var table = $('#ordenes-table').DataTable();
             $('#buscar-ordenes').on('keyup', function() {
                 table.search(this.value).draw();
             });
         });