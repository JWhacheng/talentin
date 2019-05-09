$(function() {

  $('#sidebarCollapse').on('click', function () {
      $('#sidebar').toggleClass('active');
  });

	// Agregar clase a Menú
	$('body.dashboard #sidebar .dashboard-li').addClass("active");
  $('body.postulante #sidebar .postulante-li').addClass("active");



  // Llamar a Datatable para listar los postulantes
   var table = $('#dtPostulantes').DataTable( {
     language: {
        "lengthMenu": "Mostrar _MENU_ registros por página",
        "zeroRecords": "No se encontró datos",
        "info": "Mostrando página _PAGE_ de _PAGES_",
        "infoEmpty": "Registros no disponibles",
        "infoFiltered": "(filtered from _MAX_ total records)",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "paginate": {
            "first":      "Primero",
            "last":       "Último",
            "next":       "Siguiente",
            "previous":   "Anterior"
        }
     },
    searching: true,
    ordering: true,
    columns: [
      {
        title: "ID",
        orderable: true
      },
      {
        title: "Nombres",
        orderable: true
      },
      {
        title: "Apellidos",
        orderable: true
      },
      {
        title: "Carrera",
        orderable: true
      },
      {
        title: "Revisado",
        orderable: true
      },
      {
        title: "Celular",
        orderable: false
      },
      {
        title: "Acciones",
        orderable: false
      }
    ]

  });

});


$(document).on('click', '.delete', function (e) {
  e.preventDefault();
  var id = $(this).data('id');

  Swal.fire({
      title: "¿Estás seguro?",
      type: "warning",
      confirmButtonColor: '#d33',
      cancelButtonColor: '#28a745',
      confirmButtonText: "Sí",
      showCancelButton: true,
      cancelButtonText: "No"
  }).then((result) => {
    if (result.value) {
      $.ajax({
        type: "POST",
        data: {
          _method: "DELETE",
          'id': id
        },
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: "/postulantes/" + id,
        success: function (data) {
          window.location.href = "/postulantes";
        }
      });
      Swal.fire(
        "Eliminado",
        "Se ha eliminado correctamente",
        "success"
      );
    }
  });
});
