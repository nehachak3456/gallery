<?php require "include/header.php"; ?>
<?php require 'config.php';?>
<?php 
    //check for the submit


    //take the data and do the query


    //execute the query


    //fetch the data


    //check for the row count


    //and user password_verify funtion

    if(isset($_SESSION['username']))
    {
      header("location:index.php");
    }

    if(isset($_POST['submit']))
    {
      if($_POST['email'] == '' OR $_POST['password']  == '')
      {
        echo "some inputs are empty";
      }
      else
      {
        $email = $_POST['email'];
        $password = $_POST['password'];  
        $login = mysqli_query($conn,"SELECT * FROM users where email ='$email'"); 
        if(mysqli_num_rows($login) > 0)
        {
          while($data = mysqli_fetch_assoc($login))
          {
              if($data['password'] == md5($password))
              {
                 // echo "Logged In"; 
                 $_SESSION['username'] = $data['user_name'];    
                 $_SESSION['email'] = $data['email'];            
                header("location:index.php");
                }
              else
              {
                echo "password wrong";
              }
          }
        }
        else
        {
          echo "Email is wrong";
        }
      }
    }
?>

<main class="form-signin w-50 m-auto">
  <form method = "POST" action = <?php echo $_SERVER['PHP_SELF']; ?>>
    <!-- <img class="mb-4 text-center" src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
    <h1 class="h3 mt-5 fw-normal text-center">Please Login in</h1>

    <div class="form-floating">
      <label for="floatingInput">Email address</label>
      <input type="email"  name ="email"class="form-control" id="floatingInput" placeholder="name@example.com">
      
    </div>
    <div class="form-floating">
       <label for="floatingPassword">Password</label>
      <input type="password" name = "password" class="form-control" id="floatingPassword" placeholder="Password">
      
    </div>

    <button  name ="submit" class="w-100 btn btn-lg btn-primary mt-3" type="submit">Sign in</button>
    <h6 class="mt-3">Don't have an account  <a href="register.php">Create your account</a></h6>
  </form>
</main>
<?php require "include/footer.php"; ?>
