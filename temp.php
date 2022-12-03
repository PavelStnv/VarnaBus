$("#student").click(function () {
            let loggedIn = "<?php echo checkIfLoggedIn()?>";
            if(loggedIn != 1)
            {
                alert("Не сте влезли в профила си!");
                const modal = document.getElementById("exampleModal");
                modal.setAttribute("hidden", "");
                location.reload();
                return;
            }

            // let canContinue = "<?php echo checkIfTicketAlreadyBought(1)?>";
            // if(canContinue != 1)
            // {
            //     alert("Вече имате закупен билет!");
            //     const modal = document.getElementById("exampleModal");
            //     modal.setAttribute("hidden", "");
            //     location.reload();
            //     return;
            // }

            const button = document.getElementById("finalButton");
            button.setAttribute("name", "buystudent");

            var str = "Закупете билет за студенти";
            $("#data").html(str);
            $("#finalButton").html(str);
		});

    
    $("#student2").click(function () {
            let loggedIn = "<?php echo checkIfLoggedIn()?>";
            if(loggedIn != 1)
            {
                alert("Не сте влезли в профила си!");
                const modal = document.getElementById("exampleModal");
                modal.setAttribute("hidden", "");
                location.reload();
                return;
            }

            let canContinue = "<?php echo checkIfTicketAlreadyBought(1)?>";
            if(canContinue != 1)
            {
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

        $("#pensioner").click(function () {
            let loggedIn = "<?php echo checkIfLoggedIn()?>";
            if(loggedIn != 1)
            {
                alert("Не сте влезли в профила си!");
                const modal = document.getElementById("exampleModal");
                modal.setAttribute("hidden", "");
                location.reload();
                return;
            }

            let canContinue = "<?php echo checkIfTicketAlreadyBought(2)?>";
            if(canContinue != 1)
            {
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

    $("#pensioner2").click(function () {
            let loggedIn = "<?php echo checkIfLoggedIn()?>";
            if(loggedIn != 1)
            {
                alert("Не сте влезли в профила си!");
                const modal = document.getElementById("exampleModal");
                modal.setAttribute("hidden", "");
                location.reload();
                return;
            }

            let canContinue = "<?php echo checkIfTicketAlreadyBought(2)?>";
            if(canContinue != 1)
            {
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

        $("#normal").click(function () {
            let loggedIn = "<?php echo checkIfLoggedIn()?>";
            if(loggedIn != 1)
            {
                alert("Не сте влезли в профила си!");
                const modal = document.getElementById("exampleModal");
                modal.setAttribute("hidden", "");
                location.reload();
                return;
            }

            let canContinue = "<?php echo checkIfTicketAlreadyBought(3)?>";
            if(canContinue != 1)
            {
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

          $("#normal2").click(function () {
            let loggedIn = "<?php echo checkIfLoggedIn()?>";
            if(loggedIn != 1)
            {
                alert("Не сте влезли в профила си!");
                const modal = document.getElementById("exampleModal");
                modal.setAttribute("hidden", "");
                location.reload();
                return;
            }

            let canContinue = "<?php echo checkIfTicketAlreadyBought(3)?>";
            if(canContinue != 1)
            {
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

        $("#allDay").click(function () {
            let loggedIn = "<?php echo checkIfLoggedIn()?>";
            if(loggedIn != 1)
            {
                alert("Не сте влезли в профила си!");
                const modal = document.getElementById("exampleModal");
                modal.setAttribute("hidden", "");
                location.reload();
                return;
            }

            let canContinue = "<?php echo checkIfTicketAlreadyBought(4)?>";
            if(canContinue != 1)
            {
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

    $("#allDay2").click(function () {
            let loggedIn = "<?php echo checkIfLoggedIn()?>";
            if(loggedIn != 1)
            {
                alert("Не сте влезли в профила си!");
                const modal = document.getElementById("exampleModal");
                modal.setAttribute("hidden", "");
                location.reload();
                return;
            }

            let canContinue = "<?php echo checkIfTicketAlreadyBought(4)?>";
            if(canContinue != 1)
            {
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