<x-guest-layout>
    <div class="container min-h-screen px-5 mx-auto md:px-20">
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-center text-teal-400 uppercase">Our Categories</h1>
        </div>

        <div class="grid grid-cols-1 md:gap-8 md:grid-cols-4 gap-y-4">
            @foreach ($categories as $category)
                <div
                    class="w-full max-w-sm border border-gray-200 rounded-lg shadow bg-slate-100 dark:bg-gray-800 dark:border-gray-700">

                    <img class="p-8 rounded-t-lg w-full h-[250px]"
                        src="{{ asset('storage/categories/' . $category->image) }}" alt="product image" />

                    <div class="px-5 pb-5">
                        <a href="{{ route('categories.show', $category->id) }}">
                            <h5
                                class="text-xl font-semibold tracking-tight text-teal-400 dark:text-white hover:text-teal-700">
                                {{ $category->name }}</h5>
                        </a>
                        <p class="mb-5">{{ $category->description }}</p>

                        <div class="flex items-center justify-between">
                            {{-- <span class="text-3xl font-bold text-gray-900 dark:text-white">$599</span> --}}
                            <a href="{{ route('categories.show', $category->id) }}"
                                class="text-white bg-teal-400 hover:bg-teal-700 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-teal-400 dark:hover:bg-teal-700 dark:focus:ring-blue-800">See
                                More!</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</x-guest-layout>
