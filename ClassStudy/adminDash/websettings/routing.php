<?php
    $pageArray = [];
    $pageDir = scandir('./pages/');//파일 디렉토리의 파일을 읽어 들인다.
    foreach($pageDir as $page){
        if($page!='.' && $page!='..'){
            array_push($pageArray,basename($page,'.php'));//파일의 이름으로 구성된 배열
        }
    }
    $reqURL = strtolower(parse_url( $_SERVER['REQUEST_URI'],PHP_URL_PATH));//URI영역을 읽어 들인다.
    if(isset($_SESSION['loggedUser'])){
        if($_SESSION['timeout']>time()){
            if($reqURL =="/" || $reqURL ==""){//URI가 슬래쉬거나 비어있으면
                $page = "home";//홈페이지를 페이지 변수에 넣는다.
            }else{
                $page = basename($reqURL);//다른 페이지의 경우에는 읽어 들인 URL에서 
            }
        }else{
            $page = "login";
        }
    }else{
        $page = "login";//홈페이지를 페이지 변수에 넣는다.
    }
    foreach($pageArray as $pageName){
        if($pageName == $page){//URI 페이지에서 읽어 들인 값과 "파일이름으로 구성된 배열"의 값이 일치하면
            $pageCompo = "./pages/$page.php";//$pageCompo에 파일 과 URL을 완성하고 index.php에 파일을 include하면 해당 페이지가 열린다.
            break;
        }
    }
    if(!isset($pageCompo)){
        $pageCompo = './pages/404.php';
    }
?>