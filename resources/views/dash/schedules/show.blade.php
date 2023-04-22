<x-app-layout>
    <x-slot name="main">
        <div class="p-5">
            <div class="flex justify-content-between items-center">
                <div>
                    <h6 class="font-bold text-xl">Classroom Schedule</h6>
                </div>
                <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
                    <form method="post" action="{{ route('dash.schedules.exportPDF', Auth::user()->id) }}">
                        @csrf
                        <button type="submit"
                                class="inline-flex items-center justify-center text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z"
                                      clip-rule="evenodd"></path>
                            </svg>
                            Export PDF
                        </button>
                    </form>
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
    </x-slot>
    <x-slot name="script">
        <script>
        </script>
    </x-slot>
</x-app-layout>
