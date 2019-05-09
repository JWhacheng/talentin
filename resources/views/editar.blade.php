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

      <button onclick="history.back();" class="btn btn-link mb-3"><i class="fas fa-arrow-left"></i> Cancelar</button>
      <h2 class="mb-4">Editar postulante {{ $postulante->dni }}</h2>

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
        <form action="/postulantes/{{ $postulante->id }}" method="POST">
          @csrf
          @method('put')
          <h4 class="py-2">Datos personales</h4>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="primerNombre">Primer nombre</label>
              <input type="text" class="form-control" id="primerNombre" name="primerNombre" value="@if(!old('primerNombre')){{ $postulante->primer_nombre }}@else{{ old('primerNombre') }}@endif" required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="segundoNombre">Segundo nombre</label>
              <input type="text" class="form-control" id="segundoNombre" name="segundoNombre" value="@if(!old('segundoNombre')){{ $postulante->segundo_nombre }}@else{{ old('segundoNombre') }}@endif">
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="primerApellido">Apellido paterno</label>
              <input type="text" class="form-control" id="primerApellido" name="primerApellido" value="@if(!old('primerApellido')){{ $postulante->primer_apellido }}@else{{ old('primerApellido') }}@endif"  required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="segundoApellido">Apellido materno</label>
              <input type="text" class="form-control" id="segundoApellido" name="segundoApellido" value="@if(!old('segundoApellido')){{ $postulante->segundo_apellido }}@else{{ old('segundoApellido') }}@endif"  required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" value="@if(!old('email')){{ $postulante->email }}@else{{ old('email') }}@endif"  required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="celular">Celular</label>
              <input type="number" class="form-control" id="celular" name="celular" value="@if(!old('celular')){{ $postulante->celular }}@else{{ old('celular') }}@endif"  required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="dni">DNI</label>
              <input type="number" class="form-control" id="dni" name="dni" value="@if(!old('dni')){{ $postulante->dni }}@else{{ old('dni') }}@endif"  required>
            </div>
            <div class="col-md-4 mb-3">
              <label>Ciudad</label>
              <select class="custom-select" id="ciudad" name="ciudad" required>
                <option value="@if(!old('ciudad')){{ $postulante->ciudad }}@else{{ old('ciudad') }}@endif"  selected>@if(!old('ciudad')){{ $postulante->ciudad }}@else{{ old('ciudad') }}@endif </option>

                <option disabled="disabled">---------------------------</option>
                <option disabled>Selecciona tu ciudad</option>
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
              <input type="text" class="form-control" id="direccion" name="direccion" value="@if(!old('direccion')){{ $postulante->direccion }}@else{{ old('direccion') }}@endif"  required>
            </div>
          </div>
          <h4 class="py-2">Datos profesionales</h4>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label>Carrera</label>
              <select class="custom-select" name="carrera" required>
                <option value="@if(!old('carrera')){{ $postulante->carrera }}@else{{ old('carrera') }}@endif"  selected>@if(!old('carrera')){{ $postulante->carrera }}@else{{ old('carrera') }}@endif </option>

                <option disabled="disabled">---------------------------</option>
                <option disabled>Selecciona tu carrera</option>
                <option value="1">Ing Industrial</option>
                <option value="2">Ing de Sistemas</option>
                <option value="3">Marketing</option>
                <option value="4">Psicología</option>
              </select>
            </div>
            <div class="col-md-4 mb-3">
              <label>Ciclo</label>
              <select class="custom-select" name="ciclo" required>
                <option value="@if(!old('ciclo')){{ $postulante->ciclo }}@else{{ old('ciclo') }}@endif"  selected>@if(!old('ciclo')){{ $postulante->ciclo }}@else{{ old('ciclo') }}@endif </option>

                <option disabled="disabled">---------------------------</option>
                <option disabled>Selecciona tu ciclo</option>
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
          <button class="btn btn-primary btn-md-block" type="submit">Guardar cambios</button>
        </form>

      </div>


    </div>



  </div>


  @include('includes.footer-scripts')
</body>
</html>
