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

      <h2 class="mb-4">Agregar nuevo postulante</h2>

      <div class="">
        @if($errors->any())
          <div class="alert alert-danger" role="alert">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <form action="/postulantes" method="POST" enctype="multipart/form-data">
          @csrf
          <h4 class="py-2">Datos personales</h4>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="primerNombre">Primer nombre</label>
              <input type="text" class="form-control" id="primerNombre" name="primerNombre" value="{{ old('primerNombre') }}" required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="segundoNombre">Segundo nombre</label>
              <input type="text" class="form-control" id="segundoNombre" name="segundoNombre" value="{{ old('segundoNombre') }}">
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="primerApellido">Apellido paterno</label>
              <input type="text" class="form-control" id="primerApellido" name="primerApellido" value="{{ old('primerApellido') }}" required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="segundoApellido">Apellido materno</label>
              <input type="text" class="form-control" id="segundoApellido" name="segundoApellido" value="{{ old('segundoApellido') }}" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="celular">Celular</label>
              <input type="number" class="form-control" id="celular" name="celular" value="{{ old('celular') }}" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="dni">DNI</label>
              <input type="number" class="form-control" id="dni" name="dni" value="{{ old('dni') }}" required>
            </div>
            <div class="col-md-4 mb-3">
              <label>Ciudad</label>
              <select class="custom-select" name="ciudad" required>
                <option disabled selected>Selecciona tu ciudad</option>
                <option value="Amazonas">Amazonas</option>
                <option value="Ancash">Ancash</option>
                <option value="Apurímac">Apurímac</option>
                <option value="Arequipa">Arequipa</option>
                <option value="Ayacucho">Ayacucho</option>
                <option value="Cajamarca">Cajamarca</option>
                <option value="Callao">Callao</option>
                <option value="Cuzco">Cuzco</option>
                <option value="Huancavelica">Huancavelica</option>
                <option value="Huánuco">Huánuco</option>
                <option value="Ica">Ica</option>
                <option value="Junín">Junín</option>
                <option value="La Libertad">La Libertad</option>
                <option value="Lambayeque">Lambayeque</option>
                <option value="Lima">Lima</option>
                <option value="Loreto">Loreto</option>
                <option value="Madre de Dios">Madre de Dios</option>
                <option value="Moquegua">Moquegua</option>
                <option value="Pasco">Pasco</option>
                <option value="Piura">Piura</option>
                <option value="Puno">Puno</option>
                <option value="San Martin">San Martin</option>
                <option value="Tacna">Tacna</option>
                <option value="Tumbes">Tumbes</option>
                <option value="Ucayali">Ucayali</option>
              </select>
            </div>
            <div class="col-md-8 mb-3">
              <label for="direccion">Dirección</label>
              <input type="text" class="form-control" id="direccion" name="direccion" value="{{ old('direccion') }}" required>
            </div>
          </div>
          <h4 class="py-2">Datos profesionales</h4>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label>Carrera</label>
              <select class="custom-select" name="carrera" required>
                <option disabled selected>Selecciona tu carrera</option>
                <option value="1">Ing Industrial</option>
                <option value="2">Ing de Sistemas</option>
                <option value="3">Marketing</option>
                <option value="4">Psicología</option>
              </select>
            </div>
            <div class="col-md-4 mb-3">
              <label>Ciclo</label>
              <select class="custom-select" name="ciclo" required>
                <option disabled selected>Selecciona tu ciclo</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
              </select>
            </div>
            <div class="col-md-8 mb-3">
              <label for="curriculum">Subir CV</label><br>
              <input type="file" id="curriculum" name="curriculum">
            </div>
          </div>
          <button class="btn btn-primary btn-md-block" type="submit">Agregar</button>
        </form>

      </div>


    </div>



  </div>


  @include('includes.footer-scripts')
</body>
</html>
