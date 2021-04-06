<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoPeças</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
    <body class="container">
        <form method="POST" action="/car">
            @csrf
            <div >
                <div class="form-group row mt-2">
                    <label for="mark" class="col-sm-2 col-form-label" >Marca:</label>
                    <div class="col-sm-5">                        
                        <input type="text" class="form-control" id="mark" placeholder="Ex: Jaguar" name="mark" value="{{$car->mark}}">
                    </div>
                </div>
                <div class="form-group row mt-2">
                    <label for="vehicleModel" class="col-sm-2 col-form-label" >Modelo do Veiculo:</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="vehicleModel" placeholder="Ex: Jaguar XF" name="vehicleModel" value="{{$car->vehicleModel}}">
                    </div>
                </div>
                <div class="form-group row mt-2">
                    <label for="plate" class="col-sm-2 col-form-label" >Placa:</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="plate" name="plate" placeholder="Ex: ABC1D23" value="{{$car->plate}}">
                    </div>
                </div>
                <div class="form-group row mt-2">
                    <label for="color" class="col-sm-2 col-form-label" >Cor:</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="color" placeholder="Ex: Preto" name="color" value="{{$car->color}}">
                    </div>
                </div>
                <div class="form-group row mt-2">
                    <label for="manufacturing" class="col-sm-2 col-form-label" >Ano de Fabricação:</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="manufacturing" placeholder="Ex: 2020" name="manufacturing" value="{{$car->manufacturing}}">
                    </div>
                </div>
                <div class="btn-toolbar row">
                    <input type="hidden" id="id" name="id" value="$car->id">
                    <div class="btn-group mr-2 mt-2 col-md-1 offset-md-5">
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                    <div class="btn-group mr-2 mt-2 col-md-1">
                        <button href="/car" class="btn btn-primary">Novo</button>
                    </div>
                </div>
            </div>
        </form>

        <table class="table table-bordered table-striped mt-5">
            <thead>
                <tr>
                    <th>Marca</th>
                    <th>Modelo do Veiculo</th>
                    <th>Placa</th>
                    <th>Cor</th>
                    <th>Ano de Fabricação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cars as $car)
                    <tr>
                        <td>{{$car->mark}}</td>
                        <td>{{$car->vehicleModel}}</td>
                        <td>{{$car->plate}}</td>
                        <td>{{$car->color}}</td>
                        <td>{{$car->manufacturing}}</td>
                        <td> 
                            <button href="/car/{{ $car-> id }}/edit" class="btn btn-sm btn-primary"> EDIT</button>  
                        </td>
                        <td> <form action="/car/{{$car->id}}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="Submit" class="btn btn-sm btn-danger center">DEL</button>
                            </form>
                        </td>   

                    </tr>
                @endforeach
            </tbody>
        </table>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html>