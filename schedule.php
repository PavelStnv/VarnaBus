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

.table {
        display: block;
        max-width: 100%;
        overflow: scroll;
}

td {
    white-space: nowrap;
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
      <button type="submit" name="submit" onclick="display_times()" class="btn btn-primary">Покажи</button>
      <input type="hidden" id="lineid" name="lineid">
      </form>
    </div>
  </div>

  <div class="row">
<div class="col-12">
        <table class="table table-hover">
          <thead>
            <tr>
            <th>
              №
            </th>
            <th>
              Спирка
            </th>
            </tr>
          </thead>
          <tbody id="tbody">
            
          </tbody>
        </table>
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

      $sql = "SELECT stops.id, stop_name
              FROM stops_in_line
              INNER JOIN stops
              ON stops.id = stops_in_line.stop_id
              WHERE line_id = $lineid";

      $result = mysqli_query($dbConn, $sql);
      $stop = "";
      $counter = 1;
      $html = "";

      while($row = mysqli_fetch_assoc($result))
      {
        $stop = $row['stop_name'];
        $stop_id = $row['id'];

        echo "<script>
        var html = \"<tr>\";
              html += \"<td>$counter</td>\";
              html += \"<td>$stop</td>\";
          html += \"</tr>\";
  
          var row = document.getElementById(\"tbody\").insertRow();
          row.innerHTML = html
          row.id = $stop_id;
          </script>";

        $counter++;
      }

      $sql = "CREATE TEMPORARY TABLE times
              SELECT schedule.stop_id, time
              FROM schedule
              INNER JOIN stops_in_line
              ON schedule.stop_id = stops_in_line.stop_id
              WHERE line_id = $lineid";

      $result = mysqli_query($dbConn, $sql);


      $sql = "CREATE TEMPORARY TABLE all_stops
              SELECT schedule.stop_id
              FROM schedule
              INNER JOIN stops_in_line
              ON schedule.stop_id = stops_in_line.stop_id
              WHERE line_id = $lineid
              GROUP BY schedule.stop_id";

      $result = mysqli_query($dbConn, $sql);


      $sql = "SELECT * FROM all_stops";
      $result = mysqli_query($dbConn, $sql);

      while($row = mysqli_fetch_assoc($result))
      {
        $stop_id = $row['stop_id'];
        
        $sql = "SELECT time FROM times WHERE stop_id = $stop_id";
        $result2 = mysqli_query($dbConn, $sql);

        while($row2 = mysqli_fetch_assoc($result2))
        {
            $time_to_insert = $row2['time'];

            echo "<script>
              var html = document.getElementById(\"$stop_id\").innerHTML;
              
              html += \"<td>$time_to_insert</td>\";
              

              document.getElementById(\"$stop_id\").innerHTML = html;
              </script>";
        }
       
      }

      $sql = "DROP TEMPORARY TABLE all_stops";
      $sql = "DROP TEMPORARY TABLE times";
      mysqli_query($dbConn, $sql);

      echo "<script> document.getElementById(\"line_number\").value = \"$lineid\"</script>";   
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