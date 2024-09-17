<?php
include 'header.php';
include 'logado.php';

// Verificar se o usuário está logado
if (!isset($_SESSION)){
    session_start();
}

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar ao banco de dados usando PDO
    
 // Obter os dados do formulário
 $descricao = strtoupper(htmlspecialchars($_POST['descricao']));
 $preco = floatval($_POST['preco']);
 $estoque = intval($_POST['estoque']);
 $grupo = htmlspecialchars($_POST['grupo']);
 $validade = htmlspecialchars($_POST['validade']);
 $arquivo = $_FILES['arquivo'];
 $date = date('Y-m-d H-i-s');




 // Processar o upload do arquivo
 if ($arquivo['error'] == UPLOAD_ERR_OK) {
    
     $uploadDir = 'uploads/';
     
     // Verificar se o diretório existe, se não, criar
     if (!is_dir($uploadDir)) {
       mkdir($uploadDir, 0777, true);
     }
    $descricaoSemEspacos = str_replace(' ', '', $descricao);
    $uploadFile = $uploadDir . basename($descricaoSemEspacos . $arquivo['name']);
    //  $uploadFile = $uploadDir . basename($descricao.$arquivo['name']);


     if (move_uploaded_file($arquivo['tmp_name'], $uploadFile)) {
       echo "Arquivo enviado com sucesso.";
     } else {
       echo "Erro ao enviar o arquivo.";
     }
 } else {
     echo "Erro no upload do arquivo: " . $arquivo['error'];
 }

 // Preparar e executar a consulta SQL para inserir o novo item
 $sql = "INSERT INTO farmacia (descricao, preco, estoque, grupo, validade, imagem) VALUES (:descricao, :preco, :estoque, :grupo, :validade, :imagem)";
 $stmt = $conn->prepare($sql);
 $stmt->bindParam(':descricao', $descricao);
 $stmt->bindParam(':preco', $preco);
 $stmt->bindParam(':estoque', $estoque);
 $stmt->bindParam(':grupo', $grupo);
 $stmt->bindParam(':validade', $validade);
 $stmt->bindParam(':imagem', $uploadFile);

 if ($stmt->execute()) {
     echo "Item cadastrado com sucesso.";
     header("Location: lista.php");
     exit();
 } else {
     echo "Erro ao cadastrar o item: " . $stmt->errorInfo()[2];
 }

 // Fechar a conexão
 $conn = null;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
 <meta charset="UTF-8">
 <title>Cadastro de Item</title>
 <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
 <div class="container mt-5">
     <h1>Cadastro de Item</h1>
     <form method="post" action="cadastrar.php" enctype="multipart/form-data">
       <div class="form-group">
         <label for="descricao">Descrição:</label>
         <input type="text" class="form-control" id="descricao" name="descricao" required>
       </div>
       <div class="form-group">
         <label for="grupo">Grupo:</label>
         <select class="form-control" id="grupo" name="grupo" required>
             <option value="GENÉRICO">GENÉRICO</option>
             <option value="CIMED">ÉTICO</option>
             <option value="CIMED">HOSPITALAR</option>
             <option value="CIMED">NATURAL</option>
             <option value="CIMED">HB</option>
             <option value="CIMED">VITAMINA</option>
             <option value="CIMED">GERAL</option>
             <option value="OUTROS">OUTROS</option>
         </select>
       </div>
       <div class="form-group">
         <label for="preco">Preço:</label>
         <input type="text" class="form-control" id="preco" name="preco" required pattern="^\d+(\.\d{1,2})?$" title="Por favor, insira um valor válido. Ex: 1234.56">
       </div>
       <div class="form-group">
         <label for="validade">Validade:</label>
         <input type="date" class="form-control" id="validade" name="validade" required>
       </div>
       <div class="form-group">
         <label for="estoque">Estoque:</label>
         <input type="number" class="form-control" id="estoque" name="estoque" required>
       </div>
       <div class="form-group">
         <label for="arquivo">Arquivo:</label>
         <input type="file" class="form-control-file" id="arquivo" name="arquivo" accept=".pdf, .png, .jpg, .jpeg">
       </div>
       <button type="submit" class="btn btn-success">Cadastrar</button>
     </form>
 </div>
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 <script>
 document.getElementById('preco').addEventListener('input', function (e) {
     var value = e.target.value;
     value = value.replace(/\D/g, ''); // Remove caracteres não numéricos
     value = (value / 100).toFixed(2); // Formata como decimal
     e.target.value = value;
 });
 </script>
</body>
</html>