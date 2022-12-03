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

  <div class="mb-3">
    <div class="container-fluid">
      <div class="row">
        <img src="images/mangopear-creative-A3xpZYjAZyk-unsplash.jpg" class="img-fluid" alt="...">
      </div>
    </div>
  </div>

  <div class="ms-3">
  <iframe
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d93047.85536441917!2d27.856380701630176!3d43.214827471195036!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40a4538baaf3d7a1%3A0x5727941c71a58b7c!2sVarna!5e0!3m2!1sen!2sbg!4v1669478747612!5m2!1sen!2sbg"
    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
    referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
    crossorigin="anonymous"></script>
</body>

</html>