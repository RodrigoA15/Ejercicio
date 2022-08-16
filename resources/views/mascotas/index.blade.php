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
        @include('sweetalert::alert')
        <form action="">
            <input type="text" name="buscar" class="rounded-pill">
            <div class="btn-group">
              <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
          </form>
        <button class="btn btn-primary" onclick="location.href='{{route('Mascota.create')}}'">Nuevo</button>

        <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Estado</th>
                <th scope="col">Guacal</th>
                <th scope="col">Tipo</th>
                <th scope="col">Propietario</th>
                <th scope="col">Acciones</th>



              </tr>
            </thead>
            <tbody>
             @foreach ($mascota as $i)
             <tr>
                <th scope="row">{{$i->id}}</th>
                <td>{{$i->nombre}}</td>
                <td>{{$i->estado}}</td>
                <td>{{$i->guacal}}</td>
                <td>{{$i->tipo}}</td>
                <td>{{$i->propietario_id}}</td>
                <td>
                    <a href="{{route('Mascota.edit', $i)}}" class="btn btn-warning">Editar</a>
                   <form action="{{route('Mascota.destroy', $i)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger">Eliminar</button>
                   </form>

                </td>

              </tr>
             @endforeach
           
            </tbody>
          </table>
          <div class="d-flex justify-content-center">
            {{ $mascota->links() }}
          </div>
    </div>
</body>
</html>