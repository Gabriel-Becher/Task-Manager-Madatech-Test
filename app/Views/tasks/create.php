<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova tarefa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body style="background-color: #f9ffd7;" class="h-100 w-100 d-flex flex-column justify-content-center align-items-center">
    
    <?php if (session('error')) : ?>
        <div class="alert alert-danger">
            <?= esc(session('error')) ?>
        </div>
    <?php endif ?>
    <div class="container d-flex flex-column justify-content-between align-items-center h-50">
        <h1 class="mt-5">Nova tarefa</h1>
        <form action="<?= site_url('tasks/') ?>" method="post" class="form-control w-50 d-flex flex-column justify-content-between align-items-center">
            <?= csrf_field() ?>
            <div class="mb-3 w-100">
                <label for="title" class="form-label">Título</label>
                <input type="text" value="<?= esc(old('title')) ?>" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3 w-100 h-50">
                <label for="description" class="form-label">Descrição</label>
                <textarea class="form-control" id="description" name="description" rows="3" ><?= esc(old('description')) ?></textarea>
            </div>
            <div class="mb-3 w-100">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="pendente" <?= old('status') === 'pendente' ? 'selected' : '' ?>>Pendente</option>
                    <option value="em andamento" <?= old('status') === 'em andamento' ? 'selected' : '' ?>>Em Andamento</option>
                    <option value="concluída" <?= old('status') === 'concluída' ? 'selected' : '' ?>>Concluída</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Criar Tarefa</button>
        </form>
    </div>
    

    <?php $errors = session('errors') ?? null ?>

    <?php if (isset($errors)) : ?>
        <div class="d-inline-block alert alert-danger m-3" role="alert">
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>