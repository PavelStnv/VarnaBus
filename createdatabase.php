<?php
    require "connecttoserver.php"; // За връзка със сървъра

    // Създаване на базата
    $sql = 'CREATE Database IF NOT EXISTS VarnaBus';
    
    $queryResource = mysqli_query($dbConn, $sql);
    if (!$queryResource)
    {
        echo "Грешка при създаване на базата данни.";
    }
    
    $dbName= 'VarnaBus';
    mysqli_select_db($dbConn, $dbName);

    // Създаване на таблица users
    $sql = "CREATE TABLE IF NOT EXISTS users
            (
            id          INT(10)         NOT NULL AUTO_INCREMENT,
            email       VARCHAR(64)     NOT NULL UNIQUE,
            name        VARCHAR(64)     NOT NULL,
            password    VARCHAR(64)     NOT NULL,
            PRIMARY KEY(id)
            )
            ENGINE=INNODB DEFAULT CHARSET=utf8";
    
    $queryResource = mysqli_query($dbConn, $sql);
    if (!$queryResource)
    {
        echo "Грешка при създаване на таблицата.";
        echo mysqli_error($dbConn);
    }

    mysqli_select_db($dbConn, $dbName);

    // Създаване на таблица tickets
    $sql = "CREATE TABLE IF NOT EXISTS tickets
            (
            id          INT(10)         NOT NULL AUTO_INCREMENT,
            ticket_type VARCHAR(16)     NOT NULL,
            PRIMARY KEY(id)
            )
            ENGINE=INNODB DEFAULT CHARSET=utf8";
    
    $queryResource = mysqli_query($dbConn, $sql);
    if (!$queryResource)
    {
        echo "Грешка при създаване на таблицата.";
        echo mysqli_error($dbConn);
    }

    mysqli_select_db($dbConn, $dbName);

    // Добавяне на типовете билети (само веднъж е направено да се изпълнява)

    $sql=   "INSERT INTO tickets(ticket_type)
    SELECT 'За студенти'
    WHERE NOT EXISTS (SELECT *FROM tickets where ticket_type = 'За студенти');";

    $queryResource = mysqli_query($dbConn, $sql);
    if (!$queryResource)
    {
        echo "Грешка при добавяне на записи.";
        echo mysqli_error($dbConn);
    }

    $sql=   "INSERT INTO tickets(ticket_type)
    SELECT 'За пенсионери'
    WHERE NOT EXISTS (SELECT *FROM tickets where ticket_type = 'За пенсионери');";

    $queryResource = mysqli_query($dbConn, $sql);
    if (!$queryResource)
    {
        echo "Грешка при добавяне на записи.";
        echo mysqli_error($dbConn);
    }

    $sql=   "INSERT INTO tickets(ticket_type)
    SELECT 'Стандартен'
    WHERE NOT EXISTS (SELECT *FROM tickets where ticket_type = 'Стандартен');";

    $queryResource = mysqli_query($dbConn, $sql);
    if (!$queryResource)
    {
        echo "Грешка при добавяне на записи.";
        echo mysqli_error($dbConn);
    }

    $sql=   "INSERT INTO tickets(ticket_type)
    SELECT 'За цял ден'
    WHERE NOT EXISTS (SELECT *FROM tickets where ticket_type = 'За цял ден');";

    $queryResource = mysqli_query($dbConn, $sql);
    if (!$queryResource)
    {
        echo "Грешка при добавяне на записи.";
        echo mysqli_error($dbConn);
    }

    mysqli_select_db($dbConn, $dbName);

    $sql=   "INSERT INTO tickets(ticket_type)
    SELECT 'За двама'
    WHERE NOT EXISTS (SELECT *FROM tickets where ticket_type = 'За двама');";

    $queryResource = mysqli_query($dbConn, $sql);
    if (!$queryResource)
    {
        echo "Грешка при добавяне на записи.";
        echo mysqli_error($dbConn);
    }

    $sql=   "INSERT INTO tickets(ticket_type)
    SELECT 'За трима'
    WHERE NOT EXISTS (SELECT *FROM tickets where ticket_type = 'За трима');";

    $queryResource = mysqli_query($dbConn, $sql);
    if (!$queryResource)
    {
        echo "Грешка при добавяне на записи.";
        echo mysqli_error($dbConn);
    }

    // Създаване на таблица bought_tickets
    $sql = "CREATE TABLE IF NOT EXISTS bought_tickets
            (
            user_id     INT(10)     NOT NULL,
            ticket_id   INT(10)     NOT NULL,
            purchased   DATETIME    NOT NULL,
            valid_until DATETIME    NOT NULL
            )
            ENGINE=INNODB DEFAULT CHARSET=utf8";
    
    $queryResource = mysqli_query($dbConn, $sql);
    if (!$queryResource)
    {
        echo "Грешка при създаване на таблицата.";
        echo mysqli_error($dbConn);
    }

    mysqli_select_db($dbConn, $dbName);


    // Създаване на таблица lines
    $sql = "CREATE TABLE IF NOT EXISTS all_lines
            (
            id          INT(10)         NOT NULL AUTO_INCREMENT,
            line_number INT(10)         NOT NULL,
            iframe_src  VARCHAR(200)    NOT NULL,
            PRIMARY KEY(id)
            )
            ENGINE=INNODB DEFAULT CHARSET=utf8";
    
    $queryResource = mysqli_query($dbConn, $sql);
    if (!$queryResource)
    {
        echo "Грешка при създаване на таблицата.";
        echo mysqli_error($dbConn);
    }

    mysqli_select_db($dbConn, $dbName);

    //Добавяне на данни в таблица all_lines
    $sql=   "INSERT INTO all_lines(line_number, iframe_src)
    SELECT 148, 'https://www.google.com/maps/d/u/0/embed?mid=19WunKtI4hDdG5guylrT4DG6n7kzj3pA&ehbc=2E312F'
    WHERE NOT EXISTS (SELECT * FROM all_lines where line_number = 148);";

    $queryResource = mysqli_query($dbConn, $sql);
    if (!$queryResource)
    {
        echo "Грешка при добавяне на записи.";
        echo mysqli_error($dbConn);
    }

    $sql=   "INSERT INTO all_lines(line_number, iframe_src)
    SELECT 7, 'https://www.google.com/maps/d/u/0/embed?mid=1SLGfZCG-k-eUNQOk7aF35Br67iMqJ74&ehbc=2E312F'
    WHERE NOT EXISTS (SELECT * FROM all_lines where line_number = 7);";

    $queryResource = mysqli_query($dbConn, $sql);
    if (!$queryResource)
    {
        echo "Грешка при добавяне на записи.";
        echo mysqli_error($dbConn);
    }

    $sql=   "INSERT INTO all_lines(line_number, iframe_src)
    SELECT 32, 'test'
    WHERE NOT EXISTS (SELECT * FROM all_lines where line_number = 32);";

    $queryResource = mysqli_query($dbConn, $sql);
    if (!$queryResource)
    {
        echo "Грешка при добавяне на записи.";
        echo mysqli_error($dbConn);
    }

    mysqli_select_db($dbConn, $dbName);


    // Създаване на таблица stops
    $sql = "CREATE TABLE IF NOT EXISTS stops
            (
            id          INT(10)         NOT NULL AUTO_INCREMENT,
            stop_name   VARCHAR(16)     NOT NULL,
            PRIMARY KEY(id)
            )
            ENGINE=INNODB DEFAULT CHARSET=utf8";
    
    $queryResource = mysqli_query($dbConn, $sql);
    if (!$queryResource)
    {
        echo "Грешка при създаване на таблицата.";
        echo mysqli_error($dbConn);
    }

    mysqli_select_db($dbConn, $dbName);

    // Добавяне на спирките
    $sql=   "INSERT INTO stops(stop_name)
    SELECT 'Младост'
    WHERE NOT EXISTS (SELECT *FROM stops where stop_name = 'Младост');";

    $queryResource = mysqli_query($dbConn, $sql);
    if (!$queryResource)
    {
        echo "Грешка при добавяне на записи.";
        echo mysqli_error($dbConn);
    }

    $sql=   "INSERT INTO stops(stop_name)
    SELECT 'Петър Берон'
    WHERE NOT EXISTS (SELECT *FROM stops where stop_name = 'Петър Берон');";

    $queryResource = mysqli_query($dbConn, $sql);
    if (!$queryResource)
    {
        echo "Грешка при добавяне на записи.";
        echo mysqli_error($dbConn);
    }

    $sql=   "INSERT INTO stops(stop_name)
    SELECT 'Васил Левски'
    WHERE NOT EXISTS (SELECT *FROM stops where stop_name = 'Васил Левски');";

    $queryResource = mysqli_query($dbConn, $sql);
    if (!$queryResource)
    {
        echo "Грешка при добавяне на записи.";
        echo mysqli_error($dbConn);
    }

    $sql=   "INSERT INTO stops(stop_name)
    SELECT 'Възраждане'
    WHERE NOT EXISTS (SELECT *FROM stops where stop_name = 'Възраждане');";

    $queryResource = mysqli_query($dbConn, $sql);
    if (!$queryResource)
    {
        echo "Грешка при добавяне на записи.";
        echo mysqli_error($dbConn);
    }

    $sql=   "INSERT INTO stops(stop_name)
    SELECT 'Георги Раковски'
    WHERE NOT EXISTS (SELECT *FROM stops where stop_name = 'Георги Раковски');";

    $queryResource = mysqli_query($dbConn, $sql);
    if (!$queryResource)
    {
        echo "Грешка при добавяне на записи.";
        echo mysqli_error($dbConn);
    }

    // Създаване на таблица stops_in_line
    $sql = "CREATE TABLE IF NOT EXISTS stops_in_line
            (
            line_id     INT(10)         NOT NULL,
            stop_id     INT(10)         NOT NULL,
            PRIMARY KEY(line_id, stop_id)
            )
            ENGINE=INNODB DEFAULT CHARSET=utf8";
    
    $queryResource = mysqli_query($dbConn, $sql);
    if (!$queryResource)
    {
        echo "Грешка при създаване на таблицата.";
        echo mysqli_error($dbConn);
    }

    mysqli_select_db($dbConn, $dbName);

    // Добавяне на спирките и линиите
    $sql=   "INSERT INTO stops_in_line(line_id, stop_id)
    SELECT 1, 1
    WHERE NOT EXISTS (SELECT *FROM stops_in_line where line_id = 1 and stop_id = 1);";

    $queryResource = mysqli_query($dbConn, $sql);
    if (!$queryResource)
    {
        echo "Грешка при добавяне на записи.";
        echo mysqli_error($dbConn);
    }

    $sql=   "INSERT INTO stops_in_line(line_id, stop_id)
    SELECT 1, 2
    WHERE NOT EXISTS (SELECT *FROM stops_in_line where line_id = 1 and stop_id = 2);";

    $queryResource = mysqli_query($dbConn, $sql);
    if (!$queryResource)
    {
        echo "Грешка при добавяне на записи.";
        echo mysqli_error($dbConn);
    }

    $sql=   "INSERT INTO stops_in_line(line_id, stop_id)
    SELECT 1, 3
    WHERE NOT EXISTS (SELECT *FROM stops_in_line where line_id = 1 and stop_id = 3);";

    $queryResource = mysqli_query($dbConn, $sql);
    if (!$queryResource)
    {
        echo "Грешка при добавяне на записи.";
        echo mysqli_error($dbConn);
    }

    $sql=   "INSERT INTO stops_in_line(line_id, stop_id)
    SELECT 2, 4
    WHERE NOT EXISTS (SELECT *FROM stops_in_line where line_id = 2 and stop_id = 4);";

    $queryResource = mysqli_query($dbConn, $sql);
    if (!$queryResource)
    {
        echo "Грешка при добавяне на записи.";
        echo mysqli_error($dbConn);
    }

    $sql=   "INSERT INTO stops_in_line(line_id, stop_id)
    SELECT 2, 5
    WHERE NOT EXISTS (SELECT *FROM stops_in_line where line_id = 2 and stop_id = 5);";

    $queryResource = mysqli_query($dbConn, $sql);
    if (!$queryResource)
    {
        echo "Грешка при добавяне на записи.";
        echo mysqli_error($dbConn);
    }
    ?>
