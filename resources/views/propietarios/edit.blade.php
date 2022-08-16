<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container mt-5">
        <form action="{{route('Propietario.update', $propietario)}}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-3">
              <label class="form-label">Cedula</label>
              <input type="text" class="form-control" name="cedula" value="{{$propietario->cedula}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Telefono</label>
                <input type="text" class="form-control" name="telefono" value="{{$propietario->telefono}}">
              </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</body>
</html>