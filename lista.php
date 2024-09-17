<?php
include 'header.php';
session_start();

if (!isset($_SESSION['user_id'])) {
      header("Location: ./login.php");
}
include 'logado.php';
?>
<div class="container">
      <div class="row">
            <div class="col">
                  <h1 class="text-center text-md-left" style="color: #138496">Lista Geral</h1>
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
                  echo '<form class="form-inline mb-3" method="GET" action="">
                  <div class="input-group w-100">
                        <input type="text" class="form-control" name="search" value="' . htmlspecialchars($search) . '">
                        <div class="input-group-append">
                              <input type="submit" class="btn btn-primary" value="Buscar">
                              <a href="lista.php" class="btn btn-secondary ml-2">X</a>
                        </div>
                  </div>
                  </form>';
                  // Consulta SQL com busca e paginação
                  $query = "SELECT * FROM farmacia WHERE descricao LIKE :search LIMIT :limit OFFSET :offset";
                  $stmt = $conn->prepare($query);
                  $stmt->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
                  $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
                  $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
                  $stmt->execute();
                  ?>
                 
            </div>
      </div>
      <br/>
      <?php
      // Exibir os resultados em uma tabela
      echo "<div class='table-responsive'>";
      echo "<table class='table table-bordered'>";
      echo "<thead class='thead-dark'>";
      echo "<tr><th>ID</th><th>Descrição</th><th>Grupo</th><th>Preço Venda</th><th>Validade</th><th>Quantidade</th><th>Editar</th><th>Excluir</th><th>Detalhes</th></tr>";
      echo "</thead>";
      echo "<tbody>";

      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['descricao']) . "</td>";
            echo "<td>" . htmlspecialchars($row['grupo']) . "</td>";
            echo "<td style='text-align: center;'>" . "R$ " . htmlspecialchars(number_format($row['preco'], 2, ',', '.')). "</td>";

            $validade = DateTime::createFromFormat('Y-m-d', $row['validade']);
            echo "<td style='text-align: center;'>" . htmlspecialchars($validade->format('d-m-Y')) . "</td>";
            echo "<td style='text-align: center;'>" . htmlspecialchars($row['estoque']) . "</td>";

            echo "<td><a class='btn btn-warning btn-sm' href='editar.php?id=" . htmlspecialchars($row['id']) . "'>Editar</a></td>";
            echo "<td><a class='btn btn-danger btn-sm' href='excluir.php?id=" . htmlspecialchars($row['id']) . "'>Excluir</a></td>";
            echo "<td><a class='btn btn-info btn-sm' href='detalhes.php?id=" . htmlspecialchars($row['id']) . "'>Detalhes</a></td>";
            echo "</tr>";
      }

      echo "</tbody>";
      echo "</table>";
      echo "</div>";
     
      // Links de paginação
      $total_query = "SELECT COUNT(*) FROM farmacia WHERE descricao LIKE :search";
      $total_stmt = $conn->prepare($total_query);
      $total_stmt->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
      $total_stmt->execute();
      $total_rows = $total_stmt->fetchColumn();
      $total_pages = ceil($total_rows / $limit);

      echo '<nav aria-label="Page navigation">';
      echo '<ul class="pagination justify-content-center">';
      for ($i = 1; $i <= $total_pages; $i++) {
            echo '<li class="page-item"><a class="page-link" href="?search=' . urlencode($search) . '&page=' . $i . '">' . $i . '</a></li>';
      }
      echo '</ul>';
      echo '</nav>';
      ?>
</div>
<?php
include 'footer.php';
?>