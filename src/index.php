<?php

require 'fb.php';

$permissions = ['email', 'user_likes', 'user_birthday']; // Permissões Opcionais
$loginUrl = $helper->getLoginUrl('http://localhost:8000/callback.php', $permissions); //Url de retorno onde iremos ter a validação do login. O domínio deverá ser configurado no seu app.

echo '<a href="' . $loginUrl . '">Logar no seu Facebook!</a>';