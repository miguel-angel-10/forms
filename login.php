<?php 


$username = $password = '';
session_start();
$errors = array('username'=> '', 'password' => '');


if( !empty( $_SESSION['active'] )){
  header( 'location: dashboard.php' );
} else {
   if( isset( $_POST['login'] )){

    if( empty( $_POST['username'] )){
      $errors['username'] =  "enter username<br/>";
    } else {
      $username = htmlspecialchars( $_POST['username'] );
      if( !preg_match( '/^[a-zA-Z\s]+$/', $username )){
        $errors['username'] = ' enter correct username';
      }
    }

    if( empty( $_POST['pwd'])){
      $errors['password'] = 'enter password';
    }
    else {
      $password = md5(htmlspecialchars( $_POST['pwd']));
      echo $password;
      if( !preg_match( '/^[a-zA-Z\s]+$/', $password )) {
        $errors['pwd'] = 'enter correct password';
      }
    }

    if( array_filter( $errors )){
      echo 'there are errors';
    } else {
      echo 'no errors';
    }

    include( 'config/connect.db.php' );
    # db query
    $sql = $conn->prepare( "SELECT * FROM utilisateur WHERE utilisateur = '$username' AND cle = '$password'");

    $sql->execute();

  
    $result = $sql->fetchAll( PDO::FETCH_ASSOC );

    if( $result) {
    
      $_SESSION['active'] = true;
      $_SESSION['userid'] = $result['user_id'];
      $_SESSION['name'] = $result['prenom'];
      $_SESSION['email'] = $result['email'];
      $_SESSION['user'] = $result['utilisateur'];
      $_SESSION['role'] = $result['role'];
      header( 'location: dashboard.php' );
      
    } else {
    session_destroy();
    }
  
  }
}

?>




<?php include( 'templates/header.php' ) ?>

  <main>
    <div class="rowform">

      <div class="container grey-text">
      
          <form action="login.php" method="post" class="white">

            <label for="">User</label>
            <input type="text" name="username">

            <div class="red-text">
              <?php echo $errors['username'] ?>
            </div>
        
            <label for="">password</label>
            <input type="password" name="pwd">
            <div class="red-text">
              <?php echo $errors['password'] ?>
            </div>
    
          <div class="center">
            <input class="btn btn-large" type="submit" name="login" value="Connect">
          </div>
            
          </form>
      
        </div>
      </div>
     </main>



  <?php include( 'templates/footer.php' ) ?>