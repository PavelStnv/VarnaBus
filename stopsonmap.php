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
  <link rel="shortcut icon" href="icons/Iconshock-Real-Vista-Transportation-School-bus.ico"/>
  <style>
    .wrapper {
    position: relative;
    padding-bottom: 40%;
    padding-top: 25px;
    height: 0;
}
.wrapper iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
  </style>


</head>

<body>

<div class="mb-5">
  <!--Navigation bar-->
  <div id="nav-placeholder"></div>

  <script>
  $(function(){
    $("#nav-placeholder").load("nav.php");
  });
  </script>
  <!--end of Navigation bar-->
  </div>
  
  
  <?php 
    include_once "connecttoserver.php"; // За връзка със сървъра 
    include_once "createdatabase.php"; // За създаване на базата данни

    $sql ="SELECT id, line_number FROM all_lines";
    //$result = $conn->query($sql);
    $result = mysqli_query($dbConn, $sql);
    if($result->num_rows> 0){
      $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
?>

<div class="container-fluid">

  <div class="row mb-3">
    <div class="col-4"></div>
    <div class="col-4 d-flex justify-content-center">
      <select id="line_number"  name="line_number" style="width: 500px">
        <option value="0">Изберете линия</option>
        <?php foreach ($options as $option) { ?>
        <option value=<?php echo $option['id'];?>><?php echo $option['line_number']; ?> </option>
        <?php } ?>
      </select>
    </div>
    <div class="col-4">
      <form method="post">
      <button type="submit" name="submit" class="btn btn-primary">Покажи</button>
      <input type="hidden" id="lineid" name="lineid">
      </form>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-3 mb-3 d-flex justify-content-center">
        <textarea name="allstops" id="allstops" cols="35" rows="18" readonly></textarea>
    </div>
    <div class="col-lg-9">
    <div class="wrapper">
    <iframe id="mainmap" src="" responsive-iframe  style="border:0;" allowfullscreen="" loading="lazy"
      referrerpolicy="no-referrer-when-downgrade" width="640" height="480"></iframe>
    </div>
    </div>
  </div>

</div>




<script>
  $(document).ready(function() {
    $("select").change(function(){
        var combobox = document.getElementById("line_number");
        var line_id = combobox.value;
        document.getElementById("lineid").value = line_id;
        });
});
</script>

<!--footer-->
<div class="mt-2">
<div id="footer"></div>
  <script>
  $(function(){
    $("#footer").load("footer.php");
  });
  </script>
<!--end of footer-->

<?php
    if(isset($_POST['submit']))
    {
      $lineid = $_POST['lineid'];

      if($lineid == '' || $lineid == 0)
      {
        echo "<script>alert(\"Не сте избрали линия.\")</script>";
        exit();
      }

      include_once "connecttoserver.php"; // За връзка със сървъра
      include_once "createdatabase.php"; // За създаване на базата данни

      $sql = "SELECT stop_name
              FROM stops_in_line
              INNER JOIN stops
              ON stops.id = stops_in_line.stop_id
              WHERE line_id = $lineid";

      $result = mysqli_query($dbConn, $sql);
      $stop = "";
      $counter = 1;
      while($row = mysqli_fetch_assoc($result))
      {
        $stop .= $counter;
        $stop .= ". ";
        $stop .= $row['stop_name'];
        $stop .= "&#13;&#10;";
        $counter++;
      }

      echo "<script> document.getElementById(\"allstops\").innerHTML  += '$stop'</script>";

      $sql = "SELECT iframe_src
      FROM all_lines
      WHERE id = $lineid";

      $result = mysqli_query($dbConn, $sql);

      $row = mysqli_fetch_assoc($result);
      $iframe_src = $row['iframe_src'];

      echo "<script> document.getElementById(\"mainmap\").src = \"$iframe_src\"</script>";
      echo "<script> document.getElementById(\"line_number\").value = \"$lineid\"</script>";
      echo "<script> document.getElementById(\"lineid\").value = \"$lineid\"</script>";
    }
?>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
    crossorigin="anonymous"></script>
</body>

</html>