<!DOCTYPE html>
<html>
<head>
    <title>Mis Proyectos - TaskFlow</title>
    <style>
        body { font-family: sans-serif; margin: 20px; line-height: 1.6; }
        .container { max-width: 800px; margin: 20px auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; background-color: #f9f9f9;}
        h2 { color: #333; border-bottom: 2px solid #007bff; padding-bottom: 10px; margin-bottom: 20px;}
        .project-item { border: 1px solid #ddd; padding: 15px; margin-bottom: 15px; border-radius: 5px; background-color: #fff;}
        .project-item h3 { margin-top: 0; color: #007bff;}
        .project-item p { margin-bottom: 5px; }
        .project-item strong { font-weight: bold; }
        .btn { display: inline-block; padding: 10px 20px; margin-bottom: 10px; font-size: 1rem; font-weight: 400; line-height: 1.5; text-align: center; white-space: nowrap; vertical-align: middle; cursor: pointer; border: 1px solid transparent; border-radius: 4px; text-decoration: none;}
        .btn-primary { color: #fff; background-color: #007bff; border-color: #007bff; }
        .btn-primary:hover { background-color: #0056b3; border-color: #004085; }
        .alert { padding: 15px; margin-bottom: 20px; border: 1px solid transparent; border-radius: 4px;}
        .alert-success { color: #155724; background-color: #d4edda; border-color: #c3e6cb; }
        .alert-danger { color: #721c24; background-color: #f8d7da; border-color: #f5c6cb; }
        .no-projects { text-align: center; color: #666;}
    </style>
</head>
<body>
<div class="container">
    <h2>Mis Proyectos</h2>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= esc(session()->getFlashdata('success')) ?>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>
    <?php endif; ?>


    <p><a href="<?= url_to('projects.create') ?>" class="btn btn-primary">Crear Nuevo Proyecto</a></p>

    <?php if (empty($projects)): ?>
        <p class="no-projects">Aún no tienes proyectos creados.</p>
    <?php else: ?>
        <?php foreach ($projects as $project): ?>
            <div class="project-item">
                <h3><?= esc($project['name']) ?></h3>
                <p><strong>Estado:</strong> <?= esc($project['status']) ?></p>
                <p><?= esc($project['description']) ?></p>
                <p>
                </p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <p><a href="<?= url_to('/') ?>">Volver al Dashboard</a></p>

</div>
</body>
</html>