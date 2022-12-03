<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>VarnaBus</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
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

  <!-- За hover effect -->
  <style>
    .img-wrapper {

      overflow: hidden;
    }

    .inner-img {
      transition: 0.3s;
    }

    .inner-img:hover {
      transform: scale(1.1);
    }

    /* Other styling elements, that are not necessary for the example */

    .img-wrapper {
      display: inline-block;
      box-sizing: border-box;
    }
  </style>

  <!-- За цвета на ръба на изображенията на картите -->
  <style>
    .edge-color {
      border-color: white;
    }
  </style>

</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


  <!--Navigation bar-->
  <div id="nav-placeholder"></div>

  <script>
    $(function() {
      $("#nav-placeholder").load("nav.php");
    });
  </script>
  <!--end of Navigation bar-->

  <div class="container-fluid">
    <div class="row">
      <img src="images/mangopear-creative-A3xpZYjAZyk-unsplash.jpg" class="img-fluid" alt="...">
    </div>
  </div>

  <div class="mt-3">
    <div class="card-group">

      <div class="card">
        <button type="submit" name="buystudent" id="student" data-bs-toggle="modal" data-bs-target="#exampleModal" class="edge-color">
          <div class="img-wrapper">
            <img src="images/laptop-ga9ed9dc85_1920 Cropped.jpg" class="card-img-top inner-img" alt="...">
          </div>
        </button>
        <div class="card-body">
          <h5 class="card-title">За студенти</h5>
          <p class="card-text">За лица до 26 годишна възраст.<br>
            Валидонст: 1 час<br>
            <b> Цена: 1.50лв</b>
          </p>
        </div>
        <div class="card-footer">
          <button type="submit" name="buystudent" id="student2" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Купи</button>
        </div>
      </div>

      <div class="card">
        <button type="submit" name="buypensioner" id="pensioner" data-bs-toggle="modal" data-bs-target="#exampleModal" class="edge-color">
          <div class="img-wrapper">
            <img src="images/elderly-gc5a6c604e_1920 Cropped.jpg" class="card-img-top inner-img" alt="...">
          </div>
        </button>
        <div class="card-body">
          <h5 class="card-title">За пенсионери</h5>
          <p class="card-text">За лица над 60 годиншна възраст.<br>
            Валидонст: 1 час<br>
            <b> Цена: 1.50лв</b>
          </p>
        </div>
        <div class="card-footer">
          <button type="submit" name="buypensioner" id="pensioner2" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Купи</button>
        </div>
      </div>

      <div class="card">
        <button type="submit" name="buynormal" id="normal" data-bs-toggle="modal" data-bs-target="#exampleModal" class="edge-color">
          <div class="img-wrapper">
            <img src="images/egor-litvinov-RlHI0cCNThY-unsplash Cropped.jpg" class="card-img-top inner-img" alt="...">
          </div>
        </button>
        <div class="card-body">
          <h5 class="card-title">Нормален билет</h5>
          <p class="card-text">Обикновен билет. <br>Валидонст: 1 час.<br>
            <b> Цена: 2.00лв</b>
          </p>
        </div>
        <div class="card-footer">
          <button type="submit" name="buynormal" id="normal2" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Купи</button>
        </div>
      </div>

      <div class="card">
        <button type="submit" name="buyallday" id="allDay" data-bs-toggle="modal" data-bs-target="#exampleModal" class="edge-color">
          <div class="img-wrapper">
            <img src="images/towfiqu-barbhuiya-bwOAixLG0uc-unsplash Cropped.jpg" class="card-img-top inner-img" alt="...">
          </div>
        </button>
        <div class="card-body">
          <h5 class="card-title">За цял ден</h5>
          <p class="card-text">Билет за всички линии.<br>
            Валидонст: 24 часа<br>
            <b> Цена: 10.00лв</b>
          </p>
        </div>
        <div class="card-footer">
          <button type="submit" name="buyallday2" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" id="allDay2">Купи</button>
        </div>
      </div>

    </div>
  </div>

  <script>
    $("#student").click(function() {
      let loggedIn = "<?php echo checkIfLoggedIn() ?>";
      if (loggedIn != 1) {
        alert("Не сте влезли в профила си!");
        const modal = document.getElementById("exampleModal");
        modal.setAttribute("hidden", "");
        location.reload();
        return;
      }
    });
  </script>

  <script>
    $("#student2").click(function() {
      let loggedIn = "<?php echo checkIfLoggedIn() ?>";
      if (loggedIn != 1) {
        alert("Не сте влезли в профила си!");
        const modal = document.getElementById("exampleModal");
        modal.setAttribute("hidden", "");
        location.reload();
        return;
      }
    });
  </script>


  <script>
    $("#pensioner").click(function() {
      let loggedIn = "<?php echo checkIfLoggedIn() ?>";
      if (loggedIn != 1) {
        alert("Не сте влезли в профила си!");
        const modal = document.getElementById("exampleModal");
        modal.setAttribute("hidden", "");
        location.reload();
        return;
      }
    });
  </script>

  <script>
    $("#pensioner2").click(function() {
      let loggedIn = "<?php echo checkIfLoggedIn() ?>";
      if (loggedIn != 1) {
        alert("Не сте влезли в профила си!");
        const modal = document.getElementById("exampleModal");
        modal.setAttribute("hidden", "");
        location.reload();
        return;
      }
    });
  </script>
  <script>
    $("#normal").click(function() {
      let loggedIn = "<?php echo checkIfLoggedIn() ?>";
      if (loggedIn != 1) {
        alert("Не сте влезли в профила си!");
        const modal = document.getElementById("exampleModal");
        modal.setAttribute("hidden", "");
        location.reload();
        return;
      }
    });
  </script>

  <script>
    $("#normal2").click(function() {
      let loggedIn = "<?php echo checkIfLoggedIn() ?>";
      if (loggedIn != 1) {
        alert("Не сте влезли в профила си!");
        const modal = document.getElementById("exampleModal");
        modal.setAttribute("hidden", "");
        location.reload();
        return;
      }
    });
  </script>

  <script>
    $("#allDay").click(function() {
      let loggedIn = "<?php echo checkIfLoggedIn() ?>";
      if (loggedIn != 1) {
        alert("Не сте влезли в профила си!");
        const modal = document.getElementById("exampleModal");
        modal.setAttribute("hidden", "");
        location.reload();
        return;
      }
    });
  </script>


  <script>
    $("#allDay2").click(function() {
      let loggedIn = "<?php echo checkIfLoggedIn() ?>";
      if (loggedIn != 1) {
        alert("Не сте влезли в профила си!");
        const modal = document.getElementById("exampleModal");
        modal.setAttribute("hidden", "");
        location.reload();
        return;
      }
    });
  </script>

  <script>
    $("#student").click(function() {
      let canContinue = "<?php echo checkIfTicketAlreadyBought(1) ?>";
      if (canContinue != 1) {
        alert("Вече имате закупен билет!");
        const modal = document.getElementById("exampleModal");
        modal.setAttribute("hidden", "");
        location.reload();
        return;
      }

      const button = document.getElementById("finalButton");
      button.setAttribute("name", "buystudent");

      var str = "Закупете билет за студенти";
      $("#data").html(str);
      $("#finalButton").html(str);
    });
  </script>

  <script>
    $("#student2").click(function() {
      let canContinue = "<?php echo checkIfTicketAlreadyBought(1) ?>";
      if (canContinue != 1) {
        alert("Вече имате закупен билет!");
        const modal = document.getElementById("exampleModal");
        modal.setAttribute("hidden", "");
        location.reload();
        return;
      }

      const button = document.getElementById("finalButton");
      button.setAttribute("name", "buystudent");

      var str = "Закупете билет за студенти";
      $("#data").html(str);
      $("#finalButton").html(str);
    });
  </script>



  <script>
    $("#pensioner").click(function() {
      let canContinue = "<?php echo checkIfTicketAlreadyBought(2) ?>";
      if (canContinue != 1) {
        alert("Вече имате закупен билет!");
        const modal = document.getElementById("exampleModal");
        modal.setAttribute("hidden", "");
        location.reload();
        return;
      }

      const button = document.getElementById("finalButton");
      button.setAttribute("name", "buypensioner");

      var str = "Закупете билет за пенсионери";
      $("#data").html(str);
      $("#finalButton").html(str);
    });
  </script>

  <script>
    $("#pensioner2").click(function() {
      let canContinue = "<?php echo checkIfTicketAlreadyBought(2) ?>";
      if (canContinue != 1) {
        alert("Вече имате закупен билет!");
        const modal = document.getElementById("exampleModal");
        modal.setAttribute("hidden", "");
        location.reload();
        return;
      }

      const button = document.getElementById("finalButton");
      button.setAttribute("name", "buypensioner");

      var str = "Закупете билет за пенсионери";
      $("#data").html(str);
      $("#finalButton").html(str);
    });
  </script>

  <script>
    $("#normal").click(function() {
      let canContinue = "<?php echo checkIfTicketAlreadyBought(3) ?>";
      if (canContinue != 1) {
        alert("Вече имате закупен билет!");
        const modal = document.getElementById("exampleModal");
        modal.setAttribute("hidden", "");
        location.reload();
        return;
      }

      const button = document.getElementById("finalButton");
      button.setAttribute("name", "buynormal");

      var str = "Закупете нормален билет";
      $("#data").html(str);
      $("#finalButton").html(str);
    });
  </script>

  <script>
    $("#normal2").click(function() {
      let canContinue = "<?php echo checkIfTicketAlreadyBought(3) ?>";
      if (canContinue != 1) {
        alert("Вече имате закупен билет!");
        const modal = document.getElementById("exampleModal");
        modal.setAttribute("hidden", "");
        location.reload();
        return;
      }

      const button = document.getElementById("finalButton");
      button.setAttribute("name", "buynormal");

      var str = "Закупете нормален билет";
      $("#data").html(str);
      $("#finalButton").html(str);
    });
  </script>

  <script>
    $("#allDay").click(function() {
      let canContinue = "<?php echo checkIfTicketAlreadyBought(4) ?>";
      if (canContinue != 1) {
        alert("Вече имате закупен билет!");
        const modal = document.getElementById("exampleModal");
        modal.setAttribute("hidden", "");
        location.reload();
        return;
      }

      const button = document.getElementById("finalButton");
      button.setAttribute("name", "buyallday");

      var str = "Закупете билет за цял ден";
      $("#data").html(str);
      $("#finalButton").html(str);
    });
  </script>

  <script>
    $("#allDay2").click(function() {
      let canContinue = "<?php echo checkIfTicketAlreadyBought(4) ?>";
      if (canContinue != 1) {
        alert("Вече имате закупен билет!");
        const modal = document.getElementById("exampleModal");
        modal.setAttribute("hidden", "");
        location.reload();
        return;
      }

      const button = document.getElementById("finalButton");
      button.setAttribute("name", "buyallday");

      var str = "Закупете билет за цял ден";
      $("#data").html(str);
      $("#finalButton").html(str);
    });
  </script>


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Закупуване на билет</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post">

            <label for="cardnum" class="form-label">Номер на карта</label>
            <input type="number" class="form-control" id="cardnum" name="cardnum" required>

            <label for="cardname" class="form-label">Име върху карта</label>
            <input type="text" class="form-control" id="cardname" name="cardname" required>

            <label for="valid" class="form-label">Валидна до</label>
            <input type="date" class="form-control" id="valid" name="valid" required>

            <label for="cvcode" class="form-label">CV код</label>
            <input type="number" class="form-control" id="cvcode" name="cvcode" required>

        </div>
        <div class="modal-footer">
          <button type="submit" id="finalButton" name="none" class="btn btn-primary"></button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмяна</button>

          </form>
        </div>
      </div>
    </div>
  </div>

  <?php

  if (isset($_POST['buystudent'])) {
    $cardnum = $_POST['cardnum'];
    $cardname = $_POST['cardname'];
    $carddate = $_POST['valid'];
    $cardcvcode = $_POST['cvcode'];
    BuyTicket(1);
  }

  if (isset($_POST['buypensioner'])) {
    $cardnum = $_POST['cardnum'];
    $cardname = $_POST['cardname'];
    $carddate = $_POST['valid'];
    $cardcvcode = $_POST['cvcode'];
    BuyTicket(2);
  }

  if (isset($_POST['buynormal'])) {
    $cardnum = $_POST['cardnum'];
    $cardname = $_POST['cardname'];
    $carddate = $_POST['valid'];
    $cardcvcode = $_POST['cvcode'];
    BuyTicket(3);
  }

  if (isset($_POST['buyallday'])) {
    $cardnum = $_POST['cardnum'];
    $cardname = $_POST['cardname'];
    $carddate = $_POST['valid'];
    $cardcvcode = $_POST['cvcode'];
    BuyTicket(4);
  }

  function checkIfLoggedIn()
  {
    if (!isset($_SESSION['id'])) {
      return False;
    }

    return True;
  }

  function checkIfTicketAlreadyBought($ticket_type)
  {
    require "connecttoserver.php"; // За връзка със сървъра 
    require "createdatabase.php"; // За създаване на базата данни

    date_default_timezone_set('Europe/Sofia');
    $date = date('Y-m-d H:i:s a', time());

    if ($ticket_type != 4) {
      $valid_until = date("Y-m-d H:i:s", strtotime('+1 hour'));
    } else {
      $valid_until = date("Y-m-d H:i:s", strtotime('+1 day'));
    }

    $user_id = $_SESSION['id'];

    $sql = "SELECT * FROM bought_tickets
        WHERE user_id = $user_id
        AND ticket_id = $ticket_type
        order by valid_until desc";

    $result = mysqli_query($dbConn, $sql);
    $row = mysqli_num_rows($result);

    $can_continue = True;

    if ($row > 0) {
      $row = mysqli_fetch_assoc($result);
      $valid_from_table = $row['valid_until'];

      $can_continue = $valid_from_table < $date;
    }

    return $can_continue;
  }

  function BuyTicket($ticket_type)
  {
    require "connecttoserver.php"; // За връзка със сървъра 
    require "createdatabase.php"; // За създаване на базата данни

    date_default_timezone_set('Europe/Sofia');
    $date = date('Y-m-d H:i:s a', time());

    if ($ticket_type != 4) {
      $valid_until = date("Y-m-d H:i:s", strtotime('+1 hour'));
    } else {
      $valid_until = date("Y-m-d H:i:s", strtotime('+1 day'));
    }

    $user_id = $_SESSION['id'];

    $sql = "SELECT * FROM bought_tickets
        WHERE user_id = $user_id
        AND ticket_id = $ticket_type
        order by valid_until desc";

    $result = mysqli_query($dbConn, $sql);
    $row = mysqli_num_rows($result);

    $can_continue = True;

    if ($row > 0) {
      $row = mysqli_fetch_assoc($result);
      $valid_from_table = $row['valid_until'];

      $can_continue = $valid_from_table < $date;
    }

    if (!$can_continue) {
      exit();
    }

    $sql =   "   INSERT INTO bought_tickets (user_id, ticket_id, purchased, valid_until)
                    VALUES ($user_id, $ticket_type, '$date', '$valid_until')";

    $result = mysqli_query($dbConn, $sql);
    if (!$result) {
      echo "Грешка при добавяне на запис.";
      echo mysqli_error($dbConn);
    } else {
      echo "<script>alert(\"Билетът е закупен успешно!\");</script>";
      echo "<script>window.location.href='buytickets.php'</script>";
    }
  }
  ?>
</body>

</html>