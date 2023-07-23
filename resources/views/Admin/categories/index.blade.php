<x-admin-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex justify-end p-2 m-2">
                <a href="{{ route('admin.categories.create') }}" class="px-4 py-2 text-white bg-indigo-500 rounded-lg hover:bg-indigo-700">New Category</a>
            </div>
            <div class="flex flex-col">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Image
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Description
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $category->name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        <img src="{{asset('storage/categories/'.$category->image)}}" alt="" class="w-20 h-12 rounded-md">
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $category->description }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="px-4 py-2 text-white bg-green-500 rounded-lg hover:bg-green-700">edit</a>
                                            <form action="{{ route('admin.categories.destroy', $category->id) }}"
                                                class="px-4 py-2 text-white bg-red-500 rounded-lg hover:bg-red-700"
                                                method="post"
                                                onsubmit="return confirm('Are you sure?');"
                                            >
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-admin-layout>
