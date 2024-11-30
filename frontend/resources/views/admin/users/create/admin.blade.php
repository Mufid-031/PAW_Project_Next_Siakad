<x-admin-layout>
    <x-admin-sidebar>
        <div class="container mx-auto px-4 py-8">
            <div class="p-4 border-2 border-gray-200 rounded-lg">
                <div class="mb-4">
                    <h2 class="text-2xl font-bold">Manajemen Akun Admin</h2>
                    <p class="text-sm text-gray-500">Kelola administrator Anda dengan mudah dari sini</p>
                </div>

                <form action="" class="space-y-4">
                    <div class="flex flex-col gap-4">
                        <div>
                            <label class="block text-base font-medium text-gray-700">Nama</label>
                            <input type="text" name="name"
                                class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm">
                        </div>

                        <div>
                            <label class="block text-base font-medium text-gray-700">Email</label>
                            <input type="email" name="email"
                                class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm">
                        </div>

                        <div>
                            <label class="block text-base font-medium text-gray-700">Password</label>
                            <input type="password" name="password"
                                class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm">
                        </div>
                    </div>
                    <div class="flex justify-end gap-4 pt-6 mt-6 border-t border-gray-200">
                        <a href="/admin/users"
                            class="px-6 py-2.5 bg-red-500 text-white rounded-md hover:bg-red-900 transition-colors">
                            Batal
                        </a>
                        <button type="submit"
                            class="px-6 py-2.5 bg-ultramarine-400 text-white rounded-md hover:bg-ultramarine-900 transition-colors">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </x-admin-sidebar>
</x-admin-layout>
