<?php
include 'header.php';
session_start();

if (!isset($_SESSION['user_id'])) {
      header("Location: ./login.php");
}
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


      <div class="row">
            <div class="col">
                  
                  <?php

                  // Obter o termo de busca e a página atual dos parâmetros da URL
                  $search = isset($_GET['search']) ? $_GET['search'] : '';
                  $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                  $limit = 20;
                  $offset = ($page - 1) * $limit;
                  
                  // Formulário de busca
                  echo '<form method="GET" action="">
                  <input type="text" name="search" value="' . htmlspecialchars($search) . '">
                  <input type="submit" value="Buscar"> -
                  <a href="lista.php"> X </a>
                  </form>';
                  
                  
                  echo '</br>';
                  echo '</br>';
                  
                  // Consulta SQL com busca e paginação
                  $query = "SELECT * FROM farmacia WHERE descricao LIKE :search LIMIT :limit OFFSET :offset";
                  $stmt = $conn->prepare($query);
                  $stmt->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
                  $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
                  $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
                  $stmt->execute();
                  ?>
                        <a class="btn btn-primary" href="cadastrar.php">Cadastrar</a>
                        </div>
                        </div>
                        <br/>
                        <?php
                  // Exibir os resultados em uma tabela
                  echo "<table border='1'>";
                  echo "<tr><th>ID</th><th>Descrição</th><th>Grupo</th><th>Preço Venda</th><th>Validade</th><th>Quantidade</th><th>Editar</th><th>Excluir</th><th>Detalhes</th></tr>";

                  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['descricao']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['grupo']) . "</td>";
                        echo "<td  style='text-align: center;'>" . "R$ " . htmlspecialchars(number_format($row['preco'], 2, ',', '.')). "</td>";

                        $validade = DateTime::createFromFormat('Y-m-d', $row['validade']);
                        echo "<td style='text-align: center;'>" . htmlspecialchars($validade->format('d-m-Y')) . "</td>";
                        echo "<td style='text-align: center;'>" . htmlspecialchars($row['estoque']) . "</td>";

                        echo "<td><a href='editar.php?id=" . htmlspecialchars($row['id']) . "'>Editar</a></td>";
                        echo "<td><a href='excluir.php?id=" . htmlspecialchars($row['id']) . "'>Excluir</a></td>";
                        echo "<td><a href='detalhes.php?id=" . htmlspecialchars($row['id']) . "'>Detalhes</a></td>";
                        echo "</tr>";
                  }

                  echo "</table>";
                  echo "</br>";
                 
                
                  // Links de paginação
                  $total_query = "SELECT COUNT(*) FROM farmacia WHERE descricao LIKE :search";
                  $total_stmt = $conn->prepare($total_query);
                  $total_stmt->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
                  $total_stmt->execute();
                  $total_rows = $total_stmt->fetchColumn();
                  $total_pages = ceil($total_rows / $limit);

                  for ($i = 1; $i <= $total_pages; $i++) {
                        echo '<a href="?search=' . urlencode($search) . '&page=' . $i . '">' . $i . '</a> ';
                  }
            ?>
           
                  
            </div>
</div>
<?php

include 'footer.php';
?>