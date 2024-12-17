<x-student-layout :student="$student">
    <x-layout>
        <main class="ml-20 mr-20 mt-5">
            <div class="container mx-auto">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h1 class="text-2xl font-bold text-center mb-5">Histori Pembayaran UKT</h1>
                    <div class="container mx-auto">
                        <table class="table-auto w-full bg-white shadow-md rounded border border-gray-200">
                            <thead>
                                <tr class="bg-gray-200 text-left">
                                    <th class="px-4 py-2">Semester</th>
                                    <th class="px-4 py-2">Jumlah Dibayar</th>
                                    <th class="px-4 py-2">Metode Pembayaran</th>
                                    <th class="px-4 py-2">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payments as $payment)
                                <tr class="border-t border-gray-200">
                                    <td class="px-4 py-2">{{ $payment->semester }}</td>
                                    <td class="px-4 py-2">Rp {{ number_format($payment->amount, 0, ',', '.') }}</td>
                                    <td class="px-4 py-2">{{ $payment->method }}</td>
                                    <td class="px-4 py-2 text-{{ $payment->status == 'SUCCESS' ? 'green' : ($payment->status == 'PENDING' ? 'yellow' : 'red') }}-600 font-bold">{{ $payment->status }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </x-layout>
</x-student-layout>