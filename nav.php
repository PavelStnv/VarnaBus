<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">
        <img src="https://www.freeiconspng.com/thumbs/bus-icon/bus-stop-symbol-icon-28.png" alt="" width="30"
          height="24" class="d-inline-block align-text-top">
        VarnaBus</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="buytickets.php">Закупуване на билети</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Разписание
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="stopsonmap.php">Спирки</a></li>
              <li><a class="dropdown-item" href="schedule.php">График</a></li>
              <!--<li><hr class="dropdown-divider"></li>-->
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="map.php">Карта</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="news.php">Новини</a>
          </li>
        </ul>

        <?php
          session_start();

          if(isset($_SESSION['name']))
          {
            echo "<div class=\"nav-item dropdown\">";
            echo "<a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdown\" role=\"button\" data-bs-toggle=\"dropdown\"";
            echo   "aria-expanded=\"false\">";
            echo   "Здравей, {$_SESSION['name']}";
            echo "</a>";
            echo "<ul class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">";
            echo   "<li><a class=\"dropdown-item\" href=\"#\">Закупени билети</a></li>";
            echo   "<!--<li><hr class=\"dropdown-divider\"></li>-->";
            echo "</ul>";
            echo "</div>";


            echo "<div class=\"me-3\">";
            echo "<a class=\"link-dark\" aria-current=\"page\" href=\"logout.php\">Изход</a>";
            echo "</div>";
          }
          else
          {
            echo "<div class=\"me-3\">";
            echo "<a class=\"link-dark\" aria-current=\"page\" href=\"login.php\">Вход</a>";
            echo "</div>";

            echo "<form action=\"register.php\">";
            echo     "<button class=\"btn btn-outline-primary\" type=\"submit\">Регистрация</button>";
            echo "</form>";
          }
        ?>
         
      </div>
    </div>
  </nav>