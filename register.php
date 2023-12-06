<?php require "include/header.php"; ?>
<?php include 'config.php';?>
<?php 

  if(isset($_SESSION['username']))
  {
    header("location:index.php");
  }

 if(isset($_POST['submit']))
 {   
  if($_POST['email'] == '' OR $_POST['password'] == '' OR $_POST['username'] == '')
  {
    echo "some inputs are empty";
  }
  else
  {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = $_POST['username'];
    $sql = "INSERT INTO users(email,user_name,password) values('$email','$user',md5($password))";
    $insert = mysqli_query($conn,$sql);
    if($insert)
    {
      echo "Data Field successfully";
      header("location:login.php");
    }
  }
 }

?>

<main class="form-signin w-50 m-auto">
  <form method="POST" action="register.php">
   
    <h1 class="h3 mt-5 fw-normal text-center">Please Register</h1>

    <div class="form-floating">
      <label for="floatingInput">Email address</label>
      <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      
    </div>
    <div class="form-floating">
      <label for="floatingInput">User Name</label>
      <input name="username" type="name" class="form-control" id="floatingInput" placeholder="User Name">
      
    </div>
    <div class="form-floating mt-2">
     <label for="floatingPassword">Password</label>
      <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
     
    </div>

    <button name="submit" class="w-100 btn btn-lg btn-primary mt-2" type="submit">register</button>
    <h6 class="mt-3">Aleardy have an account?  <a href="login.php">Login</a></h6>

  </form>
</main>
<?php require "include/footer.php"; ?>
