<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Siuuuu!!</title>

        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css">

        @livewireStyles

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="flex">
            <livewire:input-message />

            <div class="container w-2/3">
                <div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-800 leading-normal">
                    <div class="flex flex-wrap">
                        <div class="w-full md:w-2/2 xl:w-3/3 p-3">
                            <div class="bg-white border rounded shadow p-2">
                                <div class="flex flex-row items-center">
                                    <div class="flex-1 text-right md:text-center">
                                        <h5 class="font-bold uppercase text-gray-500">Msg Box</h5>
                                        <ul id="latest_trade_user" class="text-left"></ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @livewireScripts
    </body>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        window.onload=function(){
            Echo.channel('trades')
                .listen('NewTrade', (e) => {
                    console.log(e.trade);
                    addChild(e.trade);
                })
        }

        function addChild(text) {
            const obj = JSON.parse(text);
            var parent = document.getElementById('latest_trade_user');
            var newText = '<li>' + obj.name + ' : '+ obj.message + '</li>';
            parent.insertAdjacentHTML('beforeend', newText);
        }
    </script>
</html>
