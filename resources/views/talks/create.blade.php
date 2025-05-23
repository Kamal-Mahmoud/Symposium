<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Talk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">




                    <div class="max-w-2xl mx-auto p-4">
                        <form class="space-y-6" method="POST" action="{{ route('talks.store') }}">
                            @csrf
                            <div>
                                <input type="hidden" name="user_id" value="{{ $user_id }}">
                                {{-- {{{$user_id}}} --}}
                                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                                <input type="text" id="title" name="title" value="{{ old('title') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    placeholder="How to save a life">
                                <x-input-error :messages="$errors->get('title')" />
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                                    <select id="type" name="type"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        @foreach (App\Enums\TalkType::cases() as $talkType)
                                            <option {{old('type') == $talkType->value ? 'selected' : ""}} value="{{ $talkType->value }}">{{ ucwords($talkType->value) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="length" class="block text-sm font-medium text-gray-700">Length</label>
                                    <input type="text" id="length" name="length" value="{{ old('length') }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <x-input-error :messages="$errors->get('length')" />
                                </div>
                            </div>
                            <div>
                                <label for="abstract" class="block text-sm font-medium text-gray-700">Abstract</label>
                                <textarea id="abstract" name="abstract" rows="4"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('organizer_notes') }}</textarea>
                                <p class="mt-1 text-sm text-gray-500">Describe the talk in a few sentences, in a way
                                    that's compelling and
                                    informative and could be presented to the public.
                                </p>
                                <x-input-error :messages="$errors->get('abstract')" />
                            </div>
                            <div>
                                <label for="organizer_notes" class="block text-sm font-medium text-gray-700">Organizer
                                    Notes</label>
                                <textarea id="organizer_notes" name="organizer_notes" rows="4"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('organizer_notes') }}</textarea>
                                <p class="mt-1 text-sm text-gray-500">Write any notes you may want to pass to an event
                                    organizer about this
                                    talk.
                                </p>
                                <x-input-error :messages="$errors->get('organizer_notes')" />
                            </div>
                            <div class="flex justify-end">
                                <button type="button"
                                    class="mr-2 px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    style="margin-right: 10px">
                                    Cancel
                                </button>
                                <button type="submit"
                                    class="mr-2 px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>






                </div>
            </div>
        </div>
    </div>
</x-app-layout>
