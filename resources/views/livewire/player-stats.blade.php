<div>
    <p>Team: {{ $teamData->name}}</p>
    <p>Coin: {{ $teamData->coin }}</p>
    <p>Exp: {{ $teamData->exp }}</p>
    <p>score: {{ $teamData->score }}</p>

    <div id="EXP"></div>
    <div id="COIN"></div>

    @foreach($teamData->itemusage as $itemusage)
    @if($itemusage->code == "COIN")
    <script>
        var coinTime = "{{ $itemusage->duration }}";
            if (coinTime != '') {
                startCountdown(coinTime, "COIN");
            }
    </script>
    @elseif($itemusage->code == "EXP")
    <script>
        var expTime = "{{ $itemusage->duration}}";
            if (expTime != '') {
                startCountdown(expTime, "EXP");
            }
    </script>
    @endif
    @endforeach
</div>
