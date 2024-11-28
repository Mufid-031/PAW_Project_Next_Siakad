<x-admin-layout>
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-lg bg-white/80 backdrop-blur-lg rounded-2xl shadow-2xl p-8 space-y-6">
            <div class="text-center">
                <div class="flex justify-center">
                    <svg class="w-16 h-16 text-ultramarine-600" animate-bounce fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4">
                        </path>
                    </svg>
                </div>
                <h2 class="mt-4 text-4xl font-bold text-gray-900">Welcome Back</h2>
                <p class="mt-2 text-gray-600">Please sign in to your admin account</p>
            </div>

            <form class="space-y-6" action="/admin/dashboard" method="">
                <div class="space-y-4">
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                        <input id="email" name="email" type="email" required
                            class="block w-full px-4 py-3 rounded-lg bg-white/50 border border-gray-300 focus:border-ultramarine-500 focus:ring-ultramarine-500 transition duration-200"
                            placeholder="Enter your email">
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input id="password" name="password" type="password" required
                            class="block w-full px-4 py-3 rounded-lg bg-white/50 border border-gray-300 focus:border-ultramarine-500 focus:ring-ultramarine-500 transition duration-200"
                            placeholder="Enter your password">
                    </div>
                </div>
                <div>
                    <button type="submit"
                        class="w-full py-3 px-4 text-white bg-gradient-to-r from-ultramarine-600 to-ultramarine-700 hover:from-ultramarine-700 hover:to-ultramarine-800 rounded-lg font-medium shadow-lg transform hover:scale-[1.02] transition-all duration-200">
                        Sign in
                    </button>
                </div>

                <div class="text-center text-sm text-gray-600">
                    <a href="#" class="hover:text-ultramarine-600 transition-colors duration-200">Forgot your
                        password?</a>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
