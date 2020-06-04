<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>K-telecom-test</title>
    <style>
        .Site { display: flex; min-height: 100vh; flex-direction: column; }
        .Site-content { flex: 1; }
    </style>
    <link rel="stylesheet" href="/template/css/bootstrap.css">
</head>
<body class="Site bg-secondary">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark container">
        <a href="/" class="navbar-brand">K-telecom-test</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

        </div>
        <?php if(isset($_SESSION['user'])):?>
            <div class="form-inline"><a href="/logout" class="text-white">Выход &#128275;</a></div>
        <?php endif; ?>
    </nav>
    <main class="Site-content container bg-white">



