<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Tarefas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body style="background-color: #f9ffd7;" class=" h-100 w-100">
    <div class=" h-100 d-flex flex-column justify-content-center align-items-center">
        <h1 class="mt-3">Gerenciador de Tarefas</h1>
        <?php if ($success = session()->getFlashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= esc($success) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar" ></button>
            </div>
        <?php endif ?>

        <?php if ($error = session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= esc($error) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar" ></button>
            </div>
        <?php endif ?>

        <?php if (empty($tasks['pendente'])&& empty($tasks['em andamento'])&& empty($tasks['concluída'])) : ?>
            <div class="alert alert-info">
                Nenhuma tarefa cadastrada.
            </div>
        <?php endif ?>
        
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
                                        <p class="card-text text-break w-80"><?= esc($task['description']) ?></p>
                                        <p class="card-text text-muted fs-6"> Atualizado em: <?= esc($task['updated_at']) ?></p>
                                    </div>
                                    <div class="d-flex flex-row justify-content-center align-items-center">
                                        <a href="<?= site_url('tasks/edit/' . $task['id']) ?>" class="btn btn-warning m-1">Editar</a>
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
                <h2 class="text-warning d-block">Em andamento</h2>
                <div class="d-flex flex-column align-items-start">
                    <?php if (!empty($tasks['em andamento'])) : ?>
                        <?php foreach ($tasks['em andamento'] as $task) : ?>
                            <div class="card mb-2 w-100">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="card-title"><?= esc($task['title']) ?></h5>
                                        <p class="card-text text-break w-80"><?= esc($task['description']) ?></p>
                                        <p class="card-text text-muted fs-6"> Atualizado em: <?= esc($task['updated_at']) ?></p>
                                    </div>
                                    <div class="d-flex flex-row justify-content-center align-items-center">
                                        <a href="<?= site_url('tasks/edit/' . $task['id']) ?>" class="btn btn-warning m-1">Editar</a>
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
                <h2 class="text-success d-block">Concluídas</h2>
                <div class="d-flex flex-column align-items-start">
                    <?php if (!empty($tasks['concluída'])) : ?>
                        <?php foreach ($tasks['concluída'] as $task) : ?>
                            <div class="card mb-2 w-100">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="card-title"><?= esc($task['title']) ?></h5>
                                        <p class="card-text text-break w-80"><?= esc($task['description']) ?></p>
                                        <p class="card-text text-muted fs-6"> Concluída em: <?= esc($task['updated_at']) ?></p>
                                    </div>
                                    <div class="d-flex flex-row justify-content-center align-items-center">
                                        <a href="<?= site_url('tasks/edit/' . $task['id']) ?>" class="btn btn-warning m-1">Editar</a>
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
        </div>
    </div>
    <a href="<?= site_url('tasks/new') ?>" class="btn btn-primary position-fixed bottom-0 start-50 translate-middle-x mb-1 z-3">Nova Tarefa</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>