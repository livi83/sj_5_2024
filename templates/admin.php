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
                <h2>Kontakty</h2>
                <?php
                    $contact_object = new Contact();
                    $contacts = $contact_object->select();

                    if(isset($_POST['delete_contact'])){
                        $contact_id = $_POST['delete_contact'];
                        $contact_object->delete($contact_id);
                        header('Location: admin.php');
                        die();
                    }

                    echo '<table class="admin-table">';
                    echo '<tr><th>Name</th>
                              <th>Email</th>
                              <th>Message</th>
                              <th>Acceptance</th>
                              <th>Delete</th>
                              <th>Edit</th>
                          </tr>';
                    foreach($contacts as $c){
                        echo '<tr>';
                        echo '<td>'.$c->name;'</td>';
                        echo '<td>'.$c->email;'</td>';
                        echo '<td>'.$c->message;'</td>';
                        echo '<td>'.$c->acceptance;'</td>';
                        echo '<td>
                                <form action="" method="POST">
                                    <button type="submit" name="delete_contact" value="'.$c->id.'"'.'>Vymazať</button>
                                </form>
                              </td>';
                        echo '</tr>';
                    }
                    
                    echo '</table>';
                ?>
            </div>
        </div>
      </section>
    </main>
    
<?php
    include_once('partials/footer.php')
?> 