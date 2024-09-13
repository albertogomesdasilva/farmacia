<?php
include 'header.php';

// Verificar se o usuário está logado
session_start();

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Conectar ao banco de dados usando PDO
      
 // Obter os dados do formulário
 $descricao = htmlspecialchars($_POST['descricao']);
 $preco = floatval($_POST['preco']);
 $estoque = intval($_POST['estoque']);
 $grupo = htmlspecialchars($_POST['grupo']);
 $validade = htmlspecialchars($_POST['validade']);
 $arquivo = $_FILES['arquivo'];


 // Processar o upload do arquivo
 if ($arquivo['error'] == UPLOAD_ERR_OK) {
     $uploadDir = 'uploads/';
     
     // Verificar se o diretório existe, se não, criar
     if (!is_dir($uploadDir)) {
         mkdir($uploadDir, 0777, true);
     }

     $uploadFile = $uploadDir . basename($arquivo['name']);

     if (move_uploaded_file($arquivo['tmp_name'], $uploadFile)) {
         echo "Arquivo enviado com sucesso.";
     } else {
         echo "Erro ao enviar o arquivo.";
     }
 } else {
     echo "Erro no upload do arquivo: " . $arquivo['error'];
 }

 // Preparar e executar a consulta SQL para inserir o novo item
 $sql = "INSERT INTO farmacia (descricao, preco, estoque, grupo, validade, arquivo) VALUES (:descricao, :preco, :estoque, :grupo, :validade, :arquivo)";
 $stmt = $conn->prepare($sql);
 $stmt->bindParam(':descricao', $descricao);
 $stmt->bindParam(':preco', $preco);
 $stmt->bindParam(':estoque', $estoque);
 $stmt->bindParam(':grupo', $grupo);
 $stmt->bindParam(':validade', $validade);
 $stmt->bindParam(':arquivo', $uploadFile);

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
</head>
<body>
 <div class="container">
     <h1>Cadastro de Item</h1>
     <form class="form-group" method="post" action="cadastrar.php" enctype="multipart/form-data">
         <label for="descricao">Descrição:</label>
         <input type="text" id="descricao" name="descricao" required><br><br>
         <label for="grupo">Grupo:</label>
         <select id="grupo" name="grupo" required>
             <option value="GENÉRICO">GENÉRICO</option>
             <option value="CIMED">CIMED</option>
             <option value="OUTROS">OUTROS</option>
         </select><br><br>
         <label for="preco">Preço:</label>
         <input type="text" id="preco" name="preco" required pattern="^\d+(\.\d{1,2})?$" title="Por favor, insira um valor válido. Ex: 1234.56"><br><br>

         <script>
         document.getElementById('preco').addEventListener('input', function (e) {
             var value = e.target.value;
             value = value.replace(/\D/g, ''); // Remove caracteres não numéricos
             value = (value / 100).toFixed(2); // Formata como decimal
             e.target.value = value;
         });
         </script>

         <label for="validade">Validade:</label>
         <input type="date" id="validade" name="validade" required><br><br>
         <label for="estoque">Estoque:</label>
         <input type="number" id="estoque" name="estoque" required><br><br>
         <label for="arquivo">Arquivo:</label>
         <input type="file" id="arquivo" name="arquivo" accept=".pdf, .png, .jpg, .jpeg"><br><br>

         <input class="btn btn-success" type="submit" value="Cadastrar">
     </form>
 </div>
</body>
</html>