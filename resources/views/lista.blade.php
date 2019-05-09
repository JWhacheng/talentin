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

      <h2 class="mb-5">Lista de postulantes</h2>

      <div class="">

        <table id="dtPostulantes" class="display">
          @foreach($postulantes as $postulante)
              <tr>
                  <td class="text-center">{{ $postulante->id }}</td>
                  <td>{{ $postulante->primer_nombre }} {{ $postulante->segundo_nombre }}</td>
                  <td>{{ $postulante->primer_apellido }} {{ $postulante->segundo_apellido }}</td>
                  <td>{{ $postulante->carrera }}</td>
                  <td>
                    @if ($postulante->estado == 0)
                      No
                    @elseif ($postulante->estado == 1)
                      Sí
                    @endif
                  </td>
                  <td>{{ $postulante->celular }}</td>
                  <td>
                    <a href="mailto:{{ $postulante->email }}" target="_blank" title="Enviar correo" class='see btn btn-sm btn-primary'><i class="fas fa-envelope"></i></a>
                    <a href="/postulantes/{{ $postulante->id }}" class='see btn btn-sm btn-success' title="Ver detalles"><i class='fas fa-eye'></i></a>
                    <a href="/postulantes/{{ $postulante->id }}/edit" class='edit btn btn-sm btn-warning' title="Editar"><i class='fas fa-pencil-alt'></i></a>
                    <a href="#" data-id="{{ $postulante->id }}" class='delete btn btn-sm btn-danger' title="Borrar"><i class='fas fa-trash'></i></a>
                  </td>
              </tr>
          @endforeach
        </table>

      </div>


    </div>



  </div>


  @include('includes.footer-scripts')
</body>
</html>
