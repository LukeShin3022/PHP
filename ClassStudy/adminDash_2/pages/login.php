<?php 
  
    echo " PHP_SELF: ".$_SERVER["PHP_SELF"]; 
    ?>
<form method="POST" action="<?php echo $reqURL; //$_SESSION['cnt']=$cnt ?>" >
    <div class="form-floating mb-3">
      <input
        type="email"
        class="form-control" name="username" id="username" placeholder="test">
      <label for="username">Write your username</label>
    </div>
    <div class="form-floating mb-3">
      <input
        type="password"
        class="form-control" name="pass" id="pass" placeholder="pass">
      <label for="pass">write your password</label>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>
<?php 
    $cnt = 0;
    if($_SERVER['REQUEST_METHOD']=="POST"){
        //$cnt++;
        $username = filter_var($_POST['username'],FILTER_SANITIZE_EMAIL);
        $pass = $_POST['pass'];
        if(!filter_var($username,FILTER_VALIDATE_EMAIL)===false){
           $userDetails = find_username('user_tb','email',$username);
           if($userDetails!==false){
            if(password_verify($pass,$userDetails['pass'])){
                $userObj = new user($userDetails);
                $_SESSION['loggedUser'] = serialize($userObj);
                $_SESSION['timeout'] = time() + 40;
            }else{
                echo "<h1>Wrong username/password</h1>";
            }
           }else{
            echo "<h1>Wrong username/password</h1>";
           }
        }else{
            echo "<h1>Not Valid</h1>";   
        }
    }
?>