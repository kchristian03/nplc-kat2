@extends('player.layouts.app')

@section('title',"Rally Game")

@section('script')
<script>

</script>
@endsection
@section('content')
<div class="countdown-container">
    <div class="countdown-display">
      <span id="minutes">{{ $pos->time }}</span>:<span id="seconds">00</span>
    </div>
    <button id="start-countdown">Start Countdown</button>
  </div>
@endsection
@section('footscript')
  <script>
  const minutesElement = document.getElementById('minutes');
  const secondsElement = document.getElementById('seconds');
  let intervalId;

  const validateMinutes = (value) => {
    if (isNaN(value) || value < 0) {
      // Handle invalid input (e.g., show error message)
      return false;
    }
    return Math.floor(value);
  };

  const startCountdownButton = document.getElementById('start-countdown');
  startCountdownButton.addEventListener('click', () => {
    const targetMinutes = validateMinutes({{ $pos->time }});
    if (!targetMinutes || intervalId) {
      return; // Do nothing if invalid or already running
    }

    const now = new Date();
    const targetDate = new Date(now.getFullYear(), now.getMonth(), now.getDate(), now.getHours(), now.getMinutes() + targetMinutes);

    intervalId = setInterval(() => {
      const difference = targetDate - new Date();
      const seconds = Math.floor((difference / 1000) % 60);

      minutesElement.textContent = Math.floor(difference / (1000 * 60)).toString().padStart(2, '0');
      secondsElement.textContent = seconds.toString().padStart(2, '0');

      if (difference <= 0) {
        clearInterval(intervalId);
        minutesElement.textContent = '00';
        secondsElement.textContent = '00';
        // Add your action here when the countdown is finished
      }
    }, 1000);
  });
  </script>
@endsection

