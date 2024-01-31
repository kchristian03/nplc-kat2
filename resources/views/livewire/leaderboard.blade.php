
<div wire:poll class="mx-6 mb-40 {{ strtotime(now())<= (strtotime($timeleft->game_duration)- 30 * 60) ? '' :'h-screen' }}">
    @if(strtotime(now())<= (strtotime($timeleft->game_duration)- 30 * 60))

    <div class="bg-slate-100 rounded py-4">
    <h2 class="w-full text-slate-900 text-center font-semibold">Leaderboard</h2>
    </div>
    <div class="relative overflow-x-auto rounded">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Rank
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Team
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Score
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teams as $index => $team)
                <tr class="bg-white">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $index+1 }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $team->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $team->score }}
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    @endif
</div>
