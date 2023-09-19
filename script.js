document.addEventListener('DOMContentLoaded', function () {
    const countdownDateInput = document.getElementById('countdown-date');
    const startButton = document.getElementById('start-button');
    const daysElement = document.getElementById('days');
    const hoursElement = document.getElementById('hours');
    const minutesElement = document.getElementById('minutes');
    const secondsElement = document.getElementById('seconds');

    let countdownInterval;

    startButton.addEventListener('click', function () {
        const selectedDate = new Date(countdownDateInput.value).getTime();
        const currentDate = new Date().getTime();
        const timeDifference = selectedDate - currentDate;

        if (timeDifference > 0) {
            startCountdown(timeDifference);
        } else {
            alert('Please select a future date and time.');
        }
    });

    function startCountdown(timeDifference) {
        countdownInterval = setInterval(function () {
            const days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
            const hours = Math.floor((timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

            daysElement.textContent = formatTime(days);
            hoursElement.textContent = formatTime(hours);
            minutesElement.textContent = formatTime(minutes);
            secondsElement.textContent = formatTime(seconds);

            if (timeDifference <= 0) {
                clearInterval(countdownInterval);
            }

            timeDifference -= 1000;
        }, 1000);
    }

    function formatTime(time) {
        return time < 10 ? `0${time}` : time;
    }
});
