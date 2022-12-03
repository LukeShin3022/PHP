<?php
    $pageArray = [];
    $pageDir = scandir('./pages');
    foreach($pageDir as $page){
        if($page!='.' && $page!='..'){
            array_push($pageArray,basename($page,'.php'));
        }
    }
    $reqURL = strtolower(parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH));
    if(isset($_SESSION['loggedUser'])){
        if($_SESSION['timeout']>time()){
            if($reqURL=="/" || $reqURL==""){
                $page = "home";          
            }else{
                $page = basename($reqURL);
            }
        }else{
            $page = "login";
        }
    }else{
        $page = "login";
    }
    foreach($pageArray as $pageName){
        if($pageName == $page){
            $pageCompo = "./pages/$page.php";
            break;
        }
    }
    if(!isset($pageCompo)){
        $pageCompo = './pages/404.php';
        $page = "not found";
    }
?>