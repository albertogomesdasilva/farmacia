<div class="container" style="display: flex; justify-content: space-between; margin-left: 30px;">
      <div class="col">

         <button class="btn btn-info">
               <i class="fas fa-user"></i> <?php echo $_SESSION['user_name']; ?>
         </button>
      </div>
      <div class="col">
            <a class="btn btn-info" href="logout.php">
                  <i class="fas fa-sign-out-alt"></i> Sair
            </a>
      </div>
</div>
