<div x-data="{ isOpen: false }" x-show="isOpen" @update-course-modal.window="isOpen = true"
  class="fixed inset-0 z-50 overflow-y-auto" x-transition.opacity x-cloak>
  <div class="flex items-center justify-center min-h-screen p-6">
    <div class="fixed inset-0 bg-gray-900 bg-opacity-50 transition-opacity" @click="isOpen = false"></div>

    <div class="relative bg-gray-50 rounded-lg w-full max-w-md p-8 shadow-xl">
      <div class="flex justify-between items-center mb-6 border-b border-gray-200 pb-4">
        <h3 class="text-lg font-semibold text-gray-800">Update Mata Kuliah</h3>
        <button @click="isOpen = false" class="text-gray-600 hover:text-gray-800">
          <x-ionicon-close-outline class="w-6 h-6" />
        </button>
      </div>

      <form action="#">
        <div class="flex flex-col">
          <div class="space-y-2">
            <label class="block text-sm font-medium text-gray-800">Nama Mata Kuliah</label>
            <input type="text" name="name"
              class="mt-1 block w-full rounded-md border-gray-300 bg-ultramarine-200 p-3 focus:border-ultramarine-500 focus:ring-ultramarine-500 shadow-sm">
          </div>
          <div class="space-y-2">
            <label class="block text-sm font-medium text-gray-800">Kode Mata Kuliah</label>
            <input type="text" name="code"
              class="mt-1 block w-full rounded-md border-gray-300 bg-ultramarine-200 p-3 focus:border-ultramarine-500 focus:ring-ultramarine-500 shadow-sm">
          </div>

          <div class="space-y-2">
            <label class="block text-sm font-medium text-gray-800">Program Studi</label>
            <input type="text" name="code"
              class="mt-1 block w-full rounded-md border-gray-300 bg-ultramarine-200 p-3 focus:border-ultramarine-500 focus:ring-ultramarine-500 shadow-sm">
          </div>

          <div class="space-y-2">
            <label class="block text-sm font-medium text-gray-800">Dosen Pengajar</label>
            <input type="text" name="lecturer"
              class="mt-1 block w-full rounded-md border-gray-300 bg-ultramarine-200 p-3 focus:border-ultramarine-500 focus:ring-ultramarine-500 shadow-sm">
          </div>
        </div>

        <div class="flex justify-end gap-4 pt-6 mt-6 border-t border-gray-200">
          <button type="button" @click="isOpen = false"
            class="px-6 py-2.5 bg-red-500 text-white rounded-md hover:bg-red-900 transition-colors">
            Batal
          </button>
          <button type="submit"
            class="px-6 py-2.5 bg-ultramarine-400 text-white rounded-md hover:bg-ultramarine-900 transition-colors">
            Simpan
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
