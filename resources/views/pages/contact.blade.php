@extends('layouts.pages')

@section('content')
    <div class="flex justify-center items-center">
        <div class="w-full sm:w-5/6 max-w-screen-xl">
            <div class="relative h-64 bg-cover bg-center rounded-xl overflow-hidden"
                style="background-image: url('https://plus.unsplash.com/premium_photo-1689701711379-154c21998787?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8cnVhbmdhbiUyMHJhcGF0fGVufDB8fDB8fHww');">
                <div class="absolute inset-0 bg-black opacity-50"></div>
                <div class="relative z-10 flex flex-col justify-center items-center h-full text-white">
                    <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-2">Hubungi Kami</h1>
                    <nav class="text-sm">
                        <ol class="list-none p-0 inline-flex">
                            <li class="flex items-center">
                                <a href="/" class="hover:text-gray-300">Home</a>
                                <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 320 512">
                                    <path
                                        d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" />
                                </svg>
                            </li>
                            <li>Contact</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-xl">
                <div class="p-6 bg-white">
                    <h1 class="text-3xl font-bold text-center mb-8 text-gray-800">Contact Us</h1>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <form action="" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                                        Name
                                    </label>
                                    <input
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="name" type="text" name="name" required>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                                        Email
                                    </label>
                                    <input
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="email" type="email" name="email" required>
                                </div>
                                <div class="mb-6">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="message">
                                        Message
                                    </label>
                                    <textarea
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="message" name="message" rows="5" required></textarea>
                                </div>
                                <div class="flex items-center justify-between">
                                    <button
                                        class="bg-gray-700 hover:bg-gray-300 transition duration-300 ease-in-out text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                        type="submit">
                                        Send Message
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <div class="mb-6">
                                <h3 class="text-lg font-semibold text-gray-800 mb-2">Address</h3>
                                <p class="text-gray-600">123 Main Street, City, Country, ZIP</p>
                            </div>
                            <div class="mb-6">
                                <h3 class="text-lg font-semibold text-gray-800 mb-2">Phone</h3>
                                <p class="text-gray-600">+1 234 567 890</p>
                            </div>
                            <div class="mb-6">
                                <h3 class="text-lg font-semibold text-gray-800 mb-2">Email</h3>
                                <p class="text-gray-600">contact@example.com</p>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800 mb-2">Working Hours</h3>
                                <p class="text-gray-600">Monday - Friday: 9AM - 5PM</p>
                                <p class="text-gray-600">Saturday: 10AM - 2PM</p>
                                <p class="text-gray-600">Sunday: Closed</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
