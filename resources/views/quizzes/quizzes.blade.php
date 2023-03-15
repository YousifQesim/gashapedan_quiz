
<x-app-layout>
    <div> quizze</div>

    @foreach ($quiz as $item)
    <a class="relative flex items-start justify-between rounded-xl border border-gray-100 p-4 shadow-xl sm:p-6 lg:p-8"
        href="/quiz/{{ $item->id }}/show">
        <div class="pt-4 text-gray-500">

            <h3 class="mt-4 text-lg font-bold text-gray-900 sm:text-xl">
                {{ $item->title }}
            </h3>

            <p class="mt-2 hidden text-sm sm:block">
                {{ $item->description }}
            </p>
        </div>
    </a>
    @endforeach
</x-app-layout>