<?php

include 'header.php';

?>
<div class="container">

<main>
      <h1>HOME</h1>
<?php

      session_start();


      $query = "SELECT * FROM farmacia";
      $stmt = $conn->prepare($query);
      $stmt->execute();

      echo "<table border='1'>";
      echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Nivel</th></tr>";

      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['descricao']) . "</td>";
            echo "<td>" . htmlspecialchars($row['grupo']) . "</td>";
            echo "<td>" . htmlspecialchars($row['preco']) . "</td>";
            echo "</tr>";
      }

      echo "</table>";
?>
      <a href="login.php">Login</a>
      <a href="register.php">Register</a>
      
</main>
</div>
<?php

include 'footer.php';