<?php
include 'header.php';


// Obter o ID do item a ser excluído
$id = intval($_GET['id']);

// Verificar se o ID é válido
if ($id > 0) {
    // Verificar se a exclusão foi confirmada
    if (isset($_GET['confirmar']) && $_GET['confirmar'] == 'sim') {
        // Preparar e executar a consulta SQL para excluir o item
        // Apagar a imagem da pasta uploads
        $sql = "SELECT imagem FROM farmacia WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $imagem = $row['imagem'];
        if (!empty($imagem)) {
            unlink($imagem);
        }



        if ($stmt->execute()) {
            // Exibe um alert de excluido com sucesso e redireciona para a lista.php
            // echo "<script>alert('Item excluído com sucesso!');</script>";
            echo "<script>window.location = 'lista.php';</script>";


        } else {
            echo "Erro ao excluir o item: " . $stmt->errorInfo()[2];
        }
    } else {
        // Pedir confirmação para excluir com um alert com sim ou não
            echo "<script>
            if (confirm('Tem certeza que deseja excluir este item?')) {
                window.location = 'excluir.php?id=$id&confirmar=sim';
            } else {
                window.location = 'lista.php';
            }
            </script>";

          
            

    }
} else {
    echo "ID inválido.";
}

// Fechar a conexão
$conn = null;
?>