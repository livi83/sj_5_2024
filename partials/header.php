<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moja stránka</title>
    <?php
      $pages = glob('*.php');
      foreach($pages as $page_path){
        $page_name = basename($page_path,'.php');
        echo('<link rel="stylesheet" href="css/style.css">');
        echo('<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">');
        switch($page_name){
          case 'index':
            echo('<link rel="stylesheet" href="css/slider.css">');
            break;
          case 'kontakt':
            echo('<link rel="stylesheet" href="css/banner.css">');
            echo('<link rel="stylesheet" href="css/form.css">');
            break;
          case 'portfolio':
            echo('<link rel="stylesheet" href="css/portfolio.css">');
            break;
          case 'qna':
            echo('<link rel="stylesheet" href="css/accordion.css">');
            break;
        }
      }
    ?>
</head>
<body>
    <header class="container main-header">
        <div>
          <a href="index.php">
            <img src="img/logo.png" height="40">
          </a>
        </div>
      <nav class="main-nav">
        <ul class="main-menu" id="main-menu">
        <?php
           $pages = array('Domov'=>'index.php',
           'Portfólio'=>'portfolio.php',
           'Q&A'=>'qna.php',
           'Kontakt'=>'kontakt.php'  
           );

           foreach($pages as $page_name => $page_url){
            echo('<li><a href = "'.$page_url.'">'.$page_name.'</a></li>');
          }
        ?>
        </ul>
        <a class="hamburger" id="hamburger">
            <i class="fa fa-bars"></i>
        </a>
      </nav>
    </header>
