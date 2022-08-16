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
    <div class="container mt-5 ">
        <form action="">
            <input type="text" name="buscar" class="rounded-pill">
            <div class="btn-group">
              <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
          </form>
        <button class="btn btn-primary" onclick="location.href='{{route('Propietario.create')}}'">Nuevo</button>

        <table class="table table-dark ">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Cedula</th>
                <th scope="col">Telefono</th>
                <th scope="col">Acciones</th>
                



              </tr>
            </thead>
            <tbody>
                @foreach ($propietario as $item)

             <tr>
               <th scope="row">{{$item->id}}</th>
               <td>{{$item->cedula}}</td>
               <td>{{$item->telefono}}</td>
               <td>
                <a href="{{route('Propietario.edit', $item)}}" class="btn btn-warning">Editar</a>
                <form action="{{route('Propietario.destroy', $item)}}" method="POST">
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
            {{ $propietario->links() }}
          </div>
    </div>
</body>
</html>