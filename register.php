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

    <div class="container px-4">
    <div class="container-fluid">
     <div class="row my-row">
         <div class="col-12 col-md-6">
         <form method ="post">
                    <div class="row col-md-9">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email адрес</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
                    </div>
                    </div>
                    <div class="row col-md-9">
                    <div class="mb-3">
                        <label for="name" class="form-label">Име</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    </div>
                    <div class="row col-md-9">
                    <div class="mb-3">
                        <label for="password" class="form-label">Парола</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    </div>
                    <div class="row col-md-9">
                    <div class="mb-3">
                        <label for="confirmpassword" class="form-label">Повторете паролата</label>
                        <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" required>
                    </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Регистрация</button>
                </form>
         </div>
         <div class="col-12 col-md-6">
            <img
                src="images/bus-g5a4a1510b_1280.png"
                class="img-fluid" alt="...">
         </div>
     </div>
 </div>
 </div>

    <?php
            if (isset($_POST['submit'])){
                $email = $_POST["email"];
                $name = $_POST["name"];
                $password = $_POST["password"];
                $confirmpassword = $_POST["confirmpassword"];

                if(strcmp($password, $confirmpassword) != 0)
                {
                     echo "<div class=\"container px-4\">";
                     echo "<p class=\"text-warning\">";
                     echo "Паролите не съвпадат.";
                     echo "</p>";
                     echo "</div>";
                    exit();
                }

                require "connecttoserver.php"; // За връзка със сървъра
                require "createdatabase.php"; // За създаване на базата данни

                $sql = "SELECT *
                        FROM users
                        WHERE email = '$email'";

                $result = mysqli_query($dbConn, $sql);
                $row = mysqli_num_rows($result);
                
                if($row > 0)
                {
                    echo "<div class=\"container px-4\">";
                    echo "<p class=\"text-danger\">";
                    echo "Имейлът е зает.";
                    echo "</p>";
                    echo "</div>";
                    exit();
                }

                $sql=   "INSERT INTO users (email, name, password)
                        VALUES ('$email', '$name', '$password')";
                
                //mysqli_select_db($dbConn, $dbName);
                $result = mysqli_query($dbConn, $sql);
                if (!$result)
                {
                     echo "<div class=\"container px-4\">";
                     echo "<p class=\"text-danger\">";
                     echo "Грешка при добавяне на запис.";
                     echo mysqli_error($dbConn);
                     echo "</div>";
                     echo "</p>";
                }
                else
                {
                     echo "<div class=\"container px-4\">";
                     echo "<p class=\"text-success\">";
                     echo "Успешна регистрация.";
                     echo "</p>";
                     echo "</div>";
                }    
            }
        ?>

<!--footer-->
<div class="mt-2">
<div id="footer"></div>
  <script>
  $(function(){
    $("#footer").load("footer.php");
  });
  </script>
<!--end of footer-->

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
    crossorigin="anonymous"></script>
</body>

</html>