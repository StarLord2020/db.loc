<?php
    ini_set("display_errors", 1);
	error_reporting(E_ALL);

    require_once('request.class.php');

    $requestClass = new Request();

    if( $requestClass->isPost() ) {

           $errors = $requestClass->getErrors();

            if (count($errors)==0){
                if($_POST['action'] == 'add')
            {

                require_once('models/city.class.php');

                $newsClass = new News();
                $status = 'error';
                $message="";
                    $result = $newsClass->insert(['name'=>trim($_POST['title']),
                        'publication_date'=>trim($_POST['date']),
                        'status'=>trim($_POST['status']),
                        'category'=>trim($_POST['category']),
                        'content'=>trim($_POST['content']),
                        'author'=>trim($_POST['author'])]);

                    $status = 'ok';

                echo json_encode(['status' =>$status,'message'=>$message]);
            }
                if($_POST['action'] == 'edit')
            {

              require_once('models/city.class.php');

              $newsClass = new News();

              $status = 'error';
              $message="";

                $result = $newsClass->update(['id'=>trim($_POST['id']),'name'=>trim($_POST['news'])]);
                $status="ok";

                    echo json_encode(['status' =>$status,'message'=>$message]);
              }
        }
        else{

           echo json_encode($errors);

        }
    }
?>