<?php require "include/header.php"; ?>
<?php require "config.php"; ?>
<?php 
	if(isset($_POST['submit']))
	{
		if($_POST['title'] == '' OR $_POST['description'] == ''){
			echo "<div class='alert alert-danger bg-red text-white'>One or more inputs are empty</div>";
		}
		else
		{
			$title = $_POST['title'];
			$description = $_POST['description'];
			$img = $_FILES['img']['name'];

			$dir = 'img/' . basename($img);

			$user_name = $_SESSION['username'];
			print_r($_POST);
			$insert = "INSERT INTO images (title,description,img,user_name) values('$title','$description','$img','$user_name')";
			echo $insert;
			$result = mysqli_query($conn,$insert);
			if(move_uploaded_file($_FILES['img']['tmp_name'],$dir))
			{
				header("location:index.php");
			}
			if($result)
			{
				echo "Data Insert successfully";
			}
		}
	}
?>
    	<div class="row mb-4">
            <h2 class="col-6 tm-text-primary">
                Create Photo
            </h2>
           
        </div>
        <div class="row mb-4">
			
	     <form method="post" action="create.php" enctype="multipart/form-data">
	              <!-- Email input -->
	              <div class="form-outline mb-4">
	                <input type="text" name="title" id="form2Example1" class="form-control" placeholder="title" />
	               
	              </div>	             

	              <div class="form-outline mb-4">
	                <textarea type="text" name="description" id="form2Example1" class="form-control" placeholder="description" rows="8"></textarea>
	            </div>      

	              
	             <div class="form-outline mb-4">
	                <input type="file" name="img" id="form2Example1" class="form-control" placeholder="image" />
	            </div>


	              <!-- Submit button -->
	              <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

	          
	            </form>
		</div>
	</div>
    <?php require "include/footer.php"; ?>
</body>
</html>