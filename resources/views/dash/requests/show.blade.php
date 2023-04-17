<x-app-layout>
    <x-slot name="main">
        <div class="p-5">
            <div class="flex justify-content-between items-center">
                <div>
                    <h6 class="font-bold text-xl">{{ $user->name }}</h6>
                </div>
                <div class="flex items-center ml-auto">
                    <a href="{{ route('dash.requests.create') }}"
                       class="inline-flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        New Request
                    </a>
                </div>
            </div>
            <hr class="mb-5">
            <div class="overflow-y-auto border rounded p-6 bg-gray-100" style="height: 60vh">
                @forelse($requests as $request)
                    <article class="p-6 mb-6 text-base bg-white rounded-lg dark:bg-gray-900">
                        <section class="flex justify-between items-center mb-2">
                            <div class="flex items-center">
                                <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                                    <img class="mr-2 w-6 h-6 rounded-full" src="{{ $request->user->profile_photo_url }}" alt="user photo">
                                    {{ $request->user->name }}</p>
                                <p class="text-sm text-gray-600 dark:text-gray-400">{{ \Carbon\Carbon::parse($request->created_at)->toDayDateTimeString() }}</p>
                            </div>
                            <button onclick="deleteRecord({{ $request->id }})" type="button" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                                <svg class="w-5 h-5" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M10 11V17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M14 11V17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M4 7H20" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M6 7H12H18V18C18 19.6569 16.6569 21 15 21H9C7.34315 21 6 19.6569 6 18V7Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                            </button>
                        </section>
                        <div class="flex space-x-5 items-center">
                            <p class="text-lg font-bold text-gray-600 dark:text-gray-400">{{ $request->type }}</p>
                            @if($request->solve)
                                <p class="text-xs text-white bg-green-500 px-2 py-0.5 rounded-2xl dark:text-gray-400">Solve</p>
                            @else
                                <p class="text-xs text-white bg-orange-500 px-2 py-0.5 rounded-2xl dark:text-gray-400">Pending</p>
                            @endif
                        </div>
                        <p class="text-base text-gray-500 dark:text-gray-400">{{ $request->description }}</p>
                    </article>
                @empty

                @endforelse
            </div>
        </div>
    </x-slot>
    <x-slot name="script">
        <script>
            function deleteRecord(id) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios.delete(`/requests/${id}`)
                            .then(function (response) {
                                console.log(response)
                                if (response.status == 200) {
                                    location.reload();
                                }
                            }).catch(function (error) {
                            Swal.fire(
                                'Deleted!',
                                'Error when delete record.',
                                'error'
                            )
                            console.log(error)
                        })
                    }
                })
            }
        </script>
    </x-slot>
</x-app-layout>
