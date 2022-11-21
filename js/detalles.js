
        $(document).ready(function() {
            $('#detalles-table').DataTable({
                 "language": {
                     "url": "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                 }
             });
             var table = $('#detalles-table').DataTable();
             $('#buscar-orden').on('keyup', function() {
                 table.search(this.value).draw();
             });
         });