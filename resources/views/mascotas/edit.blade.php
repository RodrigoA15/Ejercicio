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
        <form action="{{route('Mascota.update', $mascota)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label class="form-label">Nombre</label>
              <input type="text" class="form-control" name="nombre" value="{{$mascota->nombre}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Estado</label>
                <input type="text" class="form-control" name="estado" value="{{$mascota->estado}}">
              </div>
              <div class="mb-3">
                <label class="form-label">Guacal</label>
                <select class="form-select" name="guacal" id="guacal" value="{{$mascota->guacal}}">
                    <option disabled selected>Seleccione una opcion</option>
                    <option value="si">Si</option>
                    <option value="no">No</option>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label">Tipo</label>
                <input type="text" class="form-control" name="tipo" value="{{$mascota->tipo}}">
              </div>

           


        
            
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</body>
</html>