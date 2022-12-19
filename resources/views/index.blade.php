<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Melhor Log</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <div class="container-fluid">
            <h1 class="title m-4">Melhor Log</h1>
            <p>Baixe a seguir relatórios de requisições por serviço, por consumidor e tempo médio de latências por serviço.</p>
            <div class="row mb-2">
                <div class="col align-self-center">
                    <a href="{{ route('consumer') }}" class="btn btn-outline-primary">Requisições por consumidor</a>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col align-self-center">
                    <a href="{{ route('service') }}" class="btn btn-outline-primary">Requisições por serviço</a>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col align-self-center">
                    <a href="{{ route('latencies') }}" class="btn btn-outline-primary">Tempo médio de latências por serviço</a>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
