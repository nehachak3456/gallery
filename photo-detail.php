<?php require "include/header.php"; ?>
<?php require "config.php"; ?>

<?php 
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];   
        
        $select = "SELECT * FROM images WHERE id != $id ";
        $data = mysqli_query($conn,$select);

        $sql = "SELECT * FROM images WHERE id = $id ";
        $result = mysqli_query($conn,$sql);
        
    }
    if(mysqli_num_rows($result) > 0)
    { 
       while($row = mysqli_fetch_assoc($result)){
?>        <div class="row mb-4">
            <h2 class="col-12 tm-text-primary"><?php echo $row['title']; ?></h2>
        </div>

        <div class="row tm-mb-90">  
                    
            <div class="col-xl-8 col-lg-7 col-md-6 col-sm-12">
                <img src="img/<?php echo $row['img'] ?>" alt="Image" class="img-fluid">
            </div>
            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                <div class="tm-bg-gray tm-video-details">                  
                    <div class="mb-4">
                        <h3 class="tm-text-gray-dark">Description</h3>
                        <p><?php echo substr($row['description'],0,300)?></p>
                    </div>                   
                </div>
            </div>         
        </div>
    <?php } } ?>
        <div class="row mb-4">
            <h2 class="col-12 tm-text-primary">
                Explore More Photos
            </h2>
        </div>
        <?php           
            
            if(mysqli_num_rows($data) > 0)
               { 
                
            ?>
        <div class="row mb-3 tm-gallery">
        <?php while($rows = mysqli_fetch_assoc($data))
                { ?>
          <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                <figure class="effect-ming tm-video-item">
                    <img src="img/<?php echo $rows['img'] ?>" alt="Image" class="img-fluid">
                    <figcaption class="d-flex align-items-center justify-content-center">
                        <h2><?php echo $rows['title']; ?></h2>
                        <a href="photo-detail.php?id=<?php echo $rows['id']; ?>">View more</a>
                    </figcaption>                    
                </figure>
                <div class="d-flex justify-content-between tm-text-gray">
                    <span class="tm-text-gray-light"><?php echo date('d',strtotime($rows['created_date'])) . ',' . date('M',strtotime($rows['created_date'])) .' '. date('Y',strtotime($rows['created_date'])); ?></span>
                    <span><?php echo $rows['user_name']; ?></span>
                </div>
            </div> 
            <?php } ?>      
        </div>
       <?php }?>  <!-- row -->
    </div> <!-- container-fluid, tm-container-content -->

    <?php require "include/footer.php"; ?>
</body>
</html>