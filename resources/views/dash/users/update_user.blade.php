<x-app-layout>
    <x-slot name="main">
        <x-validation-errors class="mb-4 text-red-700 p-5"/>
        <div class="p-5">
            <form method="POST" action="{{ route('dash.users.update', $user) }}">
                @csrf
                @method('PUT')
                <div>
                    <h6 class="my-2 font-bold text-lg">General Information</h6>
                    <hr class="mb-5">
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <label for="cin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CIN</label>
                            <input name="cin" value="{{ old('cin') ?? $user->cin }}" type="text" id="cin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="SJ1234">
                        </div>
                        <div>
                            <label for="cne" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CNE</label>
                            <input name="cne" value="{{ old('cne') ?? $user->cne }}" type="text" id="cne" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="C13245678">
                        </div>
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input name="name" value="{{ old('name') ?? $user->name }}" type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required>
                        </div>
                        <div>
                            <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                            <input name="username" value="{{ old('username') ?? $user->username }}" type="text" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="johndoe" required>
                        </div>
                        <div>
                            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone number</label>
                            <input name="phone" value="{{ old('phone') ?? $user->phone }}" type="tel" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="06xxxxxxxx" {{--pattern="[0]{1}[6-7]{1}[0-9]{8}"--}} required>
                        </div>
                        <div>
                            <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                            <select id="gender" name="gender" autocomplete="country-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <option value="">Select Gender</option>
                                <option {{ $user->gender == 'men' ? 'selected' : '' }} value="men">Men</option>
                                <option {{ $user->gender == 'women' ? 'selected' : '' }} value="women">Women</option>
                            </select>
                        </div>
                        <div>
                            <label for="birthday" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Birthday</label>
                            <input name="birthday" value="{{ old('birthday') ?? $user->birthday }}" type="date" id="birthday" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        </div>
                    </div>
                    <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email address</label>
                        <input name="email" value="{{ old('email') ?? $user->email }}" type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="john.doe@company.com" required>
                    </div>
                    <div class="mb-6">
                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                        <input name="address" value="{{ old('address') ?? $user->address }}" type="text" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="street - city - country" required>
                    </div>
                    <div class="mb-6">
                        <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                        <select id="role" name="role_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <option value="">Select Role</option>
                            @foreach($roles as $role)
                                <option {{ $role->id == $user->role_id ? 'selected' : '' }} value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div id="student-block" class="hidden">
                    <div class="mt-14">
                        <h6 class="my-2 font-bold text-lg">Student Information</h6>
                        <hr class="mb-5">
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label for="classroom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Classroom</label>
                                <select id="classroom" name="classroom_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="">Select Classroom</option>
                                    @foreach($classrooms as $classroom)
                                        <option {{ $classroom->id == $user->classroom_id ? 'selected' : '' }} value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Level</label>
                                <select id="level" name="level_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="">Select Level</option>
                                    @foreach($levels as $level)
                                        <option {{ $level->id == $user->level_id ? 'selected' : '' }} value="{{ $level->id }}">{{ $level->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mt-14">
                        <h6 class="my-2 font-bold text-lg">Parent Information</h6>
                        <hr class="mb-5">
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label for="parent_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Parent name</label>
                                <input name="parent_name" value="{{ old('parent_name') ?? $user->parent_name }}" type="text" id="parent_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John">
                            </div>
                            <div>
                                <label for="relation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Relation</label>
                                <input name="parent_relation" value="{{ old('parent_relation') ?? $user->parent_relation }}" type="text" id="relation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Father">
                            </div>
                            <div>
                                <label for="parent_phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone number</label>
                                <input name="parent_phone" value="{{ old('parent_phone') ?? $user->parent_phone }}" type="tel" id="parent_phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="+212xxxxxxxx">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="text-white bg-blue-700 mt-5 w-full hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
            </form>

            <form method="POST" action="{{ route('dash.users.password', $user) }}" class="mt-20">
                @csrf
                @method('PUT')
                <div>
                    <h6 class="my-2 font-bold text-lg">Reset Password</h6>
                    <hr class="mb-5">
                    <div class="mb-6">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input name="password" type="text" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                    <div class="mb-6">
                        <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password Confirmation</label>
                        <input name="password_confirmation" type="text" id="password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                </div>
                <button type="submit" class="text-white bg-red-700 mt-5 w-full hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
            </form>
        </div>
    </x-slot>
    <x-slot name="script">
        <script>
            const roleSelect = document.getElementById('role')
            const codeBlock = document.getElementById('student-block')

            roleSelect.addEventListener('change', () => {
                const selectedValue = roleSelect.options[roleSelect.selectedIndex].textContent;
                if (selectedValue === "Student") {
                    codeBlock.classList.remove('hidden')
                } else {
                    codeBlock.classList.add('hidden')
                }
            })
        </script>
    </x-slot>
</x-app-layout>
