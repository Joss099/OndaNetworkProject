        $(document).ready(function() {
            $('#proveedores-table').DataTable({
                 "language": {
                     "url": "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                 }
             });
             var table = $('#proveedores-table').DataTable();
             $('#buscar-proveedor').on('keyup', function() {
                 table.search(this.value).draw();
             });
         });