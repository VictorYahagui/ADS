<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <body>
        <form method="POST" action="/car">
            @csrf
            <div >
                <div>
                    <label for="mark" class="">Marca:</label>
                    <input type="text" id="mark" name="mark" value="{{$car->mark}}">
                </div>
                <div>
                    <label for="vehicleModel">Modelo do Veiculo:</label>
                    <input type="text" id="vehicleModel" name="vehicleModel" value="{{$car->vehicleModel}}">
                </div>
                <div>
                    <label for="plate">Placa:</label>
                    <input type="text" id="plate" name="plate" value="{{$car->plate}}">
                </div>
                    <label for="color">Cor:</label>
                    <input type="text" id="color" name="color" value="{{$car->color}}">
                <div>
                <div>
                    <label for="manufacturing">Ano de Fabricação:</label>
                    <input type="text" id="manufacturing" name="manufacturing" value="{{$car->manufacturing}}">
                </div>
                <a href="/car">NEW</a>
                <input type="hidden" id="id" name="id" value="$car->id">
                <button type="submit">Salvar</button>
                </div>
            </div>
        </form>

        <table border="1">
            <thead>
                <tr>
                    <td>Marca</td>
                    <td>Modelo do Veiculo</td>
                    <td>Placa</td>
                    <td>Cor</td>
                    <td>Ano de Fabricação</td>
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
                            <a href="/car/{{ $car-> id }}/edit"> EDIT</a> 
                        </td>
                        <td> <form action="/car/{{$car->id}}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="Submit">DEL</button>
                            </form>
                        </td>   

                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>