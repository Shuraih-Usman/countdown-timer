<?php
    if (isset($_POST['submit'])) {
        $countdownDate = strtotime($_POST['datetime']);
        $currentDate = time();
        
        if ($countdownDate > $currentDate) {
            $timeDifference = $countdownDate - $currentDate;
            $days = floor($timeDifference / (60 * 60 * 24));
            $hours = floor(($timeDifference % (60 * 60 * 24)) / (60 * 60));
            $minutes = floor(($timeDifference % (60 * 60)) / 60);
            $seconds = $timeDifference % 60;
            $success = "You count Down has started";
        } else {
            $error = 'Please select a future date and time.';
        }
    }
    ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CountDown Timer</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>

<h1 style="color:#fff;">Countdown Timer</h1>
<div class="container">


    <div class="wrapper">
        <div class="left-column">
            <h3>Select Date / Time</h3>
            <br>
          
            <form method="post">
            <input type="datetime-local" name="datetime">
                <button type="submit" name="submit">START</button>
            </form>
            <?php
                if (isset($error)) {
                    echo "<div class='alert'>$error</div>";
                } else if(isset($success)) {
                    echo "<div class='alert'>$success</div>";
                }
            ?>
        </div>
        <div class="right-column">
        <div id="countdown">
            <div class="countdown-timer">
                <span id="days">00</span> 
            </div>
            <div class="countdown-timer">
                <span id="hours">00</span> 
            </div>
            <div class="countdown-timer">
                <span id="minutes">00</span> 
            </div>
            <div class="countdown-timer">
                <span id="seconds">00</span> 
            </div><br>
           
        </div>
        <div class="textflex">
        <div class="hrs">Days</div>
            <div class="hrs">Hours</div>
            <div class="hrs">Minutes</div>
            <div class="hrs">Seconds</div>
        </div>
        </div>
    </div>
  
</div>
</body>
</html>





















 
    <script>
        <?php
        if (isset($timeDifference)) {
            echo "startCountdown($timeDifference);";
        }
        ?>

        function startCountdown(timeDifference) {
            const daysElement = document.getElementById('days');
            const hoursElement = document.getElementById('hours');
            const minutesElement = document.getElementById('minutes');
            const secondsElement = document.getElementById('seconds');

            const countdownInterval = setInterval(function () {
                const days = Math.floor(timeDifference / (60 * 60 * 24));
                const hours = Math.floor((timeDifference % (60 * 60 * 24)) / (60 * 60));
                const minutes = Math.floor((timeDifference % (60 * 60)) / 60);
                const seconds = timeDifference % 60;

                daysElement.textContent = formatTime(days);
                hoursElement.textContent = formatTime(hours);
                minutesElement.textContent = formatTime(minutes);
                secondsElement.textContent = formatTime(seconds);

                if (timeDifference <= 0) {
                    clearInterval(countdownInterval);
                }

                timeDifference -= 1;
            }, 1000);
        }

        function formatTime(time) {
            return time < 10 ? `0${time}` : time;
        }
    </script>
</body>
</html>
