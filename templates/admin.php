<?php
include_once('partials/header.php');
if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true){
    header('Location: 404.php');
}
?> 
    <main>
      <section class="container">
        <h1>Admin rozhranie</h1>
        <div class="row">
            <div class="col-100">
                <?php
                    //print_r($_SESSION);
                    if($_SESSION['is_admin'] == 1){
                        include('partials/admin-kontakt.php');
                    }
                ?>
            </div>
        </div>
      </section>
    </main>
    
<?php
    include_once('partials/footer.php')
?> 