<?php
session_start();

// Destruir todas as variáveis de sessão
$_SESSION = array();

// Se deseja destruir a sessão completamente, também deve apagar o cookie de sessão.
if (ini_get("session.use_cookies")) {
      $params = session_get_cookie_params();
      setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
      );
}

// Finalmente, destruir a sessão.
session_destroy();

// Redirecionar para a página de login ou página inicial
header("Location: login.php");
exit;
?>