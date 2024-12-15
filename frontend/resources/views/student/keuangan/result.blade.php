<x-student-layout :student="$student">
    <x-layout>
        <main class="ml-20 mr-20 mt-5">
            <div class="container mx-auto">
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <h1 class="text-2xl font-bold mb-5">Pembayaran</h1>
                    <p class="mb-5">{{ strToUpper($student['data']['name']) }} Silakan selesaikan pembayaran Anda.</p>
                    <button id="pay-button" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Bayar Sekarang</button>
                </div>
            </div>
        </main>
    </x-layout>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
    <script>
        const payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
            snap.pay('{{ $snapToken }}');
        });
    </script>
</x-student-layout>


