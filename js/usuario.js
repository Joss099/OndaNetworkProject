
        $(document).ready(function() {
            $('#usuarios-table').DataTable({
                 "language": {
                     "url": "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                 }
             });
             var table = $('#usuarios-table').DataTable();
             $('#buscar-usuario').on('keyup', function() {
                 table.search(this.value).draw();
             });
         });