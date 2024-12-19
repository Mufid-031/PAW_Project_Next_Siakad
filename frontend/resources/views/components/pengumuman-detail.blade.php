<div id="detailModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        
        <div class="relative bg-white rounded-xl shadow-xl max-w-2xl w-full p-6 transform transition-all">
            <div class="absolute top-4 right-4">
                <button onclick="closeDetailModal()" class="text-gray-400 hover:text-gray-500">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="mt-3">
              <div class="flex items-center text-sm text-gray-500 mb-4">
                  <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                  </svg>
                  <span id="detailDate"></span>
              </div>
                <h3 id="detailTitle" class="text-2xl font-bold text-gray-900 mb-4"></h3>
                <div class="prose max-w-none">
                    <p id="detailContent" class="text-gray-600"></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function openDetailModal(id, judul, konten, tanggal) {
    document.getElementById('detailTitle').textContent = judul;
    document.getElementById('detailContent').textContent = konten;
    document.getElementById('detailDate').textContent = formatDate(tanggal);
    document.getElementById('detailModal').classList.remove('hidden');
}

function closeDetailModal() {
    document.getElementById('detailModal').classList.add('hidden');
}

function formatDate(dateString) {
    const options = { day: 'numeric', month: 'short', year: 'numeric' };
    return new Date(dateString).toLocaleDateString('id-ID', options);
}
</script>
