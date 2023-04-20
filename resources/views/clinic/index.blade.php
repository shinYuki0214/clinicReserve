<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            予約状況(直近一週間)
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mx-auto">
                <div class="p-6 text-gray-900">

                    <table class="table-auto w-full whitespace-no-wrap text-center">
                        <thead>
                            <tr>
                                <th></th>
                                @for ($i = 0; $i < 7; $i++)
                                    <th
                                        class="p-4 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">
                                        {{ $today->copy()->addDay($i)->isoFormat('MM/DD(ddd)') }}
                                    </th>
                                @endfor
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < $todayRepeatTime; $i++)
                                <tr>
                                    <td>{{ $startTime + $i }}:00</td>

                                    @for ($index = 0; $index < 7; $index++)
                                        {{-- 時間と日付を元にreserveをチェックして表示 --}}
                                        @php
                                            $theWeek = date('w', strtotime('+' . $index . ' day'));
                                            $checkWeek = $weekPossible[$theWeek];
                                            $checkdate = date('Y-m-d', strtotime('+' . $index . ' day'));
                                            $_thedate = date('Y-m-d H:i', strtotime($checkdate . $startTime + $i . ':00'));
                                            $thedate = strtotime($_thedate);
                                        @endphp
                                        @foreach ($reservations as $reservation)
                                            @php
                                                $reseevedName = '';
                                                $reserved = false;
                                                $_reservedate = date('Y-m-d H:i', strtotime($reservation->date));
                                                $reservedate = strtotime($_reservedate);
                                            @endphp
                                            @if ($thedate == $reservedate)
                                                @php
                                                    $reserved = true;
                                                    $reseevedName = $reservation->name;
                                                    break;
                                                @endphp
                                            @endif
                                        @endforeach

                                        @if ($reserved)
                                            <td class="p-4">{{ $reseevedName }}様</td>
                                        @elseif($checkWeek)
                                            <td class="p-4">○</td>
                                        @else
                                            <td class="p-4">休</td>
                                        @endif
                                    @endfor
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
