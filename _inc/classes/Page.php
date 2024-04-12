<?php

    class Page{

        private $page_name;

        public function __construct($page_name)
        {
            $this->page_name = $page_name;
        }

        function add_stylesheet() {
            echo '<link rel="stylesheet" href="../assets/css/style.css">';
            echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';
        
            //$page_name = basename($_SERVER["SCRIPT_NAME"], '.php');
            
            switch($this->page_name){
                case 'home':
                    echo '<link rel="stylesheet" href="../assets/css/slider.css">';
                    break;
                case 'kontakt':
                    echo '<link rel="stylesheet" href="../assets/css/banner.css">';
                    echo '<link rel="stylesheet" href="../assets/css/form.css">';
                    break;
                case 'portfolio':
                    echo '<link rel="stylesheet" href="../assets/css/portfolio.css">';
                    echo '<link rel="stylesheet" href="../assets/css/banner.css">';
                    break;
                case 'qna':
                    echo '<link rel="stylesheet" href="../assets/css/accordion.css">';
                    echo '<link rel="stylesheet" href="../assets/css/banner.css">';
                    break;
                case 'thankyou':
                    echo '<link rel="stylesheet" href="../assets/css/banner.css">';
                    break;
            }
        }

        function add_scripts(){
            echo('<script src="../assets/js/menu.js"></script>');
            //$page_name = basename($_SERVER["SCRIPT_NAME"],'.php');
            switch($this->page_name){
            case 'home':
                echo('<script src="../assets/js/slider.js"></script>');
                break;
            case 'qna':
                echo('<script src="../assets/js/accordion.js"></script>');
                break;  
            }
            
        }
    }

?>