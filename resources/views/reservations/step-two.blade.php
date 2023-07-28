<x-guest-layout>
    <div class="container min-h-screen mx-auto">
        <div class="shadow-lg md:mx-56 md:flex-row shadow-teal-400 ">
            <h1 class="py-4 text-2xl font-bold text-center text-teal-400">Reservation</h1>
            <div class="flex flex-col md:justify-center md:items-center md:flex-row">
                <div class="md:w-1/2 ">
                    <img class="w-full h-full"
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQd1YMi6pLwYWj9BCOfSuM3rNlBl8bLteGH1PbkXLz4gKiDj67kXhHt8ql0yGXVsnpSv9A&usqp=CAU"
                        alt="">
                </div>
                <div class="px-10 md:w-1/2">
                    <h1 class="mb-3 text-lg font-bold text-center text-gray-900">Step Two</h1>

                    <div class="w-full my-4 bg-gray-200 rounded-full">
                        <div class="p-1 text-xs font-bold leading-none text-center text-white bg-teal-400 rounded-full w-100">Step two</div>
                    </div>
                    <form action="{{ route('reservations.store.step.two') }}" method="post">
                        @csrf
                        <div class="sm:col-span-6">
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
                        </div>
                        <div class="flex md:justify-between md:mt-14 md:flex-row flex-col space-y-3 md:space-y-0 mb-5 md:mb-0 mt-3 justify-center">
                            <a href="{{ route('reservations.step.one') }}" class="px-6 py-2 text-white bg-teal-400 rounded-lg hover:bg-teal-700 text-center">Previous</a>
                            <button type="submit"
                                class="px-6 py-2 text-white bg-teal-400 rounded-lg hover:bg-teal-700">Make Reservation</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
