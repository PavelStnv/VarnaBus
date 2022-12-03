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
    SELECT 'Обикновен'
    WHERE NOT EXISTS (SELECT *FROM tickets where ticket_type = 'Обикновен');";

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

    // Създаване на таблица tickets
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
?>
