<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            イベントの詳細
        </h2>
    </x-slot>

    <div class="pt-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="text-black bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class ="max-w-2xl mx-auto">
                    <x-jet-validation-errors class="mb-4" />
                
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif


                    <div class="mt-4">
                        <x-jet-label for="event_name" value="イベント名" />
                        {{ $event->name }}
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="information" value="イベント詳細" />
                        {!! nl2br(e($event->information)) !!}
                    </div>

                    <div class="md:flex justify-between">
                        <div class="mt-4">
                            <x-jet-label for="event_date" value="イベント日付" />
                            {{ $event->eventDate }}
                        </div>
                        <div class="mt-4">
                            <x-jet-label for="start_time" value="開始時間" />
                            {{ $event->startTime }}
                        </div>
                        <div class="mt-4">
                            <x-jet-label for="end_time" value="終了時間" />
                            {{ $event->endTime }}
                        </div>
                    </div>
                    <form id="cancel_{{ $event->id }}" method="post" action="{{ route('mypage.cancel', [ 'id' => $event->id ]) }}">
                        @csrf
                    <div class="md:flex justify-between items-end mb-4">
                        <div class="mt-4">
                            <x-jet-label  value="予約人数" />
                            {{ $reservation->number_of_people }}
                        </div>
                        @if($event->eventDate >= \Carbon\Carbon::today()->format('Y年m月d日'))
                        <a href="#" data-id="{{ $event->id }}" onclick="cancelPost(this)" class="ml-4 bg-black text-white py-2 px-4">
                            キャンセルする
                        </a>
                        @endif
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    function cancelPost(e){
        'use strict';
        if(confirm('本当にキャンセルしてもよろしいですか？')){
            document.getElementById('cancel_' + e.dataset.id).submit();
        }
    }
</script>