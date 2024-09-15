<?php
if (!isset($_SESSION)){
      session_start();
}
?>
<div class="container" style="display: flex; justify-content: space-between;">
      <div class="col">

         <button class="btn btn-info">
               <i class="fas fa-user"></i> <?php echo $_SESSION['user_name']; ?>
         </button>
         <a class="btn btn-info" href="lista.php">Home</a>
      </div>
      <div class="col">
            <a class="btn btn-info" href="logout.php">
                  <i class="fas fa-sign-out-alt"></i> Sair
            </a>
      </div>
</div>
