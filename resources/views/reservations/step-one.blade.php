<x-guest-layout>
    <div class="container min-h-screen mx-auto">
        <div class="py-3 shadow-lg md:mx-56 md:flex-row shadow-teal-400">
            <h1 class="py-4 text-2xl font-bold text-center text-teal-400">Reservation</h1>
            <div class="flex flex-col md:justify-center md:items-center md:flex-row">
                <div class="md:w-1/2 ">
                    <img class="w-full h-full"
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQd1YMi6pLwYWj9BCOfSuM3rNlBl8bLteGH1PbkXLz4gKiDj67kXhHt8ql0yGXVsnpSv9A&usqp=CAU"
                        alt="">
                </div>
                <div class="px-10 md:w-1/2">
                    <h1 class="mb-3 text-lg font-bold text-center text-gray-900">Step One</h1>
                    {{-- <div class="mb-2">
                        <label for="first_name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First
                            Name</label>
                        <input type="text" id="first_name" name="first_name"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            placeholder="Enter your first name" required>
                    </div>
                    <div class="mb-2">
                        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last
                            Name</label>
                        <input type="text" id="last_name" name="last_name"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            placeholder="Enter your last name" required>
                    </div>
                    <div class="mb-6">
                        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last
                            Name</label>
                        <input type="text" id="last_name" name="last_name"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            placeholder="Enter your last name" required>
                    </div>
                    <div class="flex justify-end">
                        <a href="">
                            <button
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">
                                Next</button>
                        </a>
                    </div> --}}
                    <div class="w-full my-4 bg-gray-200 rounded-full">
                        <div class="w-[250px] p-1 text-xs leading-none text-center bg-teal-400 rounded-full text-white font-bold">Step one</div>
                    </div>

                    <form action="{{ route('reservations.store.step.one') }}" method="post">
                        @csrf

                        <div class="sm:col-span-6">
                            <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                            <div class="mt-1">
                                <input type="text" name="first_name" id="first_name"
                                    value="{{ old('first_name', $reservation->first_name ?? '') }}"
                                    class="w-full rounded-lg @error('first_name') border-red-500 @enderror">
                                @error('first_name')
                                    <div class="text-sm text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="sm:col-span-6">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                            <div class="mt-1">
                                <input type="text" name="last_name" id="last_name"
                                    value="{{ old('last_name', $reservation->last_name ?? '') }}"
                                    class="block w-full p-2 rounded-lg @error('last_name') border-red-500 @enderror">
                                @error('last_name')
                                    <div class="text-sm text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="sm:col-span-6">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                            <div class="mt-1">
                                <input type="email" name="email" id="email"
                                    value="{{ old('email', $reservation->email ?? '') }}"
                                    class="block w-full p-2 rounded-lg @error('email') border-red-500 @enderror">
                                @error('email')
                                    <div class="text-sm text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="sm:col-span-6">
                            <label for="tel_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                            <div class="mt-1">
                                <input type="number" name="tel_number" id="tel_number"
                                    value="{{ old('tel_number', $reservation->tel_number ?? '') }}"
                                    class="block w-full p-2 rounded-lg @error('tel_number') border-red-500 @enderror">
                                @error('tel_number')
                                    <div class="text-sm text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="sm:col-span-6">
                            <label for="res_date" class="block text-sm font-medium text-gray-700">Reservation
                                Date</label>
                            <div class="mt-1">
                                <input type="datetime-local" name="res_date" id="res_date" min="{{ $min_date->format('Y-m-d\TH:i:s') }}" max="{{ $max_date->format('Y-m-d\TH:i:s') }}"
                                    value="{{  $reservation ? $reservation->res_date : '' }}"
                                    class="block w-full p-2 rounded-lg @error('res_date') border-red-500 @enderror">
                                @error('res_date')
                                    <div class="text-sm text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="sm:col-span-6">
                            <label for="guest_number" class="block text-sm font-medium text-gray-700">Guest
                                Number</label>
                            <div class="mt-1">
                                <input type="number" name="guest_number" min="1" max="20"
                                    id="guest_number" value="{{ old('guest_number', $reservation->guest_number ?? '') }}"
                                    class="block w-full p-2 rounded-lg @error('guest_number') border-red-500 @enderror">
                                @error('guest_number')
                                    <div class="text-sm text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="sm:col-span-6">
                            <label for="table_id" class="block text-sm font-medium text-gray-700">Table</label>
                            <select id="table_id" name="table_id"
                                class="block w-full rounded-lg @error('table_id') border-red-500 @enderror">
                                @foreach ($tables as $table)
                                    <option value="{{ $table->id }}" @selected($table->id == $reservation->table_id)>
                                        {{ $table->name }} ({{ $table->gust_number }} Guests)</option>
                                @endforeach
                                @error('table_id')
                                    <div class="text-sm text-red-500">{{ $message }}</div>
                                @enderror
                            </select>
                        </div> --}}
                        <div class="flex justify-end mt-6">
                            <button type="submit"
                                class="px-6 py-2 text-white bg-teal-400 rounded-lg hover:bg-teal-700">Next</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
