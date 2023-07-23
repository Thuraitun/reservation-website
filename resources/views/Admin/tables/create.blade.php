<x-admin-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex p-2 m-2">
                <a href="{{ route('admin.tables.index') }}" class="px-4 py-2 text-white bg-indigo-500 rounded-lg hover:bg-indigo-700">Back</a>
            </div>
            <div class="p-2 m-2">
                <div class="flex content-center mt-10 space-y-8 divide-y divide-gray-200 md:flex-col">
                    <form action="{{ route('admin.tables.store') }}" method="post">
                        @csrf

                        <div class="sm:col-span-6">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <div class="mt-1">
                                <input type="text" name="name" id="name" class="w-full rounded-lg ">
                            </div>
                        </div>
                        <div class="sm:col-span-6">
                            <label for="gust_number" class="block text-sm font-medium text-gray-700">Gust</label>
                            <div class="mt-1">
                                <input type="number" name="gust_number" id="gust_number" class="block w-full rounded-lg">
                            </div>
                        </div>
                        <div class="sm:col-span-6">
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <select id="status" name="status" class="block w-full rounded-lg">
                                @foreach (App\Enums\TableStatus::cases() as $status)
                                     <option value="{{ $status->value }}">{{ $status->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="sm:col-span-6">
                            <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                            <select id="location" name="location" class="block w-full rounded-lg">
                                @foreach (App\Enums\TableLocation::cases() as $location)
                                     <option value="{{ $location->value }}">{{ $location->name }}</option>
                                @endforeach
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
