<x-reserve-guest>
    <x-slot name="header">
        <a href="{{route('reservation.index', ['id'=>$id])}}" class="font-semibold text-xl text-gray-800 leading-tight">
            {{$clinicName}}  予約
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mx-auto w-96">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('reservation.store', ['id' => $id]) }}" method="post">
                        @csrf

                        <div class="p-2">
                            <div class="relative">
                                <label for="date" class="leading-7 text-sm text-gray-600">診療日時</label>
                                <input type="text" id="date" name="date" value="{{ $dateData }}"
                                    readonly
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <x-input-error :messages="$errors->get('date')" class="mt-2" ></x-input-error>
                                </div>
                        </div>
                        <div class="p-2">
                            <div class="relative">
                                <label for="name" class="leading-7 text-sm text-gray-600">お名前</label>
                                <input type="text" id="name" name="name"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" ></x-input-error>
                            
                                </div>
                        </div>
                        <div class="p-2">
                            <div class="relative">
                                <label for="email" class="leading-7 text-sm text-gray-600">メールアドレス</label>
                                <input type="email" id="email" name="email"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" ></x-input-error>
                            
                                </div>
                        </div>
                        <div class="p-2">
                            <div class="relative">
                                <label for="tel" class="leading-7 text-sm text-gray-600">電話番号</label>
                                <input type="tel" id="tel" name="tel"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    <x-input-error :messages="$errors->get('tel')" class="mt-2" ></x-input-error>
                                </div>
                        </div>
                        <div class="p-2 w-full">
                            <button
                                class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">予約</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </x-app-layout>
