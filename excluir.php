<?php
include 'header.php';

// Obter o ID do item a ser excluído
$id = intval($_GET['id']);

// Verificar se o ID é válido
if ($id > 0) {
    // Verificar se a exclusão foi confirmada
    if (isset($_GET['confirmar']) && $_GET['confirmar'] == 'sim') {
        // Apagar a imagem da pasta uploads
        $sql = "SELECT imagem FROM farmacia WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $imagem = $row['imagem'];
        if (!empty($imagem) && file_exists($imagem)) {
            unlink($imagem);
        }

        // Preparar e executar a consulta SQL para excluir o item
        $sql = "DELETE FROM farmacia WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            // echo "Item excluído com sucesso.";
            // Redirecionar para a lista de itens
            header('Location: lista.php');
            
        } else {
            echo "Erro ao excluir o item: " . $stmt->errorInfo()[2];
        }
    } else {
        // Pedir confirmação para excluir
        // echo "Tem certeza que deseja excluir o item ID $id? ";
        // echo "<a href='excluir.php?id=$id&confirmar=sim'>Sim</a> | ";
        // echo "<a href='lista.php'>Não</a>";
         // Exibir alerta de confirmação
         echo "<script>
         if (confirm('Tem certeza que deseja excluir o item ID $id?')) {
             window.location.href = 'excluir.php?id=$id&confirmar=sim';
         } else {
             window.location.href = 'lista.php';
         }
     </script>";

    }
} else {
    echo "ID inválido.";
}

// Fechar a conexão
$conn = null;
?>