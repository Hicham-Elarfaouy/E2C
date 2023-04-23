<x-app-layout>
    <x-slot name="main">
        <div>
            <div class="grid w-full grid-cols-1 gap-4 mt-4 xl:grid-cols-3">
                <div
                    class="items-center xl:col-span-2 justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                    <div class="flex justify-between">
                        <span
                            class="text-xl font-bold leading-none text-gray-900 sm:text-2xl dark:text-white">Students</span>
                        <div>
                            <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">{{ $chartStudents['data'][2] }}</span>
                            <p class="flex items-center text-base font-normal text-gray-500 dark:text-gray-400">
                                @if($chartStudents['state'] >= 0)
                                    <span class="flex items-center mr-1.5 text-sm text-green-500 dark:text-green-400">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                   aria-hidden="true">
                <path clip-rule="evenodd" fill-rule="evenodd"
                      d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z"></path>
              </svg>
              {{ $chartStudents['state'] }}%
            </span>
                                @else
                                    <span class="flex items-center mr-1.5 text-sm text-red-500 dark:text-green-400">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                   aria-hidden="true">
                                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                                          d="M10 3a.75.75 0 01.75.75v10.638l3.96-4.158a.75.75 0 111.08 1.04l-5.25 5.5a.75.75 0 01-1.08 0l-5.25-5.5a.75.75 0 111.08-1.04l3.96 4.158V3.75A.75.75 0 0110 3z"></path>
                                                </svg>
              {{ $chartStudents['state'] }}%
            </span>
                                @endif
                                Since last year
                            </p>
                        </div>
                    </div>
                    <div class="w-full" style="min-height: 155px;">
                        <canvas id="myChart1"></canvas>
                    </div>
                </div>
                <div
                    class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                    <h3 class="flex items-center mb-4 text-lg font-semibold text-gray-900 dark:text-white">
                        Students by subject
                    </h3>
                    <div class="pt-4" id="faq" role="tabpanel" aria-labelledby="faq-tab">
                        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($subjects as $subject)
                                <li class="py-3 sm:py-4">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center min-w-0">
                                            <div class="ml-3">
                                                <p class="font-medium text-gray-900 truncate dark:text-white">
                                                    {{ $subject['subject'] }}
                                                </p>
                                                @if($subject['state'] >= 0)
                                                    <div class="flex items-center justify-start flex-1 text-sm text-green-500 dark:text-green-400">
                                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                                             xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                            <path clip-rule="evenodd" fill-rule="evenodd"
                                                                  d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z"></path>
                                                        </svg>
                                                @else
                                                    <div class="flex items-center justify-start flex-1 text-sm text-red-500 dark:text-green-400">
                                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                                             xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                            <path clip-rule="evenodd" fill-rule="evenodd"
                                                                  d="M10 3a.75.75 0 01.75.75v10.638l3.96-4.158a.75.75 0 111.08 1.04l-5.25 5.5a.75.75 0 01-1.08 0l-5.25-5.5a.75.75 0 111.08-1.04l3.96 4.158V3.75A.75.75 0 0110 3z"></path>
                                                        </svg>
                                                @endif
                                                    {{ $subject['state'] }}%
                                                    <span class="ml-2 text-gray-500">vs last year</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                            {{ $subject['students'] }}
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="grid w-full grid-cols-2 gap-4 mt-4 xl:grid-cols-4 py-4">
                <div
                    class="border-l-8 border-l-red-300 items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                    <div class="w-full">
                        <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Students this year</h3>
                        <span
                            class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">{{ $global['students'] }}</span>
                    </div>
                </div>
                <div
                    class="border-l-8 border-l-blue-300 items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                    <div class="w-full">
                        <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Requests this year</h3>
                        <span
                            class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">{{ $global['requests'] }}</span>
                    </div>
                </div>
                <div
                    class="border-l-8 border-l-purple-300 items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                    <div class="w-full">
                        <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Attendances this year</h3>
                        <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">{{ $global['attendances'] }} <span
                                class="text-base font-normal text-gray-500 dark:text-gray-400">transaction</span></span>
                    </div>
                </div>
                <div
                    class="border-l-8 border-l-gray-300 items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                    <div class="w-full">
                        <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Attendances this year</h3>
                        <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">{{ $global['attendance_hour'] }} <span
                                class="text-base font-normal text-gray-500 dark:text-gray-400">hours</span></span>
                    </div>
                </div>
            </div>
            <div class="grid w-full grid-cols-1 gap-4 mt-4 xl:grid-cols-2">
                <div
                    class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                    <div class="w-full">
                        <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Requests</h3>
                        <span
                            class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">{{ $chartRequests['all'] }}</span>
                        <p class="flex items-center text-base font-normal text-gray-500 dark:text-gray-400">
                            @if($chartRequests['state'] >= 0)
                                <span class="flex items-center mr-1.5 text-sm text-green-500 dark:text-green-400">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                   aria-hidden="true">
                <path clip-rule="evenodd" fill-rule="evenodd"
                      d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z"></path>
              </svg>
              {{ $chartRequests['state'] }}%
            </span>
                            @else
                                <span class="flex items-center mr-1.5 text-sm text-red-500 dark:text-green-400">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                   aria-hidden="true">
                                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                                          d="M10 3a.75.75 0 01.75.75v10.638l3.96-4.158a.75.75 0 111.08 1.04l-5.25 5.5a.75.75 0 01-1.08 0l-5.25-5.5a.75.75 0 111.08-1.04l3.96 4.158V3.75A.75.75 0 0110 3z"></path>
                                                </svg>
              {{ $chartRequests['state'] }}%
            </span>
                            @endif
                            Since last year
                        </p>
                    </div>
                    <div class="w-full" style="min-height: 155px;">
                        <canvas id="myChart2"></canvas>
                    </div>
                </div>
                <div
                    class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                    <div class="w-full">
                        <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">group by gender</h3>
                        <span
                            class="text-xl font-bold leading-none text-gray-900 sm:text-2xl dark:text-white">Students</span>
                    </div>
                    <div class="w-full flex justify-center" style="height: 300px;">
                        <canvas id="myChart3"></canvas>
                    </div>
                </div>
            </div>
            <div
                class="mt-4 p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <div class="w-full">
                    <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Expenses</h3>
                    <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">{{ $chartExpenses['all'] }} DH</span>
                    <p class="flex items-center text-base font-normal text-gray-500 dark:text-gray-400">
                        @if($chartExpenses['state'] >= 0)
                            <span class="flex items-center mr-1.5 text-sm text-green-500 dark:text-green-400">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                   aria-hidden="true">
                <path clip-rule="evenodd" fill-rule="evenodd"
                      d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z"></path>
              </svg>
              {{ $chartExpenses['state'] }}%
            </span>
                        @else
                            <span class="flex items-center mr-1.5 text-sm text-red-500 dark:text-green-400">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                   aria-hidden="true">
                                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                                          d="M10 3a.75.75 0 01.75.75v10.638l3.96-4.158a.75.75 0 111.08 1.04l-5.25 5.5a.75.75 0 01-1.08 0l-5.25-5.5a.75.75 0 111.08-1.04l3.96 4.158V3.75A.75.75 0 0110 3z"></path>
                                                </svg>
              {{ $chartExpenses['state'] }}%
            </span>
                        @endif
                        Since last year
                    </p>
                </div>
                <div class="w-full" style="min-height: 155px;">
                    <canvas id="myChart4"></canvas>
                </div>
            </div>
            <div class="grid w-full grid-cols-1 gap-4 mt-4 xl:grid-cols-2">
                <div
                    class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                    <div class="w-full">
                        <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Revenues</h3>
                        <span
                            class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">{{ $chartRevenues['all'] }} DH</span>
                        <p class="flex items-center text-base font-normal text-gray-500 dark:text-gray-400">
                            @if($chartRevenues['state'] >= 0)
                                <span class="flex items-center mr-1.5 text-sm text-green-500 dark:text-green-400">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                   aria-hidden="true">
                <path clip-rule="evenodd" fill-rule="evenodd"
                      d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z"></path>
              </svg>
              {{ $chartRevenues['state'] }}%
            </span>
                            @else
                                <span class="flex items-center mr-1.5 text-sm text-red-500 dark:text-green-400">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                   aria-hidden="true">
                                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                                          d="M10 3a.75.75 0 01.75.75v10.638l3.96-4.158a.75.75 0 111.08 1.04l-5.25 5.5a.75.75 0 01-1.08 0l-5.25-5.5a.75.75 0 111.08-1.04l3.96 4.158V3.75A.75.75 0 0110 3z"></path>
                                                </svg>
              {{ $chartRevenues['state'] }}%
            </span>
                            @endif
                            Since last year
                        </p>
                    </div>
                    <div class="w-full" style="min-height: 155px;">
                        <canvas id="myChart5"></canvas>
                    </div>
                </div>
                <div
                    class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                    <div class="w-full">
                        <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">group by subject</h3>
                        <span
                            class="text-xl font-bold leading-none text-gray-900 sm:text-2xl dark:text-white">Expenses</span>
                    </div>
                    <div class="w-full flex justify-center" style="height: 300px;">
                        <canvas id="myChart6"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
    <x-slot name="script">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx1 = document.getElementById('myChart1');
            const ctx2 = document.getElementById('myChart2');
            const ctx3 = document.getElementById('myChart3');
            const ctx4 = document.getElementById('myChart4');
            const ctx5 = document.getElementById('myChart5');
            const ctx6 = document.getElementById('myChart6');

            new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($chartStudents['labels']) !!},
                    datasets: [{
                        label: 'student number',
                        data: {!! json_encode($chartStudents['data']) !!},
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: {!! $chartRequests['labels'] !!},
                    datasets: [{
                        axis: 'y',
                        label: 'requests number',
                        data: {!! $chartRequests['data'] !!},
                        backgroundColor: [
                            'rgb(193,127,250)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    indexAxis: 'y',
                }
            });

            new Chart(ctx3, {
                type: 'pie',
                data: {
                    labels: {!! $chartGender['labels'] !!},
                    datasets: [{
                        label: 'students number',
                        data: {!! $chartGender['data'] !!},
                        backgroundColor: [
                            'rgb(54, 162, 235)',
                            'rgb(255, 99, 132)',
                        ],
                        hoverOffset: 4
                    }]
                },
                options: {
                    indexAxis: 'y',
                }
            });

            new Chart(ctx4, {
                type: 'line',
                data: {
                    labels: {!! $chartExpenses['labels'] !!},
                    datasets: [{
                        label: 'expenses',
                        data: {!! $chartExpenses['data'] !!},
                        backgroundColor: [
                            'rgb(243,88,131)',
                        ],
                        borderWidth: 2,
                        borderColor: 'rgb(243,88,131)',
                        tension: 0.5
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    interaction: {
                        intersect: false,
                    }
                }
            });

            new Chart(ctx5, {
                type: 'bar',
                data: {
                    labels: {!! $chartRevenues['labels'] !!},
                    datasets: [{
                        label: 'revenues',
                        data: {!! $chartRevenues['data'] !!},
                        backgroundColor: [
                            'rgba(75, 192, 192)',
                        ],
                        borderWidth: 1
                    }]
                },
            });

            new Chart(ctx6, {
                type: 'pie',
                data: {
                    labels: {!! $chartSubjects['labels'] !!},
                    datasets: [{
                        label: 'expenses',
                        data: {!! $chartSubjects['data'] !!},
                        hoverOffset: 4
                    }]
                },
                options: {
                    indexAxis: 'y',
                }
            });
        </script>
    </x-slot>
</x-app-layout>
