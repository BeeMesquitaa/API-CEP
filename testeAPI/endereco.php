<?php
include_once ('./viacep.php');

if(isset($_POST['enviar'])){
    $cep = $_POST['cep'];

    $url = "https://viacep.com.br/ws/{$cep}/json/";

    $endereco = json_decode(file_get_contents($url));
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Buscar CEP</title>
</head>
<body>
    <form action="" method="post">
        <p>Digite o CEP para encontrar o endereço!</p>
        <input type="text" placeholder="Digite um cep..." name="cep">
        <input type="submit" name="enviar" value="Enviar">
    </form>
    <form >
        <input type="text" placeholder="rua" name="rua" value="<?php if(isset($_POST['enviar'])) echo $endereco->logradouro ?>">
        <input type="text" placeholder="bairro" name="bairro" value="<?php if(isset($_POST['enviar']))  echo $endereco->bairro ?>">
        <input type="text" placeholder="cidade" name="cidade" value="<?php if(isset($_POST['enviar']))  echo $endereco->localidade ?>">
        <input type="text" placeholder="estado" name="estado" value="<?php if(isset($_POST['enviar'])) echo $endereco->uf ?>">
    </form>
</body>
</html>