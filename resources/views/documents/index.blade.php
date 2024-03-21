<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Documents List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="table-auto w-full">
                        <thead>
                        <tr>
                            <th class="px-4 py-2">Title</th>
                            <th class="px-4 py-2">Description</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($documents as $document)
                            <tr>
                                <td class="border px-4 py-2">{{ $document->title }}</td>
                                <td class="border px-4 py-2">{{ str($document->description)->words(30) }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('documents.show', $document->id) }}"
                                       class="text-blue-500">View</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
