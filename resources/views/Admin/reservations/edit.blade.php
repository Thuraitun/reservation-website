<x-admin-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex p-2 m-2">
                <a href="{{ route('admin.reservations.index') }}" class="px-4 py-2 text-white bg-indigo-500 rounded-lg hover:bg-indigo-700">Back</a>
            </div>
            <div class="p-2 m-2">
                <div class="flex content-center mt-10 space-y-8 divide-y divide-gray-200 md:flex-col">
                    <form action="{{ route('admin.reservations.update',$reservation->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="sm:col-span-6">
                            <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                            <div class="mt-1">
                                <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $reservation->first_name) }}" class="w-full rounded-lg @error('first_name') border-red-500 @enderror">
                                @error('first_name')
                                    <div class="text-sm text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="sm:col-span-6">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                            <div class="mt-1">
                                <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $reservation->last_name) }}" class="block w-full p-2 rounded-lg @error('last_name') border-red-500 @enderror">
                                @error('last_name')
                                    <div class="text-sm text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="sm:col-span-6">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                            <div class="mt-1">
                                <input type="email" name="email" id="email" value="{{ old('email', $reservation->email) }}" class="block w-full p-2 rounded-lg @error('email') border-red-500 @enderror">
                                @error('email')
                                    <div class="text-sm text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="sm:col-span-6">
                            <label for="tel_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                            <div class="mt-1">
                                <input type="number" name="tel_number" id="tel_number" value="{{ old('tel_number', $reservation->tel_number) }}" class="block w-full p-2 rounded-lg @error('tel_number') border-red-500 @enderror">
                                @error('tel_number')
                                    <div class="text-sm text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="sm:col-span-6">
                            <label for="res_date" class="block text-sm font-medium text-gray-700">Reservation Date</label>
                            <div class="mt-1">
                                <input type="datetime-local" name="res_date" id="res_date" value="{{ old('res_date', $reservation->res_date) }}" class="block w-full p-2 rounded-lg @error('res_date') border-red-500 @enderror">
                                @error('res_date')
                                    <div class="text-sm text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="sm:col-span-6">
                            <label for="guest_number" class="block text-sm font-medium text-gray-700">Guest Number</label>
                            <div class="mt-1">
                                <input type="number" name="guest_number" min="1" max="20" id="guest_number" value="{{ old('guest_number', $reservation->guest_number) }}" class="block w-full p-2 rounded-lg @error('guest_number') border-red-500 @enderror">
                                @error('guest_number')
                                    <div class="text-sm text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="sm:col-span-6">
                            <label for="table_id" class="block text-sm font-medium text-gray-700">Table</label>
                            <select id="table_id" name="table_id" class="block w-full rounded-lg @error('table_id') border-red-500 @enderror">
                                @foreach ($tables as $table)
                                     <option value="{{ $table->id }}" @selected($table->id == $reservation->table_id)>{{ $table->name }} ({{ $table->gust_number }} Guests)</option>
                                @endforeach
                                @error('table_id')
                                    <div class="text-sm text-red-500">{{ $message }}</div>
                                @enderror
                            </select>
                        </div>
                        <div class="mt-6">
                            <button type="submit" class="px-6 py-2 text-white bg-indigo-500 rounded-lg hover:bg-indigo-700">Store</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
