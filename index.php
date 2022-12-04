<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>VarnaBus</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <link rel="stylesheet" href="style.css">
  <!-- за nav bar-a-->
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script> 

  <!-- за button in image -->
<style>
  .product-holder {
    position: relative;
    display: block;
}

.plus-image {
    left: 50%;
    top: 50%;
    position: absolute;
    margin-top: 80px;
    margin-left: -500px;
}
</style>

<!-- За modal dialog -->
<script src=
"https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
		integrity=
"sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
		crossorigin="anonymous">
	</script>

</head>

<body>

  <!--Navigation bar-->
  <div id="nav-placeholder"></div>

  <script>
  $(function(){
    $("#nav-placeholder").load("nav.php");
  });
  </script>
  <!--end of Navigation bar-->


  <div class="container-fluid">
    <div class="row">
    <!-- <div class="opacity-50"> -->
      <img
        src="images/mangopear-creative-A3xpZYjAZyk-unsplash.jpg"
        class="img-fluid" alt="...">
    </div>
    <!-- </div> -->
  </div>

  <!-- <div class="container-fluid">
    <div class="row">
    
    <div class = "row text-center" style="">
    <div class="col-xs-6 text-center" style="background-color:none; margin-top:0px;">
        <div class='product-holder'>
        <div class="opacity-50">
      <img
        src="images/mangopear-creative-A3xpZYjAZyk-unsplash.jpg"
        class="img-fluid" alt="...">
        </div>
        <button type="button" class='btn btn-warning btn-lg plus-image' >Купи билет</button>
    </div>
  </div>
  </div>
    </div>
</div> -->

lynx
  <?php
      // session_start();
      
      require "connecttoserver.php"; // За връзка със сървъра 
      require "createdatabase.php"; // За създаване на базата данни
  ?>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
    crossorigin="anonymous"></script>
</body>

</html>