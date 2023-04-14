<x-app-layout>
    <x-slot name="main">
        <div class="p-5">
            <div class="flex justify-content-between items-center">
                <div>
                    <h6 class="font-bold text-xl">Users</h6>
                </div>
                <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
                    <a href="{{ route('dash.users.create') }}" class="inline-flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        Add user
                    </a>
                    <button type="button" class="inline-flex items-center justify-center text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z" clip-rule="evenodd"></path></svg>
                        Export
                    </button>
                </div>
            </div>
            <hr class="my-5">
            <table id="myTable" class="stripe" style="width:100%">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>CIN</th>
                    <th>CNE</th>
                    <th>Phone</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>
                            <div class="flex items-center space-x-6 whitespace-nowrap">
                                <img class="w-8 h-8 rounded-full" src="{{ $user->profile_photo_url }}" alt="user photo">
                                <div class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                    <div class="text-base font-semibold text-gray-900 dark:text-white">{{ $user->name }}</div>
                                    <div class="text-sm font-normal text-gray-500 dark:text-gray-400">{{ $user->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td>{{ $user->CIN }}</td>
                        <td>{{ $user->CNE }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->role_id }}</td>
                        <td>
                            <div class="flex items-center space-x-6 whitespace-nowrap">
                                <button type="button" class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-800 rounded-lg text-center inline-flex items-center hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Edit
                                </button>
                                <button type="button" class="px-3 py-2 text-xs font-medium text-center text-white bg-red-700 rounded-lg text-center inline-flex items-center hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No Records Found - <a class="underline text-blue-500" href="{{ route('dash.users.create') }}">add some users</a></td>
                    </tr>
                @endforelse
                </tbody>
                <tfoot>
                <tr>
                    <th>Name</th>
                    <th>CIN</th>
                    <th>CNE</th>
                    <th>Phone</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </x-slot>
</x-app-layout>
