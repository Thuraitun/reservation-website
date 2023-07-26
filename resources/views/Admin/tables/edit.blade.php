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
                    <form action="{{ route('admin.tables.update', $table->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="sm:col-span-6">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <div class="mt-1">
                                <input type="text" value="{{ old('name',$table->name) }}" name="name" id="name" class="w-full rounded-lg @error('name') border-red-500 @enderror">
                                @error('name')
                                    <div class="text-sm text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="sm:col-span-6">
                            <label for="gust_number" class="block text-sm font-medium text-gray-700">Gust</label>
                            <div class="mt-1">
                                <input type="number" value="{{ old('gust_number',$table->gust_number) }}" name="gust_number" min="1" max="20" id="gust_number" class="block w-full rounded-lg @error('gust_number') border-red-500 @enderror">
                                @error('gust_number')
                                    <div class="text-sm text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="sm:col-span-6">
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <select id="status" name="status" class="block w-full rounded-lg @error('status') border-red-500 @enderror">
                                @foreach (App\Enums\TableStatus::cases() as $status)
                                     <option value="{{ $status->value }}" @if ($table->status->value === $status->value) selected @endif>{{ $status->name }}</option>
                                @endforeach
                                @error('status')
                                    <div class="text-sm text-red-500">{{ $message }}</div>
                                @enderror
                            </select>
                        </div>
                        <div class="sm:col-span-6">
                            <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                            <select id="location" name="location" class="block w-full rounded-lg @error('location') border-red-500 @enderror">
                                @foreach (App\Enums\TableLocation::cases() as $location)
                                     <option value="{{ $location->value }}" @if ($table->location->value === $location->value) selected @endif>{{ $location->name }}</option>
                                @endforeach
                                @error('location')
                                    <div class="text-sm text-red-500">{{ $message }}</div>
                                @enderror
                            </select>
                        </div>
                        <div class="mt-6">
                            <button type="submit" class="px-6 py-2 text-white bg-indigo-500 rounded-lg hover:bg-indigo-700">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
