<?php
  
  // ## App page controller ##

  require_once 'view/view.php';
  
  require_once 'model/model.php';

  class AppController {
    
    public function __construct() {

      $this->act = (isset($_GET['act']) && $_GET['act'] != '') ? $_GET['act'] : '';

      $this->appView = new AppView();

      $this->appModel = new AppModel();

      switch ($this->act) {
        case 'create.html':
          $this->content = $this->createComment();
          break;
        
        default:
          case 'index':
            $this->content = $this->index();
          break;
      }

      print $page = $this->content;

    }

    // ## Index Page ###
    function index() {

      $data = $this->appModel->read();

      $content = $this->appView->indexPage( $data );

      return $this->appView->appLayout( $content);

    }

    // ## Create Commments Process ##
    function createComment() {

      $data = array (
        "name" => $_POST['name'],
        "email" => $_POST['email'],
        "message" => $_POST['message']
      );

      $result = $this->appModel->create( $data );  

      if ( $result != 'true' ) {

        die('Error: Cannot Insert data to database!');

      } else {

        header("Location: index.php");

      }

    }
    
  }

  $page = new AppController();

?>