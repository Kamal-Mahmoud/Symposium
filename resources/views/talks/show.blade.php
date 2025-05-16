<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $talk->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <ul class="list-disc pl-4">
                        {{ $talk->title }}
                        <br>
                        <button class="underline mt-3 border-red-600" form="delete-form">Delete this Talk</button><br>
                        <a href="{{route("talks.edit",["talk"=>$talk])}}">Edit Talk</a>
                        <form method="POST" action="{{ route('talks.destroy', ['talk' => $talk]) }}" id="delete-form"
                            class="hidden"
                            onclick="event.preventDefault();
                             this.closest('form').submit();">
                            @csrf
                            @method('DELETE')
                        </form>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
