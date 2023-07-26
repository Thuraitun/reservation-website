<x-guest-layout>
    <div class="container h-screen mx-auto ">
        <div class="flex flex-col items-center md:flex-row md:py-14 pt-14">
            <div class="md:w-1/2 space-y-11">
                <h2 class="text-3xl font-bold text-center uppercase text-slate-500">Welcome to Reservation</h2>
                <div class="flex items-center justify-center md:m-28">
                    <p class="text-center">Lorem, ipsum dolor sit amet consectetur adipisicing elit. obcaecati delectus
                        nam. Ex voluptas veniam sapiente dolorum veritatis, officiis beatae modi ea qui voluptates.</p>
                </div>
                <a href="{{ route('reservations.step.one') }}" class="flex justify-center">
                    <button class="px-8 py-3 text-white bg-teal-500 rounded-lg hover:bg-teal-900">Reservation</button>
                </a>
            </div>
            <div class="flex justify-center mt-10 md:w-1/2 md:mt-0">
                <img src="https://img.freepik.com/premium-vector/people-eating-japanese-food-restaurant-with-various-delicious-dishes-cartoon-illustration_2175-5780.jpg"
                    class="" alt="">
            </div>
        </div>
    </div>
    <div class="container h-screen mx-auto">
        <div class="">
            <h1 class="text-4xl font-bold text-center text-teal-400">About Us</h1>
        </div>
        <div class="flex flex-col items-center justify-center md:flex-row">
            <div class="p-2 space-y-5 md:p-20 md:w-1/2">
                <h2 class="text-4xl font-bold text-teal-400 uppercase">Why choose us?</h2>
                <p class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum deleniti neque dolores totam officia? Nostrum quasi at quaerat dolore tempora sit, tempore voluptate magnam enim non doloremque recusandae, doloribus porro.</p>
                <p class="">Lorem ipsum dolor sit amet consec</p>
                <p class="">Lorem ipsum dolor sit amet consec</p>
                <p class="">Lorem ipsum dolor sit amet consec</p>
            </div>
            <div class="flex justify-center md:w-1/2">
                <img src="https://img.freepik.com/premium-vector/restaurant-routine-isolated-cartoon-vector-illustrations_107173-22173.jpg" alt="">
            </div>
        </div>
    </div>
    <div class="container mx-auto my-12">
        <div class="my-10">
            <h1 class="text-xl font-bold text-center text-gray-500">Our Menu</h1>
            <h1 class="mt-3 text-3xl font-bold text-center text-teal-400 uppercase">Today's Speciality</h1>
        </div>

        {{-- menu card --}}
        <div class="grid grid-cols-1 md:gap-8 md:grid-cols-4 gap-y-4">
            @foreach ($specials->menus as $menu)
                <div
                    class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="p-8 rounded-t-lg w-full h-[250px]" src="{{ asset('storage/menus/' . $menu->image) }}" alt="product image" />
                    </a>
                    <div class="px-5 pb-5">
                        <a href="#">
                            <h5 class="text-xl font-semibold tracking-tight text-teal-400 dark:text-white">{{ $menu->name }}</h5>
                        </a>
                        <div class="flex items-center mt-2.5 mb-5">
                            <svg class="w-4 h-4 mr-1 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 22 20">
                                <path
                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                            <svg class="w-4 h-4 mr-1 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 22 20">
                                <path
                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                            <svg class="w-4 h-4 mr-1 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 22 20">
                                <path
                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                            <svg class="w-4 h-4 mr-1 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 22 20">
                                <path
                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                            <svg class="w-4 h-4 text-gray-200 dark:text-gray-600" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path
                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                            <span
                                class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">5.0</span>
                        </div>
                        <p class="">{{ $menu->description }}</p>
                        <div class="flex items-center justify-between">
                            <span class="text-lg font-bold text-gray-900 dark:text-white">{{ $menu->price }} MMK</span>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-guest-layout>
