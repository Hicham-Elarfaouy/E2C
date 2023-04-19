<x-app-layout>
    <x-slot name="main">
        <x-validation-errors class="mb-4 text-red-700 p-5"/>
        <div class="p-5">
            <div class="flex justify-content-between items-center">
                <div>
                    <h6 class="font-bold text-xl">Notes</h6>
                </div>
                <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
                    <button id="defaultModalButton" data-modal-toggle="defaultModal"
                            class="inline-flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                  clip-rule="evenodd"></path>
                        </svg>
                        Add Note
                    </button>
                    <form method="post" action="{{ route('dash.notes.export') }}">
                        @csrf
                        <button type="submit"
                                class="inline-flex items-center justify-center text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z"
                                      clip-rule="evenodd"></path>
                            </svg>
                            Export
                        </button>
                    </form>
                </div>
            </div>
            <hr class="my-5">
            <table id="myTable" class="stripe" style="width:100%">
                <thead>
                <tr>
                    <th>Academic year</th>
                    <th>Student</th>
                    <th>Subject</th>
                    <th>Note</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($notes as $note)
                    <tr>
                        <td>{{ $note->getAcademicYear() }}</td>
                        <td>{{ $note->user->name }}</td>
                        <td>{{ $note->subject->name }}</td>
                        <td>{{ $note->note }}</td>
                        <td>
                            <div class="flex items-center space-x-6 whitespace-nowrap">
                                <a href="{{ route('dash.notes.edit', $note->id) }}"
                                   class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-800 rounded-lg text-center inline-flex items-center hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Edit
                                </a>
                                <button onclick="deleteRecord({{ $note->id }})" type="button"
                                        class="px-3 py-2 text-xs font-medium text-center text-white bg-red-700 rounded-lg text-center inline-flex items-center hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>No Records Found</td>
                    </tr>
                @endforelse
                </tbody>
                <tfoot>
                <tr>
                    <th>Academic year</th>
                    <th>Student</th>
                    <th>Subject</th>
                    <th>Note</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>

            <!-- Main modal -->
            <div id="defaultModal" tabindex="-1"
                 class="hidden bg-opacity-50 overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                <div class="p-4 w-full max-w-2xl h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800">
                        <!-- Modal header -->
                        <div
                            class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Note
                            </h3>
                            <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-toggle="defaultModal">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                          clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>

                        <form method="POST" action="{{ route('dash.notes.store') }}">
                            @csrf
                            <!-- Modal body -->
                            <div class="space-y-4 mb-6">
                                <div>
                                    <label for="note"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Note</label>
                                    <input type="number" name="note" id="note" placeholder="Type note"
                                           value="{{ old('note') }}" min="0.01" max="20" step="0.01" required
                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                </div>
                                <div>
                                    <label for="user"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Student</label>
                                    <select id="user" name="user_id" required
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option value="">Select Student</option>
                                        @foreach($users as $user)
                                            <option
                                                {{ $user->id == old('user_id') ? 'selected' : '' }} value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="subject"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subject</label>
                                    <select id="subject" name="subject_id" required
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option value="">Select Subject</option>
                                        @foreach($subjects as $subject)
                                            <option
                                                {{ $subject->id == old('subject_id') ? 'selected' : '' }} value="{{ $subject->id }}">{{ $subject->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- Modal footer -->
                            <div
                                class="flex items-center pt-3 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <button type="submit"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Add
                                </button>
                                <button data-modal-hide="defaultModal" type="button"
                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                    Close
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
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
                        axios.delete(`/notes/${id}`)
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
