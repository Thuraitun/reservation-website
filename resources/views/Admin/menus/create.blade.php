<x-admin-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex p-2">
                <a href="{{ route('admin.menus.index') }}" class="px-4 py-2 text-white bg-indigo-500 rounded-lg hover:bg-indigo-700">Back</a>
            </div>
            <div class="p-2">
                <div class="flex content-center mt-4 space-y-8 divide-y divide-gray-200 md:flex-col">
                    <form action="{{ route('admin.menus.store') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="sm:col-span-6">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <div class="mt-1">
                                <input type="text" name="name" id="name" class="w-full rounded-lg @error('name') border-red-500 @enderror">
                                @error('name')
                                    <div class="text-sm text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="sm:col-span-6">
                            <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                            <div class="mt-1">
                                <input type="file" name="image" id="image" class="block w-full p-2 border border-gray-700 rounded-lg @error('image') border-red-500 @enderror">
                                @error('image')
                                    <div class="text-sm text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="sm:col-span-6">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <div class="mt-1">
                                <textarea name="description" id="description" cols="10" rows="5" class="block w-full rounded-lg @error('description') border-red-500 @enderror"></textarea>
                                @error('description')
                                    <div class="text-sm text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="sm:col-span-6">
                            <label for="categories" class="block text-sm font-medium text-gray-700">Category Name</label>
                            <select id="categories" name="categories[]" multiple class="block w-full rounded-lg ">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                                @error('categories')
                                    <div class="text-sm text-red-500">{{ $message }}</div>
                                @enderror
                            </select>
                        </div>
                        <div class="sm:col-span-6">
                            <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                            <div class="mt-1">
                                <input type="number" name="price" id="price" class="block w-full p-2 rounded-lg @error('price') border-red-500 @enderror">
                                @error('price')
                                    <div class="text-sm text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
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
