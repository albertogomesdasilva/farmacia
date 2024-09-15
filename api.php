<?php
// Desabilitar a verificação de certificado SSL (apenas para desenvolvimento)
$contextOptions = [
    "ssl" => [
        "verify_peer" => false,
        "verify_peer_name" => false,
    ],
];
$context = stream_context_create($contextOptions);

// Obter parâmetros de consulta
$search = isset($_GET['search']) ? $_GET['search'] : '';
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$itemsPerPage = 10;

// Obter dados da API
$json = file_get_contents('http://177.153.58.160/apifarmacia/index.php', false, $context);

// Verificar se a resposta da API foi obtida com sucesso
if ($json === false) {
    die("Erro ao obter dados da API.");
}

// Remover a mensagem adicional antes do JSON
$jsonStart = strpos($json, '{');
if ($jsonStart !== false) {
    $json = substr($json, $jsonStart);
}

// Decodificar JSON
$produtos = json_decode($json, true);

// Verificar se a decodificação JSON foi bem-sucedida
if ($produtos === null) {
    echo "Erro ao decodificar JSON: " . json_last_error_msg();
    die();
}

// Filtrar resultados pela descrição
if (!empty($search)) {
    $produtos['data'] = array_filter($produtos['data'], function($produto) use ($search) {
        return stripos($produto['descricao'], $search) !== false;
    });
}

// Paginação
$totalItems = count($produtos['data']);
$totalPages = ceil($totalItems / $itemsPerPage);
$offset = ($page - 1) * $itemsPerPage;
$produtos['data'] = array_slice($produtos['data'], $offset, $itemsPerPage);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Produtos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Lista de Produtos</h1>
        <form method="get" action="api.php">
            <div class="form-group">
                <label for="search">Pesquisar por Descrição:</label>
                <input type="text" id="search" name="search" class="form-control" value="<?php echo htmlspecialchars($search); ?>">
            </div>
            <button type="submit" class="btn btn-primary">Pesquisar</button>
        </form>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descrição</th>
                    <th>Grupo</th>
                    <th>Preço</th>
                    <th>Estoque</th>
                    <th>Validade</th>
                    <th>Imagem</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Verificar se $produtos['data'] é um array antes de iterar
                if (is_array($produtos['data'])) {
                    foreach ($produtos['data'] as $produto) {
                        echo "<tr>";
                        echo "<td>{$produto['id']}</td>";
                        echo "<td>{$produto['descricao']}</td>";
                        echo "<td>{$produto['grupo']}</td>";
                        echo "<td>{$produto['preco']}</td>";
                        echo "<td>{$produto['estoque']}</td>";
                        $validade = DateTime::createFromFormat('Y-m-d', $produto['validade']);
                        echo "<td>" . ($validade ? $validade->format('d/m/Y') : 'Data inválida') . "</td>";
                        echo "<td>{$produto['imagem']}</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>Nenhum usuário encontrado.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <nav>
            <ul class="pagination">
                <?php
                for ($i = 1; $i <= $totalPages; $i++) {
                    $active = ($i == $page) ? 'active' : '';
                    echo "<li class='page-item $active'><a class='page-link' href='?search=$search&page=$i'>$i</a></li>";
                }
                ?>
            </ul>
        </nav>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>