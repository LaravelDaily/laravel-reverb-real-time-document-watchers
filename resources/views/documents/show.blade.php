<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Document') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="w-full mb-4 pb-4 border-b-2">
                        <div>
                            <h2 class="text-xl">Users viewing:</h2>
                        </div>
                        <div id="documentViewing" class="w-full"></div>
                    </div>
                    <div class="text-2xl">
                        {{ $document->title }}
                    </div>
                    <div class="mt-6 text-gray-500">
                        {{ $document->description }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/html" id="live-user-template">
        <span id="live-user-_ID_" class="inline-block">
            <img src="_AVATAR_" alt="_NAME_" class="w-8 h-8 inline-block"/> _NAME_
        </span>
    </script>

    <script>
        window.addEventListener('DOMContentLoaded', function () {
            window.Echo.join('App.Modes.Document.{{ $document->id }}')
                .here((users) => {
                    // Add new users to the list
                    users.forEach(user => {
                        let html = document.querySelector('#live-user-template').innerHTML;
                        html = html.replace(/_ID_/g, user.id);
                        html = html.replace(/_AVATAR_/g, user.avatar);
                        html = html.replace(/_NAME_/g, user.name);
                        document.getElementById('documentViewing').innerHTML += html;
                    });
                })
                .joining((user) => {
                    // We don't want to add the user if it's already there
                    if (document.getElementById('live-user-' + user.id)) return;

                    // Add new users to the list
                    let html = document.querySelector('#live-user-template').innerHTML;
                    html = html.replace(/_ID_/g, user.id);
                    html = html.replace(/_AVATAR_/g, user.avatar);
                    html = html.replace(/_NAME_/g, user.name);
                    document.getElementById('documentViewing').innerHTML += html;
                })
                .leaving((user) => {
                    // Remove the user from the list once he leaves
                    document.getElementById('live-user-' + user.id).remove();
                });
        });
    </script>
</x-app-layout>