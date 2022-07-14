
//tablaComision();
$("#datatable_comisiones input").prop('id', 'searchBar')
$('input#searchBar').on('keyup click', function() {
    filterGlobal();
});

function filterGlobal() {
    $('#datatable_comisiones').DataTable().search(
        $('#searchBar').val()
    ).draw();
}

var tableGlobal;
// funciones
function getComision() {
    $(function() {
        $.ajax({
                async: true,
                type: "get",
                url: 'getComision',
                cache: false,
                dataType: 'json',
            })
            .done(function(data) {})
            .fail(function(res) {});
    });
}

function tablaComision() {
    tableGlobal = $('#datatable_comisiones').DataTable({
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
        "destroy": true,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [1, "desc"], //Initial no order.
        "info": true,
        //"dataType": 'json',
        pageLength: "25",
        responsive: true,

        dom: '<"html5buttons"B>lTfgt<"bottom d-flex justify-content-between"pi>',
        "ajax": {
            "url": "comisiones/getAllQuery",
            "type": "POST",
            "data": {
                nombre: $("#nombreFiltro").val(),
                descripcion: $("#descripcionFiltro").val(),
            },
        },

        autoWidth: true,
        bFilter: false,
        "columnDefs": [
            {
                "width": "100px",
                "targets": 0
            },
            {
                "width": "250px",
                "targets": 1
            },
            {
                "width": "50px",
                "targets": 2
            }


        ],

    });
    tableGlobal.draw();
    
}

// filtros
$('#nombreFiltro').on('change', function() {
    tablaComision();
})
$('#descripcionFiltro').on('change', function() {
    tablaComision();
})



$('#datatable_comisiones').DataTable( {
    language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    },
} );


