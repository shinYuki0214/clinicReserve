<x-reserve-guest>
    <x-slot name="header">
        <a href="{{route('reservation.index', ['id'=>$id])}}" class="font-semibold text-xl text-gray-800 leading-tight">
            {{$clinicName}}  予約可能枠
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mx-auto">
                <div class="p-6 text-gray-900">
                    <h3>ご予約を承りました。</h3>
                    <p>内容の確認メールが送られておりますので、ご確認ください。
                    </p>
                </div>
            </div>
        </div>
    </div>
    </div>
    </x-app-layout>
