<?php
if (!isset($_SESSION)){
      session_start();
}?>
<div style="margin-top: 10px">
      <div class="container" style="display: flex; justify-content: space-between; ">
            <div class="col" >

            <button class="btn btn-info">
                  <i class="fas fa-user"></i> <?php echo $_SESSION['user_name']; ?>
            </button>
            <a class="btn btn-info" href="lista.php">Home</a>
            <a class="btn btn-info" href="cadastrar.php">Cadastrar</a>
            </div>
            <div class="col">
                  <a class="btn btn-info" href="logout.php" style="background-color: #ff4d4d;">
                        <i class="fas fa-sign-out-alt"></i> Sair
                  </a>
            </div>
            
      </div>
      <div class="progress-bar bg-dark" style="width: 100%; height: 30px; margin-top: 40px; color: #fff; font-size: 15px; font-weight: bold;">
                  <script>
                        function updateTime() {
                              var now = new Date();
                              var formattedTime = now.toLocaleString();
                              document.getElementById('clock').innerText = formattedTime;
                        }
                        setInterval(updateTime, 1000);
                        window.onload = updateTime;
                  </script>
                  <p style="text-align: right; margin-top: 15px; margin-right: 250px; "> <span id="clock"></span> </p>
      </div>
      
</div>