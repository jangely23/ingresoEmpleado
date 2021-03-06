<?php $pagina_principal= "list/persona.php" ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Empleado Ingresos</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/a464f5c565.js" crossorigin="anonymous"></script>
    </head>
<body onload="abrirPagina('list/persona.php', 'contenido','')">
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm p-3 mb-5 bg-body rounded">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Ingreso Empleado</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#" onclick="abrirPagina('list/persona.php','contenido','')">Personas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="abrirPagina('list/registro.php','contenido','')">Registros</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>
    <div class="container m-5 ">
        <div class="card shadow-sm p-3 mb-5 bg-body rounded" >
        <div class="card-body" id="contenido">         
        </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/libreria.js"></script>
   
</body>
</html>