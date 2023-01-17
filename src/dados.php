<?php

session_start();
$dados = $_SESSION['dados'];

$timestamp = strtotime($dados->birthday); 
$data = date("d-m-Y", $timestamp);

$nome = $dados->name;
$email = $dados->email;
$id = $dados->id;
$img = $dados->picture->data->url;

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados do Usuario</title>
    <link href="/css/estilo.css" rel="stylesheet">
</head>
<body>

    <div class="container">

        <header>
			<nav>
				<div class="nav-container">
						<img id="logo" src="<?= $img ?>">
					<i class="fas fa-bars btn-menumobile"></i>
					<ul>
						<li><a href="sair.php">Sair</a></li>
					</ul>
				</div>
			</nav>
		</header>

        <main id="lastjobs-container" class="wrapper">

            <form action="/pagina-processa-dados-do-form" method="post">
                <div>
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" value="<?= $nome ?>" />
                </div>
                <div>
                    <label for="email">E-mail:</label>
                    <input type="email" id="mail" value="<?= $email ?>" />
                </div>

                <div>
                    <label for="data">Data de nascimento:</label>
                    <input type="text" id="data" value="<?= $data ?>" />
                </div>

                <div>
                    <label for="id">Id:</label>
                    <input type="number" id="id" value="<?= $id ?>" />
                </div>
            </form>
        </main>    
    </div>

    
    
</body>
</html>