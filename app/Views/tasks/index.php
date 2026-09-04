<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Tarefas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body style="background-color: #f9ffd7;" class=" h-100 d-flex flex-column justify-content-center align-items-center">
    <h1>Gerenciador de Tarefas</h1>
    <div class="container w-100 mt-4 d-flex flex-column justify-content-center align-items-center">
        
        <div class="row mb-4 w-100 d-flex flex-column align-items-start">
            <h2 class="text-danger d-block">Pendentes</h2>
            <div class="d-flex flex-column align-items-start">
                <?php if (!empty($tasks['pendente'])) : ?>
                    <?php foreach ($tasks['pendente'] as $task) : ?>
                        <div class="card mb-2 w-100">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title"><?= esc($task['title']) ?></h5>
                                    <p class="card-text"><?= esc($task['description']) ?></p>
                                </div>
                                <div>
                                    <a href="<?= site_url('tasks/edit/' . $task['id']) ?>" class="btn btn-warning">Editar</a>
                                    <form action="<?= site_url('tasks/' . $task['id']) ?>" method="post" class="d-inline">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger">Excluir</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="row mb-4 w-100 d-flex flex-column align-items-start">
            <h2 class="text-warning d-block">Em Andamento</h2>
            <div class="d-flex flex-column align-items-start">
            </div>
        </div>
        <div class="row mb-4 w-100 d-flex flex-column align-items-start">
            <h2 class="text-success d-block">Concluídas</h2>
            <div class="d-flex flex-column align-items-start">
            </div>
        </div>
    </div>

    <a href="<?= site_url('tasks/new') ?>" class="btn btn-primary position-absolute ml-1 mt-1">Nova Tarefa</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>