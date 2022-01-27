<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
    </style>
</head>
<h1 class="mt-4">Formulario de inscripción</h1>

<body class="container">
<form method="post" action='/store'>
    @csrf
    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">DNI</label>
        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="12345678X">
    </div>
    <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Nombre y apellidos</label>
        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Arturo Herranz Pérez">
    </div>
    <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Peso</label>
        <input type="number" class="form-control" id="formGroupExampleInput2" placeholder="70" min="1">
    </div>
    <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Altura</label>
        <input type="number" class="form-control" id="formGroupExampleInput2" placeholder="160" min="1">
    </div>
    <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Fecha de nacimiento</label>
        <input type="date" class="form-control" id="formGroupExampleInput2" placeholder="70" min="1">
    </div>
    <label for="formGroupExampleInput" class="form-label">Sexo</label>
    <select class="form-select mb-4" aria-label="Default select example">
        <option selected value="1">Hombre</option>
        <option value="2">Mujer</option>
        <option value="3">Otro</option>
    </select>
    <div class="col-12">
    <button class="btn btn-primary" type="submit">Enviar</button>
  </div>
</form>
</body>

</html>