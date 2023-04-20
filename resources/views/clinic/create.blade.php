<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            設定・新規作成
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg w-3/5 mx-auto">
                <div class="p-6 text-gray-900">
                    <form action="{{route('clinic.store')}}" method="post">
                        @csrf
                        <div class="p-2">
                            <div class="relative">
                                <label class="leading-7 text-sm text-gray-600">診療曜日</label>
                                <div>
                                    <label class="py-2">
                                        <input type="checkbox" name="monday" value="1" class="mb-1 mr-1">月曜日
                                    </label>
                                    <label class="p-2">
                                        <input type="checkbox" name="tuesday" value="1" class="mb-1 mr-1">火曜日
                                    </label>
                                    <label class="p-2">
                                        <input type="checkbox" name="wednesday" value="1" class="mb-1 mr-1">水曜日
                                    </label>
                                    <label class="p-2">
                                        <input type="checkbox" name="thursday" value="1" class="mb-1 mr-1">木曜日
                                    </label>
                                    <label class="p-2">
                                        <input type="checkbox" name="friday" value="1" class="mb-1 mr-1">金曜日
                                    </label>
                                    <label class="p-2">
                                        <input type="checkbox" name="saturday" value="1" class="mb-1 mr-1">土曜日
                                    </label>
                                    <label class="p-2">
                                        <input type="checkbox" name="sunday" value="1" class="mb-1 mr-1">日曜日
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="flex">
                            <div class="p-2">
                                <div class="relative">
                                    <label for="start_time" class="leading-7 text-sm text-gray-600">診療開始時刻</label>
                                    <input type="text" id="start_time" name="start_time"
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                              
                                        <x-input-error :messages="$errors->get('start_time')" class="mt-2" ></x-input-error>
                                    </div>
                            </div>
                            <div class="p-2">
                                <div class="relative">
                                    <label for="end_time" class="leading-7 text-sm text-gray-600">診療終了時刻</label>
                                    <input type="text" id="end_time" name="end_time"
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        <x-input-error :messages="$errors->get('end_time')" class="mt-2" ></x-input-error>
                                </div>
                        </div>
                        </div>
                        <div class="p-2 w-full">
                            <button
                                class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">登録</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
