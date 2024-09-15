<?php
include 'header.php';

// Conectar ao banco de dados usando PDO
$dsn = 'mysql:host=localhost;dbname=farmacia';
$username = 'root';
$password = '';

try {
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Conexão falhou: " . $e->getMessage());
}

// Obter o ID do item a ser editado
$id = intval($_GET['id']);

// Verificar se o ID é válido
if ($id > 0) {
    // Buscar os dados do item a ser editado
    $query = "SELECT * FROM farmacia WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verificar se o item foi encontrado
    if ($row) {
        ?>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1>Editar</h1>
                    <a class="btn btn-primary" href="lista.php">Voltar</a>
                </div>
            </div>

            <form class="form-group" method="post" action="editar.php" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <label for="descricao">Descrição:</label>
                <input class="form-control" type="text" id="descricao" name="descricao" value="<?php echo htmlspecialchars($row['descricao']); ?>" ><br><br>
                <label for="grupo">Grupo:</label>
                <select id="grupo" name="grupo" required>
                    <option value="CIMED" <?php if ($row['grupo'] == 'CIMED') echo 'selected'; ?>>CIMED</option>
                    <option value="OUTROS" <?php if ($row['grupo'] == 'OUTROS') echo 'selected'; ?>>OUTROS</option>
                </select><br><br>

                <label for="preco">Preço:</label>
                <input type="text" id="preco" name="preco" value="<?php echo htmlspecialchars($row['preco']); ?>" required pattern="^\d+(\.\d{1,2})?$" title="Por favor, insira um valor válido. Ex: 1234.56"><br><br>
                <script>
                document.getElementById('preco').addEventListener('input', function (e) {
                    var value = e.target.value;
                    value = value.replace(/\D/g, ''); // Remove caracteres não numéricos
                    value = (value / 100).toFixed(2); // Formata como decimal
                    e.target.value = value;
                });
                </script>

                <label for="validade">Validade:</label>
                <input type="date" id="validade" name="validade" value="<?php echo htmlspecialchars($row['validade']); ?>" ><br><br>
                <label for="estoque">Estoque:</label>
                <input type="number" id="estoque" name="estoque" value="<?php echo htmlspecialchars($row['estoque']); ?>" ><br><br>
                <label for="imagem">Alterar Imagem:</label>
                <input type="file" id="imagem" name="imagem" accept=".pdf, .png, .jpg, .jpeg"><br><br>
                <input type="submit" value="Salvar">
                
                <?php 
                // Exibir a imagem do item
                if (!empty($row['imagem'])) {
                    echo "<p><img src='" . htmlspecialchars($row['imagem']) . "' alt='" . htmlspecialchars($row['descricao']) . "' style='width: 200px; height: 200px;'></p>";
                } else {
                    echo "<p>Imagem não disponível.</p>";
                }
                ?>
            </form>
        </div>
        <?php
    } else {
        echo "Item não encontrado.";
    }
} else {
    echo "ID inválido.";
}

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter os dados do formulário
    $id = intval($_POST['id']);
    $descricao = $_POST['descricao'];
    $grupo = $_POST['grupo'];
    $preco = floatval($_POST['preco']);
    $validade = $_POST['validade'];
    $estoque = intval($_POST['estoque']);
    $imagem = $_FILES['imagem'];

    // Processar o upload do arquivo
    if ($imagem['error'] == UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        
        // Verificar se o diretório existe, se não, criar
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $descricaoSemEspacos = str_replace(' ', '', $descricao);
        $uploadFile = $uploadDir . basename($descricaoSemEspacos . $imagem['name']);

        if (move_uploaded_file($imagem['tmp_name'], $uploadFile)) {
            echo "Arquivo enviado com sucesso.";

            // Apagar a imagem antiga, se existir
            if (!empty($row['imagem']) && file_exists($row['imagem'])) {
                unlink($row['imagem']);
            }

            // Atualizar o caminho da imagem no banco de dados
            $sql = "UPDATE farmacia SET descricao = :descricao, grupo = :grupo, preco = :preco, validade = :validade, estoque = :estoque, imagem = :imagem WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':grupo', $grupo);
            $stmt->bindParam(':preco', $preco);
            $stmt->bindParam(':validade', $validade);
            $stmt->bindParam(':estoque', $estoque);
            $stmt->bindParam(':imagem', $uploadFile);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                echo "Item atualizado com sucesso.";
                header("Location: lista.php");
                exit();
            } else {
                echo "Erro ao atualizar o item: " . $stmt->errorInfo()[2];
            }
        } else {
            echo "Erro ao enviar o arquivo.";
        }
    } else {
        // Atualizar o item sem alterar a imagem
        $sql = "UPDATE farmacia SET descricao = :descricao, grupo = :grupo, preco = :preco, validade = :validade, estoque = :estoque WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':grupo', $grupo);
        $stmt->bindParam(':preco', $preco);
        $stmt->bindParam(':validade', $validade);
        $stmt->bindParam(':estoque', $estoque);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "Item atualizado com sucesso.";
            header("Location: lista.php");
            exit();
        } else {
            echo "Erro ao atualizar o item: " . $stmt->errorInfo()[2];
        }
    }
}

// Fechar a conexão
$conn = null;
?>