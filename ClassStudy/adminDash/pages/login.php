<?php
  if(isset($_SESSION['loggedUser'])){
    header("Location: ".parse_url($_SERVER['REQUEST_URI'],PHP_URL_HOST));
  }
?>

<form method="POST" action="<?php $reqUrl; ?>">
    <div class="form-floating mb-3">
      <input
        type="text"
        class="form-control" name="username" id="username" placeholder="username">
      <label for="username">Write user name</label>
    </div>
    <div class="form-floating mb-3">
      <input
        type="text"
        class="form-control" name="pass" id="pass" placeholder="pass">
      <label for="pass">Write user password</label>
    </div>
    <button type="submit" class="btn bth-primary">Login</button>
</form>

<?php
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $username = filter_var($_POST['username'],FILTER_SANITIZE_EMAIL);
        $pass = $_POST['pass'];
        if (!filter_var($username, FILTER_VALIDATE_EMAIL)===false){
          $userDetails = find_username('user_tb','email',$username);
          if($userDetails!==false){
            if(password_verify($pass,$userDetails['pass'])){
              $userObj = new user($userDetails);

              $_SESSION['loggedUser'] = serialize($userObj);
              
              echo "$user login";
            }else{
              echo "Worong user name/password:1";
            }
          }else{
            echo "Worong user name/password:2";
          }
        }
    }