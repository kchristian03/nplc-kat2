<div class="w-full grid grid-col-1">
<div class="card m-10 bg-gradient-to-br from-gray-600 to-gray-500 rounded drop-shadow-md">
    <div class=" m-2 block max-w-full p-4 bg-sky-500/90 rounded shadow dark:bg-sky-500/90">

        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-100 dark:text-gray-700">{{ $teamData->name}}</h5>
        <p class="font-normal text-gray-100 dark:text-gray-700">Coin: {{ $teamData->coin }}</p>
        <p class="font-normal text-gray-100 dark:text-gray-700">Exp: {{ $teamData->exp }}</p>
        <p class="font-normal text-gray-100 dark:text-gray-700">score: {{ $teamData->score }}</p>
        <div class="flex justify-center gap-4 mt-2">
            @foreach($teamData->itemusage as $itemusage)
            @if($itemusage->code == "COIN")
                <div id="COIN" data-duration="{{ $itemusage->duration }}"></div>
            @elseif($itemusage->code == "EXP")
                <div id="EXP" data-duration="{{ $itemusage->duration }}"></div>
            @endif
        @endforeach
          </div>


    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var coinElement = document.getElementById('COIN');
        if (coinElement) {
            var coinTime = coinElement.dataset.duration;
            if (coinTime != '') {
                startCountdown(coinTime, "COIN");
            }
        }

        var expElement = document.getElementById('EXP');
        if (expElement) {
            var expTime = expElement.dataset.duration;
            if (expTime != '') {
                startCountdown(expTime, "EXP");
            }
        }
    });
</script>
</div>
