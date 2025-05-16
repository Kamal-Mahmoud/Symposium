<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Conferences') }}
        </h2>
    </x-slot>
    {{-- check id field  if conference id in it or not  --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900 dark:text-gray-100">
                    @foreach ($conferences as $conference)
                        <li>
                            <a href="{{ route('conferences.show', ['conference' => $conference]) }}"
                                class="hover:underline  font-bold">

                                @if (Auth::user()->favoritedConferences->pluck('id')->contains($conference->id))
                                    <a href="{{ route('conferences.unfavorite', ['conference' => $conference]) }}">*</a>
                                @else
                                    <a href="{{ route('conferences.favorite', ['conference' => $conference]) }}">0</a>
                                @endif
                                {{ $conference->title }}

                            </a>
                        </li>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
