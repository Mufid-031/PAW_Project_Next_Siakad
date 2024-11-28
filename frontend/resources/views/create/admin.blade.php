<x-layout>
    <x-sidebar>
        <div class="container mx-auto px-4 py-8">
            <div class="py-6">
                <div class="text-2xl font-bold text-gray-700">
                    <h1>Create Admin Panel</h1>
                    <p class="text-sm text-gray-500">Easily manage your administrators from here</p>
                </div>

                <div class="w-full max-w-lg bg-white/80 backdrop-blur-lg rounded-2xl shadow-2xl p-8 space-y-6">
                    <div class="text-center">
                        <div class="flex justify-center">
                            <svg class="w-16 h-16 text-ultramarine-600 animate-bounce" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4">
                                </path>
                            </svg>
                        </div>
                        <p class="mt-2 text-gray-600">Panel for creating Admin users</p>
                    </div>

                    <form class="space-y-6" action="/" method="POST">
                        <div class="space-y-4">
                            <div class="relative">
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                                <div class="flex items-center">
                                    <span class="absolute pl-4 text-gray-400">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5.121 17.804A4 4 0 116.207 8.5m11.586 8.5A4 4 0 1122 7.5M16 11a4 4 0 00-8 0v1a4 4 0 008 0v-1z" />
                                        </svg>
                                    </span>
                                    <input id="name" name="name" type="text" required
                                        class="pl-12 block w-full px-4 py-3 rounded-lg bg-white/50 border border-gray-300 focus:border-ultramarine-500 focus:ring-ultramarine-500 transition duration-200"
                                        placeholder="Enter your name">
                                </div>
                            </div>

                            <div class="relative">
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email
                                    Address</label>
                                <div class="flex items-center">
                                    <span class="absolute pl-4 text-gray-400">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 11V8a4 4 0 10-8 0v3m8-5.11a8 8 0 01-8 0m4-5.89v2m-4 5.89A8 8 0 104 20h16a8 8 0 00-4-6.11m0-5.89v5" />
                                        </svg>
                                    </span>
                                    <input id="email" name="email" type="email" required
                                        class="pl-12 block w-full px-4 py-3 rounded-lg bg-white/50 border border-gray-300 focus:border-ultramarine-500 focus:ring-ultramarine-500 transition duration-200"
                                        placeholder="Enter your email">
                                </div>
                            </div>

                            <div class="relative">
                                <label for="password"
                                    class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                                <div class="flex items-center">
                                    <span class="absolute pl-4 text-gray-400">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 7a4 4 0 018-4m0 0a4 4 0 008 4m-8 6a8 8 0 00-8-8M4 7v12a4 4 0 004 4h8a4 4 0 004-4V7" />
                                        </svg>
                                    </span>
                                    <input id="password" name="password" type="password" required
                                        class="pl-12 block w-full px-4 py-3 rounded-lg bg-white/50 border border-gray-300 focus:border-ultramarine-500 focus:ring-ultramarine-500 transition duration-200"
                                        placeholder="Enter your password">
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="submit"
                                class="w-full py-3 px-4 text-white bg-gradient-to-r from-ultramarine-600 to-ultramarine-700 hover:from-ultramarine-700 hover:to-ultramarine-800 rounded-lg font-medium shadow-lg transform hover:scale-[1.02] transition-all duration-200">
                                Create Admin
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-sidebar>
</x-layout>
