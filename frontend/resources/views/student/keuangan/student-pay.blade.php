{{-- {{ dd($payments) }} --}}

<x-layout>
    <x-student-layout :student="$student">
        <main class="ml-20 mr-20 mt-5">
            <div class="container mx-auto">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h1 class="text-2xl font-bold mb-5">Form Pembayaran UKT</h1>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium">Nama</label>
                        <input type="text" value="{{ $student['data']['name'] }}" readonly
                            class="w-full border px-3 py-2 rounded bg-gray-100" name="name" id="name">
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="py-2 px-4 border text-left">Semester</th>
                                    <th class="py-2 px-4 border text-left">Total UKT</th>
                                    <th class="py-2 px-4 border text-left">Sudah Dibayar</th>
                                    <th class="py-2 px-4 border text-left">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payments as $key => $payment)
                                    <form method="POST" action="{{ route('payment.process') }}">
                                        @csrf
                                        <input type="hidden" value="{{ $student['data']['name'] }}" readonly
                                            class="w-full border px-3 py-2 rounded bg-gray-100" name="name"
                                            id="name">
                                        <input type="hidden" name="email" id="email"
                                            value="{{ $student['data']['email'] }}">
                                        <tr>
                                            <td class="py-2 px-4 border">
                                                <input type="text" value="semester_{{ $key + 1 }}"
                                                    name="semester" readonly
                                                    class="w-full border px-3 py-2 rounded bg-gray-100">
                                            </td>
                                            <td class="py-2 px-4 border">
                                                <input type="text" value="{{ $payment['total'] }}" name="amount"
                                                    readonly class="w-full border px-3 py-2 rounded bg-gray-100">
                                            </td>
                                            <td class="py-2 px-4 border">
                                                <input type="text" value="{{ $payment['statusPembayaran'] }}"
                                                    name="paidAmount" readonly
                                                    class="w-full border px-3 py-2 rounded bg-gray-100">
                                            </td>
                                            <td class="py-2 px-4 border">
                                                @if ($payment['statusPembayaran'] === 'SUCCESS')
                                                    <button type="button" disabled
                                                        class="bg-gray-500 text-white px-4 py-2 rounded font-medium w-full opacity-50 cursor-not-allowed">
                                                        Sudah Dibayar
                                                    </button>
                                                @else
                                                    <button type="submit"
                                                        class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 font-medium w-full">
                                                        Bayar Sekarang
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                    </form>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </x-student-layout>
</x-layout>
