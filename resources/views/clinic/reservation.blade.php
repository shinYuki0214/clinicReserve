<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            予約者一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mx-auto">
                <div class="p-6 text-gray-900">

                    <table class="table-auto w-full whitespace-no-wrap text-center">
                        <thead>
                            <tr>
                                <th class="p-4 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">予約日</th>
                                <th class="p-4 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">名前</th>
                                <th class="p-4 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">電話番号</th>
                                <th class="p-4 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">メールアドレス</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservations as $reservation)
                            <tr>
                                <td class="p-4">
                                    {{$reservation->date}}
                                </td>
                                <td class="p-4">
                                    {{$reservation->name}}
                                </td>
                                <td class="p-4">
                                    {{$reservation->tel}}
                                </td>
                                <td class="p-4">
                                    {{$reservation->email}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
