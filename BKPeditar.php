<?php

include 'header.php';
session_start();

if (!isset($_SESSION['user_id'])) {
      header("Location: ./login.php");
}
$id = $_GET['id'];
?>
           <div class="container">
      <div class="row">
            <div class="col">
            <h1>Lista Geral</h1>
            </br>
            </br>
            </div>
            <div class="col">
            <?php  echo $_SESSION['user_name'] ;     ?>
            </div>
            <div class="col">
            <a href="logout.php">Sair</a>
            </div>
      </div>
<h1>Editar</h1> <p><?php echo $id ?></p>

<?php
// Obter o ID do item a ser editado
echo '<a class="btn btn-primary" href="lista.php">Voltar</a>';

// consulta o banco de dados e criar o formulário de edição com os dados do id
$query = "SELECT * FROM farmacia WHERE id = :id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<form class="form-group" method="post" action="editar.php">
      <input type="hidden" name="id" value="<?php echo $id ?>">
      <label for="descricao">Descrição:</label>
      <input type="text" id="descricao" name="descricao" value="<?php echo $row['descricao'] ?>" ><br><br>
      <label for="grupo">Grupo:</label>
      <select id="grupo" name="grupo" required>
            <option value="GENÉRICO" <?php if ($row['grupo'] == 'CIMED') echo 'selected' ?>>CIMED</option>
            <option value="OUTROS" <?php if ($row['grupo'] == 'OUTROS') echo 'selected' ?>>OUTROS</option>
      </select><br><br>
      <label for="preco">Preço:</label>
      <input type="number" id="preco" name="preco" value="<?php echo $row['preco'] ?>" ><br><br>

      <label for="validade">Validade:</label>
      <input type="date" id="validade" name="validade" value="<?php echo $row['validade'] ?>" ><br><br>

      <label for="estoque">Estoque:</label>
      <input type="number" id="estoque" name="estoque" value="<?php echo $row['estoque'] ?>" ><br><br>
      <input type="submit" value="Salvar">
</form>
<?php
// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Obter os dados do formulário
      $id = intval($_POST['id']);
      $descricao = $_POST['descricao'];
      $grupo = $_POST['grupo'];
      $preco = floatval($_POST['preco']);
      $validade = $_POST['validade'];
      $estoque = intval($_POST['estoque']);

      // Preparar e executar a consulta SQL para atualizar o item
      $sql = "UPDATE farmacia SET descricao = :descricao, grupo = :grupo, preco = :preco, validade = :validade, estoque = :estoque WHERE id = :id";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $stmt->bindParam(':descricao', $descricao);
      $stmt->bindParam(':grupo', $grupo);
      $stmt->bindParam(':preco', $preco);
      $stmt->bindParam(':validade', $validade);
      $stmt->bindParam(':estoque', $estoque);

      if ($stmt->execute()) {

            echo '<pre>';
            var_dump($stmt);
            echo '</pre>';
            exit;

            // Exibe um alert de atualizado com sucesso e após clicar em ok redireciona para a lista.php
            echo "<script>alert('Item atualizado com sucesso!');</script>";
            echo "<script>window.location = 'lista.php';</script>";
      } else {
            echo "Erro ao atualizar o item: " . $stmt->errorInfo()[2];
      }
}
?>
</div>
</body>
</html>

