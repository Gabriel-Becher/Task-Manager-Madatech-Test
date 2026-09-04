<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Tarefas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body class="bg-light h-100 d-flex flex-column justify-content-center align-items-center">
    <h1>Gerenciador de Tarefas</h1>

    <div class="container w-100 mt-4 d-flex flex-column justify-content-center align-items-center">
        
        <div class="row mb-4 w-100 d-flex flex-column align-items-start">
            <h2>Pendentes</h2>
            <div class="col-md-12">
            </div>
        </div>
        <div class="row mb-4 w-100 d-flex flex-column align-items-start">
            <h2>Em Andamento</h2>
            <div class="col-md-12">
            </div>
        </div>
        <div class="row mb-4 w-100 d-flex flex-column align-items-start">
            <h2>Concluídas</h2>
            <div class="col-md-12">
            </div>
        </div>
    </div>

    <a href="<?= 'create' ?>" class="btn btn-primary position-absolute ml-1 mt-1">Nova Tarefa</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>