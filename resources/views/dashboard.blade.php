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
                    <h3 class="flex items-center mb-4 text-lg font-semibold text-gray-900 dark:text-white">Statistics
                        this month
                        <button data-popover-target="popover-description" data-popover-placement="bottom-end"
                                type="button">
                            <svg class="w-4 h-4 ml-2 text-gray-400 hover:text-gray-500" aria-hidden="true"
                                 fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                      clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Show information</span></button>
                    </h3>
                    <div class="pt-4" id="faq" role="tabpanel" aria-labelledby="faq-tab">
                        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center min-w-0">
                                        <img class="flex-shrink-0 w-10 h-10"
                                             src="https://flowbite-admin-dashboard.vercel.app/images/products/iphone.png"
                                             alt="imac image">
                                        <div class="ml-3">
                                            <p class="font-medium text-gray-900 truncate dark:text-white">
                                                iPhone 14 Pro
                                            </p>
                                            <div
                                                class="flex items-center justify-end flex-1 text-sm text-green-500 dark:text-green-400">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                                     xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                                          d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z"></path>
                                                </svg>
                                                2.5%
                                                <span class="ml-2 text-gray-500">vs last month</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        $445,467
                                    </div>
                                </div>
                            </li>
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center min-w-0">
                                        <img class="flex-shrink-0 w-10 h-10"
                                             src="https://flowbite-admin-dashboard.vercel.app/images/products/imac.png"
                                             alt="imac image">
                                        <div class="ml-3">
                                            <p class="font-medium text-gray-900 truncate dark:text-white">
                                                Apple iMac 27"
                                            </p>
                                            <div
                                                class="flex items-center justify-end flex-1 text-sm text-green-500 dark:text-green-400">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                                     xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                                          d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z"></path>
                                                </svg>
                                                12.5%
                                                <span class="ml-2 text-gray-500">vs last month</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        $256,982
                                    </div>
                                </div>
                            </li>
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center min-w-0">
                                        <img class="flex-shrink-0 w-10 h-10"
                                             src="https://flowbite-admin-dashboard.vercel.app/images/products/watch.png"
                                             alt="watch image">
                                        <div class="ml-3">
                                            <p class="font-medium text-gray-900 truncate dark:text-white">
                                                Apple Watch SE
                                            </p>
                                            <div
                                                class="flex items-center justify-end flex-1 text-sm text-red-600 dark:text-red-500">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                                     xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                                          d="M10 3a.75.75 0 01.75.75v10.638l3.96-4.158a.75.75 0 111.08 1.04l-5.25 5.5a.75.75 0 01-1.08 0l-5.25-5.5a.75.75 0 111.08-1.04l3.96 4.158V3.75A.75.75 0 0110 3z"></path>
                                                </svg>
                                                1.35%
                                                <span class="ml-2 text-gray-500">vs last month</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        $201,869
                                    </div>
                                </div>
                            </li>
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center min-w-0">
                                        <img class="flex-shrink-0 w-10 h-10"
                                             src="https://flowbite-admin-dashboard.vercel.app/images/products/ipad.png"
                                             alt="ipad image">
                                        <div class="ml-3">
                                            <p class="font-medium text-gray-900 truncate dark:text-white">
                                                Apple iPad Air
                                            </p>
                                            <div
                                                class="flex items-center justify-end flex-1 text-sm text-green-500 dark:text-green-400">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                                     xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                                          d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z"></path>
                                                </svg>
                                                12.5%
                                                <span class="ml-2 text-gray-500">vs last month</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        $103,967
                                    </div>
                                </div>
                            </li>
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center min-w-0">
                                        <img class="flex-shrink-0 w-10 h-10"
                                             src="https://flowbite-admin-dashboard.vercel.app/images/products/imac.png"
                                             alt="imac image">
                                        <div class="ml-3">
                                            <p class="font-medium text-gray-900 truncate dark:text-white">
                                                Apple iMac 24"
                                            </p>
                                            <div
                                                class="flex items-center justify-end flex-1 text-sm text-red-600 dark:text-red-500">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                                     xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                                          d="M10 3a.75.75 0 01.75.75v10.638l3.96-4.158a.75.75 0 111.08 1.04l-5.25 5.5a.75.75 0 01-1.08 0l-5.25-5.5a.75.75 0 111.08-1.04l3.96 4.158V3.75A.75.75 0 0110 3z"></path>
                                                </svg>
                                                2%
                                                <span class="ml-2 text-gray-500">vs last month</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        $98,543
                                    </div>
                                </div>
                            </li>
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
