<!DOCTYPE html>
<html>
<head>
    <title>Crear Nuevo Proyecto - TaskFlow</title>
    <style>
        body { font-family: sans-serif; margin: 20px; line-height: 1.6;}
        .container { max-width: 600px; margin: 20px auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; background-color: #f9f9f9;}
        h2 { color: #333; border-bottom: 2px solid #007bff; padding-bottom: 10px; margin-bottom: 20px;}
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold; color: #555;}
        .form-group input[type="text"],
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 10px;
            box-sizing: border-box; /* Para que el padding no afecte el ancho total */
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
        }
        .btn { display: inline-block; padding: 10px 20px; margin-right: 10px; font-size: 1rem; font-weight: 400; line-height: 1.5; text-align: center; white-space: nowrap; vertical-align: middle; cursor: pointer; border: 1px solid transparent; border-radius: 4px; text-decoration: none;}
        .btn-primary { color: #fff; background-color: #007bff; border-color: #007bff; }
        .btn-primary:hover { background-color: #0056b3; border-color: #004085; }
        .btn-secondary { color: #fff; background-color: #6c757d; border-color: #6c757d; }
        .btn-secondary:hover { color: #fff; background-color: #5a6268; border-color: #545b62; }
        .text-danger { color: #dc3545; font-size: 0.875em; margin-top: 5px; display: block; }
        .alert { padding: 15px; margin-bottom: 20px; border: 1px solid transparent; border-radius: 4px;}
        .alert-danger { color: #721c24; background-color: #f8d7da; border-color: #f5c6cb; }
    </style>
</head>
<body>
<div class="container">
    <h2>Crear Nuevo Proyecto</h2>

    <?php if (isset($validation)): ?>
        <?php if ($validation->getErrors()): ?>
            <div class="alert alert-danger">
                Por favor, corrige los errores en el formulario.
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>
    <?php endif; ?>


    <form action="<?= url_to('projects.store') ?>" method="post">
        <?= csrf_field() ?> <div class="form-group">
            <label for="name">Nombre del Proyecto:</label>
            <input type="text" name="name" id="name" value="<?= old('name') ?>" required>
            <?php if (isset($validation) && $validation->hasError('name')): ?>
                <p class="text-danger"><?= $validation->getError('name') ?></p>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="description">Descripción:</label>
            <textarea name="description" id="description" rows="5"><?= old('description') ?></textarea>
            <?php if (isset($validation) && $validation->hasError('description')): ?>
                <p class="text-danger"><?= $validation->getError('description') ?></p>
            <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Proyecto</button>
        <a href="<?= url_to('projects.index') ?>" class="btn btn-secondary">Cancelar</a>

    </form>
</div>
</body>
</html>