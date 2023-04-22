<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">

<div>
    <!-- Page Content -->
    <div class="mx-auto">
        <div class="bg-white p-4 overflow-hidden sm:shadow-xl sm:rounded-lg">
            <div class="p-5">
                <div class="flex justify-content-between items-center">
                    <div>
                        <h6 class="font-bold text-xl">Classroom Schedule</h6>
                    </div>
                </div>
                <hr class="my-5">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <table class="w-full">
                        <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-4 text-left">Time</th>
                            @foreach($days as $day)
                                <th class="py-3 px-4 text-center">{{ strtoupper($day) }}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                        @foreach($hours as $hour)
                            <tr class="border-b border-gray-300">
                                <td class="py-3 px-4 bg-gray-200 text-gray-600 font-bold text-left whitespace-nowrap">{{ date('H:i', mktime($hour, 0)) }}</td>
                                @foreach($days as $day)
                                    <td class="py-3 px-4 text-left" style="height: 100px">
                                        @foreach($schedules as $schedule)
                                            @if($schedule->day == $day && $schedule->hour == $hour)
                                                <div class="bg-white rounded-lg shadow-lg overflow-hidden mx-auto">
                                                    <div class="px-3 py-2">
                                                        <div class="font-bold text-sm">{{ $schedule->subject->name }}</div>
                                                    </div>
                                                    <div class="px-3 py-2 bg-gray-100">
                                                        <ul class="text-gray-700 text-xs">
                                                            <li class="mb-2"><span class="font-bold mr-1">Teacher:</span>{{ $schedule->subject->user->name }}</li>
                                                            <li class="mb-2"><span class="font-bold mr-1">Classroom:</span>{{ $schedule->classroom->name }}</li>
                                                            <li><span class="font-bold mr-1">Time:</span>{{ $day .', '. date('H:i', mktime($hour, 0))}}</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
