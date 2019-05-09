<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   @include('includes.head')
</head>
<body class="postulante">
  <div class="wrapper">

    @include('includes.sidebar')

    <!-- Page Content  -->
    <div id="content">

      @include('includes.mainbar')

      <div class="row mb-3">
        <a href="/postulantes" class="btn btn-link"><i class="fas fa-arrow-left"></i> Volver a la lista</a>
      </div>
      <div class="row">
        <div class="col-12">
          <h2 class="mb-4 text-center text-md-left">Detalle de {{ $postulante->primer_nombre }} {{ $postulante->primer_apellido }}</h2>
        </div>
        <div class="col-12 col-md-6 text-center text-md-left">
          <a href="/postulantes/{{ $postulante->id }}/edit" class="btn btn-warning" title="Editar"><i class="fas fa-pencil-alt"></i></a>
          <a href="/uploads/files/{{ $postulante->url_cv }}" target="_blank" class="btn btn-info" title="Curriculum"><i class="fas fa-id-badge"></i></a>

          <form class="mt-1" method="post" action="/postulantes/actualizarEstado">
            @csrf
            <input type="hidden" name="estado" value="{{ $postulante->id }}">
            @if($postulante->estado == 1)
               <button class="btn btn-md btn-success disabled" type="submit">Revisado</button>
             @elseif ($postulante->estado == 0)
               <button class="btn btn-md btn-success" type="submit">Confirmar revisión</button>
             @endif
          </form>

        </div>
      </div>

      <div class="row">

        <div class="accordion mt-3 col-12 col-md-8" id="accordionExample">
              <div class="card">
                <div class="card-header" id="headingOne">
                  <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Datos personales
                    </button>
                  </h2>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                  <div class="card-body">
                    <table class="tabla-detalles">
                      <tbody>
                        <tr>
                          <th>DNI</th>
                          <td>{{ $postulante->dni }}</td>
                        </tr>
                        <tr>
                          <th>Nombres</th>
                          <td>{{ $postulante->primer_nombre }} {{ $postulante->segundo_nombre }}</td>
                        </tr>
                        <tr>
                          <th>Apellidos</th>
                          <td>{{ $postulante->primer_apellido }} {{ $postulante->segundo_apellido }}</td>
                        </tr>
                        <tr>
                          <th>Celular</th>
                          <td>{{ $postulante->celular }} </td>
                        </tr>
                        <tr>
                          <th>Correo</th>
                          <td>{{ $postulante->email }} </td>
                        </tr>
                        <tr>
                          <th>Dirección</th>
                          <td>{{ $postulante->direccion }}, {{ $postulante->ciudad }}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingTwo">
                  <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Datos profesionales
                    </button>
                  </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                  <div class="card-body">
                    <table class="tabla-detalles">
                      <tbody>
                        <tr>
                          <th>Carrera</th>
                          <td>{{ $postulante->carrera }}</td>
                        </tr>
                        <tr>
                          <th>Ciclo</th>
                          <td>{{ $postulante->ciclo }}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

      </div>







    </div>



  </div>


  @include('includes.footer-scripts')
</body>
</html>
