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
    SELECT 32, 'https://www.google.com/maps/d/u/0/embed?mid=1KY_cVrpueRuGWGg0tYxl4OAmWH2d29Q&ehbc=2E312F'
    WHERE NOT EXISTS (SELECT * FROM all_lines where line_number = 32);";

    $queryResource = mysqli_query($dbConn, $sql);
    if (!$queryResource)
    {
        echo "Грешка при добавяне на записи.";
        echo mysqli_error($dbConn);
    }

    $sql=   "INSERT INTO all_lines(line_number, iframe_src)
    SELECT 22, 'https://www.google.com/maps/d/u/0/embed?mid=1T3H9RYNurZ-8d_kmjwz23idWqbj3a-I&ehbc=2E312F'
    WHERE NOT EXISTS (SELECT * FROM all_lines where line_number = 22);";

    $queryResource = mysqli_query($dbConn, $sql);
    if (!$queryResource)
    {
        echo "Грешка при добавяне на записи.";
        echo mysqli_error($dbConn);
    }

    $sql=   "INSERT INTO all_lines(line_number, iframe_src)
    SELECT 409, 'https://www.google.com/maps/d/u/0/embed?mid=1AnynKYAmFBrNXJkWetE_A3WiUrXeFEE&ehbc=2E312F'
    WHERE NOT EXISTS (SELECT * FROM all_lines where line_number = 409);";

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

    function insert_stop($stop_name, $dbConn)
    {
        $sql=   "INSERT INTO stops(stop_name)
        SELECT '$stop_name'
        WHERE NOT EXISTS (SELECT *FROM stops where stop_name = '$stop_name');";

        $queryResource = mysqli_query($dbConn, $sql);
        if (!$queryResource)
        {
            echo "Грешка при добавяне на записи.";
            echo mysqli_error($dbConn);
        }
    }

    insert_stop('Младост', $dbConn);
    insert_stop('Петър Берон', $dbConn);
    insert_stop('Васил Левски', $dbConn);
    insert_stop('Възраждане', $dbConn);
    insert_stop('Георги Раковски', $dbConn);
    insert_stop('Георги Бенковски', $dbConn);
    insert_stop('Христо Ботев', $dbConn);
    insert_stop('Овча Купел', $dbConn);
    insert_stop('Тракия', $dbConn);
    insert_stop('Катедрала', $dbConn);
    insert_stop('Девня', $dbConn);
    insert_stop('Белослав', $dbConn);
    insert_stop('Химик', $dbConn);
    insert_stop('Спортист', $dbConn);
    insert_stop('Иван Рилски', $dbConn);
    insert_stop('Поща', $dbConn);
    insert_stop('Център', $dbConn);
    insert_stop('Студентска', $dbConn);
    insert_stop('Стамболийски', $dbConn);
    insert_stop('Балкан', $dbConn);
    insert_stop('Изгрев', $dbConn);
    insert_stop('Летище', $dbConn);
    insert_stop('Борсата', $dbConn);
    insert_stop('Севастопол', $dbConn);
    insert_stop('Пикадили', $dbConn);
    insert_stop('Делфинариума', $dbConn);
    insert_stop('Акациите', $dbConn);
    insert_stop('Св. Никола', $dbConn);
    insert_stop('Миньор', $dbConn);
    insert_stop('Дървен Мост', $dbConn);
    insert_stop('Елпром', $dbConn);
    insert_stop('Пазара', $dbConn);
    insert_stop('Трафопост', $dbConn);
    insert_stop('Горска', $dbConn);
    insert_stop('Балкантурист', $dbConn);
    insert_stop('Траката', $dbConn);
    insert_stop('Спортна зала', $dbConn);
    insert_stop('Чайка', $dbConn);
    insert_stop('Зора', $dbConn);
    insert_stop('Спартак', $dbConn);
    

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
    function insert_stop_in_line($line_id, $stop_id, $dbConn)
    {
        $sql=   "INSERT INTO stops_in_line(line_id, stop_id)
        SELECT $line_id, $stop_id
        WHERE NOT EXISTS (SELECT *FROM stops_in_line where line_id = $line_id and stop_id = $stop_id);";

        $queryResource = mysqli_query($dbConn, $sql);
        if (!$queryResource)
        {
            echo "Грешка при добавяне на записи.";
            echo mysqli_error($dbConn);
        }
    }

    insert_stop_in_line(1, 1, $dbConn);
    insert_stop_in_line(1, 2, $dbConn);
    insert_stop_in_line(1, 3, $dbConn);
    insert_stop_in_line(1, 4, $dbConn);
    insert_stop_in_line(1, 5, $dbConn);
    insert_stop_in_line(1, 6, $dbConn);
    insert_stop_in_line(1, 7, $dbConn);
    insert_stop_in_line(1, 8, $dbConn);
    insert_stop_in_line(2, 9, $dbConn);
    insert_stop_in_line(2, 10, $dbConn);
    insert_stop_in_line(2, 11, $dbConn);
    insert_stop_in_line(2, 12, $dbConn); 
    insert_stop_in_line(2, 13, $dbConn);
    insert_stop_in_line(2, 14, $dbConn);
    insert_stop_in_line(2, 15, $dbConn);
    insert_stop_in_line(2, 16, $dbConn);
    insert_stop_in_line(3, 17, $dbConn);
    insert_stop_in_line(3, 18, $dbConn);
    insert_stop_in_line(3, 19, $dbConn);
    insert_stop_in_line(3, 20, $dbConn);
    insert_stop_in_line(3, 21, $dbConn);
    insert_stop_in_line(3, 22, $dbConn);
    insert_stop_in_line(3, 23, $dbConn);
    insert_stop_in_line(3, 24, $dbConn);
    insert_stop_in_line(4, 25, $dbConn);
    insert_stop_in_line(4, 26, $dbConn);
    insert_stop_in_line(4, 27, $dbConn);
    insert_stop_in_line(4, 28, $dbConn);
    insert_stop_in_line(4, 29, $dbConn);
    insert_stop_in_line(4, 30, $dbConn);
    insert_stop_in_line(4, 31, $dbConn);
    insert_stop_in_line(4, 32, $dbConn);
    insert_stop_in_line(5, 33, $dbConn);
    insert_stop_in_line(5, 34, $dbConn);
    insert_stop_in_line(5, 35, $dbConn);
    insert_stop_in_line(5, 36, $dbConn);
    insert_stop_in_line(5, 37, $dbConn);
    insert_stop_in_line(5, 38, $dbConn);
    insert_stop_in_line(5, 39, $dbConn);
    insert_stop_in_line(5, 40, $dbConn);

    // Създаване на таблица schedule
    $sql = "CREATE TABLE IF NOT EXISTS schedule
            (
            stop_id     INT(10)         NOT NULL,
            time        TIME            NOT NULL,
            PRIMARY KEY(stop_id, time)
            )
            ENGINE=INNODB DEFAULT CHARSET=utf8";
    
    $queryResource = mysqli_query($dbConn, $sql);
    if (!$queryResource)
    {
        echo "Грешка при създаване на таблицата.";
        echo mysqli_error($dbConn);
    }

    mysqli_select_db($dbConn, $dbName);

    // Добавяне на времената
    function insert_times_for_stop($stop_id, $start_time, $end_time, $interval, $dbConn)
    {
        $time = $start_time;

        while($time < $end_time)
        {
            $sql=   "INSERT INTO schedule(stop_id, time)
            SELECT $stop_id, '$time'
            WHERE NOT EXISTS (SELECT *FROM schedule where stop_id = $stop_id and time = '$time');";

            $queryResource = mysqli_query($dbConn, $sql);
            if (!$queryResource)
            {
                echo "Грешка при добавяне на записи.";
                echo mysqli_error($dbConn);
            }

            $time = date('H:i:s', strtotime($time. $interval));
        }
    }

    insert_times_for_stop(1, '06:00:00', '22:00:00', ' +15 minutes',  $dbConn);
    insert_times_for_stop(2, '06:05:00', '22:00:00', ' +15 minutes',  $dbConn);
    insert_times_for_stop(3, '06:10:00', '22:00:00', ' +15 minutes',  $dbConn);
    insert_times_for_stop(4, '06:15:00', '22:00:00', ' +15 minutes',  $dbConn);
    insert_times_for_stop(5, '06:20:00', '22:00:00', ' +15 minutes',  $dbConn);
    insert_times_for_stop(6, '06:25:00', '22:00:00', ' +15 minutes',  $dbConn);
    insert_times_for_stop(7, '06:30:00', '22:00:00', ' +15 minutes',  $dbConn);
    insert_times_for_stop(8, '06:35:00', '22:00:00', ' +15 minutes',  $dbConn);

    insert_times_for_stop(9, '06:00:00', '22:00:00', ' +7 minutes',  $dbConn);
    insert_times_for_stop(10, '06:10:00', '22:00:00', ' +7 minutes',  $dbConn);
    insert_times_for_stop(11, '06:20:00', '22:00:00', ' +7 minutes',  $dbConn);
    insert_times_for_stop(12, '06:30:00', '22:00:00', ' +7 minutes',  $dbConn);
    insert_times_for_stop(13, '06:40:00', '22:00:00', ' +7 minutes',  $dbConn);
    insert_times_for_stop(14, '06:50:00', '22:00:00', ' +7 minutes',  $dbConn);
    insert_times_for_stop(15, '07:00:00', '22:00:00', ' +7 minutes',  $dbConn);
    insert_times_for_stop(16, '07:10:00', '22:00:00', ' +7 minutes',  $dbConn);

    insert_times_for_stop(17, '06:00:00', '22:00:00', ' +6 minutes',  $dbConn);
    insert_times_for_stop(18, '06:04:00', '22:00:00', ' +6 minutes',  $dbConn);
    insert_times_for_stop(19, '06:08:00', '22:00:00', ' +6 minutes',  $dbConn);
    insert_times_for_stop(20, '06:12:00', '22:00:00', ' +6 minutes',  $dbConn);
    insert_times_for_stop(21, '06:16:00', '22:00:00', ' +6 minutes',  $dbConn);
    insert_times_for_stop(22, '06:22:00', '22:00:00', ' +6 minutes',  $dbConn);
    insert_times_for_stop(23, '07:28:00', '22:00:00', ' +6 minutes',  $dbConn);
    insert_times_for_stop(24, '07:34:00', '22:00:00', ' +6 minutes',  $dbConn);
    
    insert_times_for_stop(25, '06:11:00', '22:00:00', ' +9 minutes',  $dbConn);
    insert_times_for_stop(26, '06:22:00', '22:00:00', ' +9 minutes',  $dbConn);
    insert_times_for_stop(27, '06:33:00', '22:00:00', ' +9 minutes',  $dbConn);
    insert_times_for_stop(28, '06:44:00', '22:00:00', ' +9 minutes',  $dbConn);
    insert_times_for_stop(29, '06:55:00', '22:00:00', ' +9 minutes',  $dbConn);
    insert_times_for_stop(30, '07:06:00', '22:00:00', ' +9 minutes',  $dbConn);
    insert_times_for_stop(31, '07:17:00', '22:00:00', ' +9 minutes',  $dbConn);
    insert_times_for_stop(32, '07:28:00', '22:00:00', ' +9 minutes',  $dbConn);

    insert_times_for_stop(33, '06:09:00', '22:00:00', ' +8 minutes',  $dbConn);
    insert_times_for_stop(34, '06:18:00', '22:00:00', ' +8 minutes',  $dbConn);
    insert_times_for_stop(35, '06:27:00', '22:00:00', ' +8 minutes',  $dbConn);
    insert_times_for_stop(36, '06:36:00', '22:00:00', ' +8 minutes',  $dbConn);
    insert_times_for_stop(37, '06:45:00', '22:00:00', ' +8 minutes',  $dbConn);
    insert_times_for_stop(38, '06:54:00', '22:00:00', ' +8 minutes',  $dbConn);
    insert_times_for_stop(39, '07:03:00', '22:00:00', ' +8 minutes',  $dbConn);
    insert_times_for_stop(40, '07:09:00', '22:00:00', ' +8 minutes',  $dbConn);
    ?>
