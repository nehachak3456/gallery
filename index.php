<?php require "include/header.php"; ?>
<?php require "config.php"; ?>

        <div class="row mb-4">
            <h2 class="col-6 tm-text-primary">
                Latest Photos
            </h2>
           
        </div>
        <?php 
            $select = "SELECT * FROM images";
            $data = mysqli_query($conn,$select);
            
            if(mysqli_num_rows($data) > 0)
               { 
               
            ?>  
        <div class="row tm-mb-90 tm-gallery">
            <?php 
                while($row = mysqli_fetch_assoc($data))
                {
            ?>
        	<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
              
                <figure class="effect-ming tm-video-item">
                    <img src="img/<?php echo $row['img']; ?>" alt="Image" class="img-fluid">
                    <figcaption class="d-flex align-items-center justify-content-center">
                        <h2><?php echo $row['title']; ?></h2>
                        <a href="photo-detail.php?id=<?php echo $row['id']; ?>">View more</a>
                    </figcaption>                    
                </figure>
                <div class="d-flex justify-content-between tm-text-gray">
                    <span class="tm-text-gray-light"><?php echo date('d',strtotime($row['created_date'])) . ',' . date('M',strtotime($row['created_date'])) .' '. date('Y',strtotime($row['created_date'])); ?></span>
                    <span><?php echo $row['user_name']; ?></span>
                </div>
            </div> 
            <?php } ?>
        </div>
                   
        <?php 
        }?>
         <!-- row -->
        <?php require "include/footer.php"; ?>