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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

  <!-- за nav bar-a-->
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script> 
  <link rel="shortcut icon" href="icons/Iconshock-Real-Vista-Transportation-School-bus.ico"/>

<!-- За modal dialog -->
<script src=
"https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
		integrity=
"sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
		crossorigin="anonymous">
	</script>

</head>

<body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
    crossorigin="anonymous"></script>

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
    <div class="col-lg-3 col-md-12 mb-3">

        <div class="row">
          <h2 class="text-center">Купете билет</h2>
        </div>

        <div class="row">
          <div class="col-lg-6 col-md-12 mb-0 g-3 col-sm-12">
          <button type="submit" disabled id="student" name="buystudent"  class="btn btn-lg w-100 btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Студентски</button>
          </div>
          <div class="col-lg-6 col-md-12 mb-0 g-3 col-sm-12">
          <button type="submit" disabled name="buypensioner" id="pensioner" class="btn w-100 btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">Пенсионерски</button>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6 col-md-12 mb-0 g-3 col-sm-12">
          <button type="submit" disabled name="buynormal" id="normal" class="btn w-100 btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">Стандартен</button>
          </div>
          <div class="col-lg-6 col-md-12 mb-0 g-3 col-sm-12">
          <button type="submit" disabled name="buyallday" class="btn btn-primary w-100 btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal" id="allDay">За цял ден</button>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6 col-md-12 mb-0 g-3 col-sm-12">
            <button type="button" disabled name="buyfortwo" id="fortwo" class="btn btn-primary btn-lg w-100" data-bs-toggle="modal" data-bs-target="#exampleModal">За двама</button>
          </div>
          <div class="col-lg-6 col-md-12 mb-0 g-3 col-sm-12">
            <button type="button" disabled name="buyforthree" id="forthree" class="btn btn-primary btn-lg w-100" data-bs-toggle="modal" data-bs-target="#exampleModal">За трима</button>
          </div>
        </div>

    </div>
      
    <div class="col-lg-9 col-md-12">
      <img src="images/mangopear-creative-A3xpZYjAZyk-unsplash.jpg" class="img-fluid rounded" alt="...">
    </div>
  </div>
</div>

  <!--footer-->
<div class="mt-2">
<div id="footer"></div>
  <script>
  $(function(){
    $("#footer").load("footer.php");
  });
  </script>
<!--end of footer-->




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
          <p class="text-start" id="price">Цена:</p>
          <button type="submit" id="finalButton" name="none" class="btn btn-primary"></button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмяна</button>
        </div>

          </form>
        </div>
      </div>
    </div>
  </div>



  <?php
      // session_start();

      include_once "connecttoserver.php"; // За връзка със сървъра 
      include_once "createdatabase.php"; // За създаване на базата данни
  ?>

<script>
$(document).ready(function(){
    $('button').attr('disabled',false);
});
</script>

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
    $("#fortwo").click(function() {
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
    $("#forthree").click(function() {
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

      const price = document.getElementById("price");
      str = "<b>Цена: 1.50лв.</b>";
      $("#price").html(str);
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

      const price = document.getElementById("price");
      str = "<b>Цена: 1.50лв.</b>";
      $("#price").html(str);
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

      var str = "Закупете стандартен билет";
      $("#data").html(str);
      $("#finalButton").html(str);

      const price = document.getElementById("price");
      str = "<b>Цена: 2.00лв.</b>";
      $("#price").html(str);
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

      const price = document.getElementById("price");
      str = "<b>Цена: 10.00лв.</b>";
      $("#price").html(str);
    });
  </script>

<script>
    $("#fortwo").click(function() {
      let canContinue = "<?php echo checkIfTicketAlreadyBought(5) ?>";
      if (canContinue != 1) {
        alert("Вече имате закупен билет!");
        const modal = document.getElementById("exampleModal");
        modal.setAttribute("hidden", "");
        location.reload();
        return;
      }

      const button = document.getElementById("finalButton");
      button.setAttribute("name", "buyfortwo");

      var str = "Закупете билет за двама";
      $("#data").html(str);
      $("#finalButton").html(str);

      const price = document.getElementById("price");
      str = "<b>Цена: 2.90лв.</b>";
      $("#price").html(str);
    });
  </script>

<script>
    $("#forthree").click(function() {
      let canContinue = "<?php echo checkIfTicketAlreadyBought(6) ?>";
      if (canContinue != 1) {
        alert("Вече имате закупен билет!");
        const modal = document.getElementById("exampleModal");
        modal.setAttribute("hidden", "");
        location.reload();
        return;
      }

      const button = document.getElementById("finalButton");
      button.setAttribute("name", "buyforthree");

      var str = "Закупете билет за трима";
      $("#data").html(str);
      $("#finalButton").html(str);

      const price = document.getElementById("price");
      str = "<b>Цена: 5.50лв.</b>";
      $("#price").html(str);
    });
  </script>


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

  if (isset($_POST['buyfortwo'])) {
    $cardnum = $_POST['cardnum'];
    $cardname = $_POST['cardname'];
    $carddate = $_POST['valid'];
    $cardcvcode = $_POST['cvcode'];
    BuyTicket(5);
  }

  if (isset($_POST['buyforthree'])) {
    $cardnum = $_POST['cardnum'];
    $cardname = $_POST['cardname'];
    $carddate = $_POST['valid'];
    $cardcvcode = $_POST['cvcode'];
    BuyTicket(6);
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
    $can_continue = True;

    require "connecttoserver.php"; // За връзка със сървъра 
    require "createdatabase.php"; // За създаване на базата данни

    date_default_timezone_set('Europe/Sofia');
    $date = date('Y-m-d H:i:s a', time());

    $user_id = $_SESSION['id'];

    $sql = "SELECT * FROM bought_tickets
        WHERE user_id = $user_id
        AND ticket_id = $ticket_type
        order by valid_until desc";

    $result = mysqli_query($dbConn, $sql);
    $row = mysqli_num_rows($result);

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
      echo "<script>window.location.href='index.php'</script>";
    }
  }
  ?>


</body>

</html>