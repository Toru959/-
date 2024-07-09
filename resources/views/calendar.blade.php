<x-calendar-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            イベントカレンダー
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="event-calendar border border-red-400 mx-auto sm:px-6 lg:px-8">
            <div class="text-black bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('calendar')
                @livewireScripts <!-- これがないとinputの値ろコンポーネントで受け取れずカレンダーが更新しない。必須 -->
                </div>
            </div>
        </div>
    </div>
</x-calendar-layout>
            