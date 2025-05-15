<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - TaskFlow</title>
    <style>
        body { font-family: sans-serif; margin: 20px; line-height: 1.6;}
        .container { max-width: 800px; margin: 20px auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; background-color: #f9f9f9;}
        h1 { color: #333; border-bottom: 2px solid #007bff; padding-bottom: 10px; margin-bottom: 20px;}
        .nav { margin-bottom: 20px; }
        .nav a { margin-right: 15px; text-decoration: none; color: #007bff; font-weight: bold;}
        .nav a:hover { text-decoration: underline; }
    </style>
</head>
<body>
<div class="container">
    <h1>Bienvenido, <?= esc($user->username ?? 'Usuario') ?>!</h1>

    <nav class="nav">
        <a href="<?= url_to('projects.index') ?>">Mis Proyectos</a>
        <a href="<?= url_to('logout') ?>">Cerrar Sesión</a>
    </nav>

    <p>Este es tu panel principal de TaskFlow. Usa el menú de navegación para acceder a las diferentes secciones.</p>

</div>
</body>
</html>