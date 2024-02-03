<html>

<?php 
    include 'header.php'; 
?>
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
/>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- Slider main container -->





    <div class="about container">
        <h1>About SuperUnkown</h1>
    <img src="https://external-preview.redd.it/KTSqAaX0BF33xwr_p2uPl2Z02kn4bixVVNYTRe4aDFA.png?auto=webp&s=7a08dc0db4136e80efc9b183c408e16e892fbff7">
<?php 

    $query = $db->query("SELECT * FROM about WHERE ID = 1");

    if($query->num_rows > 0){
        while($row = $query->fetch_assoc()){
            $description = $row["Description"];
        ?>
        <div class="about-description"><?php echo $description; 
        ?></div>

<?php }
}else{ ?>
    <p>No description found...</p>
<?php } ?>

    <h2>Companies We've Worked With</h2>
    </div>

<div class="swiper">
  <!-- Additional required wrapper -->
  <div class="swiper-wrapper">
    <!-- Slides -->
    <div class="swiper-slide"><img src="https://upload.wikimedia.org/wikipedia/commons/6/6c/Facebook_Logo_2023.png"></div>
    <div class="swiper-slide"><img src="https://img.freepik.com/free-vector/twitter-new-2023-x-logo-white-background-vector_1017-45422.jpg?size=338&ext=jpg&ga=GA1.1.1448711260.1706832000&semt=ais"></div> 
    <div class="swiper-slide"><img src="https://cdn1.iconfinder.com/data/icons/google-s-logo/150/Google_Icons-09-512.png"></div>
    <div class="swiper-slide"><img src="https://devforum-uploads.s3.dualstack.us-east-2.amazonaws.com/uploads/original/4X/0/e/e/0eeeb19633422b1241f4306419a0f15f39d58de9.png"></div>
    <div class="swiper-slide"><img src="https://1000logos.net/wp-content/uploads/2016/10/Apple-Logo.png"></div>
    <div class="swiper-slide"><img src="https://cdn.pixabay.com/photo/2021/06/15/12/28/tiktok-6338430_1280.png"></div>
    <div class="swiper-slide"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Steam_icon_logo.svg/512px-Steam_icon_logo.svg.png"></div>

    
  </div>

  <!-- If we need navigation buttons -->
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>

  <!-- If we need scrollbar -->
</div>
<script src="js/about-us.js"></script>

</body>
</html>