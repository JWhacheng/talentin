<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   @include('includes.head')
</head>
<body class="dashboard">
  <div class="wrapper">

    @include('includes.sidebar')

    <!-- Page Content  -->
    <div id="content">

      @include('includes.mainbar')

      <div class="container">
        <div class="card mx-auto mx-md-0" style="width: 19rem;">
          <div class="card-body">
            <h5 class="card-title text-center">Pendientes de Revisión <span class="badge badge-success">{{ $cantPendientes }}</span></h5>
            <table class="tabla-dashboard mx-auto mt-4">
              <tbody>
                @foreach ($postulantesPendientes as $postulantePendiente)
                  <tr>
                    <td>{{ $postulantePendiente->primer_nombre }} {{ $postulantePendiente->primer_apellido }}</td>
                    <td class="text-center"><a href="/postulantes/{{$postulantePendiente->id}}" class="btn btn-sm btn-info">Ver</a></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

      </div>

    </div>



  </div>


  @include('includes.footer-scripts')
</body>
</html>
