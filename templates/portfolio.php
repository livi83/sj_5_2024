<?php
include('partials/header.php');
?> 
        <main>
             <?php include('partials/banner.php');?>
              <section class="container">
                <?php
                    //generate_portfolio(2,4);
                    $portfolio_object = new Portfolio();
                    $portfolio = $portfolio_object->select();
                    
                    for ($i=0;$i<count($portfolio);$i++){
                      $temp_i = $i+1;
                      if($temp_i%4==1){
                          echo '<div class="row">';
                          echo '<div class="col-25 portfolio text-white text-center" style = "background-image: url(\''.$portfolio[$i]->image.'\');"'.'>';
                          echo '<a href="">'.$portfolio[$i]->name.'</a>';
                          echo '</div>';

                      }else{
                        echo '<div class="col-25 portfolio text-white textcenter" style = "background-image: url(\''.$portfolio[$i]->image.'\');"'.'>';
                        //$result .= '<a href = "">'.$portfolio[$i]->name.'</a>';
                        echo '<a href="">'.$portfolio[$i]->name.'</a>';
                        echo '</div>';
                        echo'</div>';
                      }
                  }
                ?>
               
            </section>   

        </main>
<?php
  include_once('partials/footer.php')
?> 