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
          <div class="col-12 col-md-5">
            <form method ="post">
              <div class="row col-md-10">
              <div class="mb-3">
                  <label for="email" class="form-label">Email адрес</label>
                  <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
              </div>
              </div>
              <div class="row col-md-10"></div>
              <div class="row col-md-10">
              <div class="mb-3">
                  <label for="password" class="form-label">Парола</label>
                  <input type="password" class="form-control" id="password" name="password" required>
              </div>
              </div>
              <div class="row col-md-6"></div>
              <button type="submit" name="submit" class="btn btn-primary">Вход</button>
            </form>
          </div>
        <div class="col-12 col-md-6">
            <img
                src="images/key-gf2342ae85_1920.jpg"
                class="img-fluid" alt="...">
        </div>
      </div>
    </div>
  </div>

    <?php
        if(isset($_POST['submit'])){

            session_start();

            $email = $_POST["email"];
            $password = $_POST["password"];
    
            require "connecttoserver.php"; // За връзка със сървъра
            require "createdatabase.php"; // За създаване на базата данни

            $sql = "SELECT *
                    FROM users
                    WHERE email = '$email'";

            $result = mysqli_query($dbConn, $sql);
            $row = mysqli_num_rows($result);

            if($row > 0)
            {
                $row = mysqli_fetch_assoc($result);
                $real_password = $row['password'];

                if(strcmp($password, $real_password) != 0)
                {
                     echo "<div class=\"container px-4\">";
                     echo "<p class=\"text-danger\">";
                     echo "Грешна парола.";
                     echo "</p>";
                     echo "</div>";
                    exit();
                }

                $_SESSION['id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['name'] = $row['name'];

                header("Location: index.php");
            }
            else
            {
                echo "<div class=\"container px-4\">";
                echo "<p class=\"text-warning\">";
                echo "Няма потребител с посочения имейл.";
                echo "</p>";
                echo "</div>";
                exit();
            }
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