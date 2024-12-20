<x-layout>
    <x-student-layout :student="$student">
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
                                    <th class="px-4 py-2">Status</th>
                                    <th class="px-4 py-2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payments as $key => $payment)
                                    <tr class="border-t border-gray-200">
                                        <td class="px-4 py-2">semester {{ $key + 1 }}</td>
                                        <td class="px-4 py-2">Rp {{ $payment['total'] }}</td>
                                        <td
                                            class="px-4 py-2 {{ $payment['statusPembayaran'] === 'SUCCESS' ? 'text-green-500' : 'text-red-500' }}">
                                            {{ $payment['statusPembayaran'] }}</td>
                                        <td class="px-4 py-2">
                                            @if ($payment['statusPembayaran'] === 'SUCCESS')
                                                <button type="button"
                                                    class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 font-medium w-full"
                                                    onclick="printReceipt('{{ $student['data']['name'] }}', '{{ $key + 1 }}', '{{ $payment['total'] }}', '{{ $payment['updatedAt'] }}')">
                                                    Unduh Bukti Pembayaran
                                                </button>
                                            @else
                                                <button type="submit" disabled
                                                    class="bg-gray-500 text-white px-4 py-2 rounded font-medium w-full opacity-50 cursor-not-allowed">
                                                    unduh Bukti Pembayaran
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </x-student-layout>
</x-layout>

<script>
    function printReceipt(name, semester, total, updatedAt) {
        const receiptContent = `
            <html>
            <head>
                <title>Bukti Pembayaran - Semester ${semester}</title>
                <style>
                    body {
                        margin: 0;
                        padding: 0;
                        font-family: Arial, sans-serif;
                    }
                    .container {
                        width: 90%;
                        padding: 20px;
                    }
                    .header, .footer {
                        width: 100%;
                        text-align: center;
                        margin-bottom: 20px;
                    }
                    .content {
                        width: 100%;
                    }
                    table {
                        width: 100%;
                        border-collapse: collapse;
                    }
                    td, th {
                        border: 1px solid #cccccc;
                        padding: 8px;
                        text-align: left;
                    }
                    .text-right {
                        text-align: right;
                    }
                </style>
            </head>
            <body>
                <div class="container">
                    <div class="header">
                        <div style="text-align:right;">
                            <b>Sender:</b> Universitas XYZ
                        </div>
                        <div style="text-align: left;border-top:1px solid #000;">
                            <div style="font-size: 24px;color: #666;">INVOICE</div>
                        </div>
                    </div>
                    <div class="content">
                        <table>
                            <tr>
                                <td><b>Invoice:</b> #${semester}</td>
                                <td class="text-right"><b>Receiver:</b></td>
                            </tr>
                            <tr>
                                <td><b>Paid date:</b> ${new Date(updatedAt).toLocaleDateString()}</td>
                                <td class="text-right">Universitas XYZ</td>
                            </tr>
                            <tr>
                                <td><b>Print date:</b> ${new Date().toLocaleDateString()}</td>
                                <td class="text-right">${name}</td>
                            </tr>

                            <tr>
                                <td></td>
                                <td class="text-right">Jl. Pendidikan No. 1, Kota Pendidikan</td>
                            </tr>
                        </table>
                        <div style="border-bottom:1px solid #000; margin-top: 20px;">
                            <table>
                                <tr style="font-weight: bold;background-color:#f2f2f2;">
                                    <td>Item Description</td>
                                    <td class="text-right">Price (Rp)</td>
                                    <td class="text-right">Quantity</td>
                                    <td class="text-right">Subtotal (Rp)</td>
                                </tr>
                                <tr>
                                    <td>UKT Semester ${semester}</td>
                                    <td class="text-right">${total}</td>
                                    <td class="text-right">1</td>
                                    <td class="text-right">${total}</td>
                                </tr>
                                <tr style="font-weight: bold;">
                                    <td></td><td></td>
                                    <td class="text-right">Total (Rp)</td>
                                    <td class="text-right">${total}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div ">
                        <p><u>Kindly make your payment to</u>:<br/>
                        Bank: Bank BCA<br/>
                        A/C: 1234567890<br/>
                        </p>
                        <p><i>Note: Please send a remittance advice by email to finance@universitasxyz.ac.id</i></p>
                    </div>
                </div>
            </body>
            </html>
        `;
        const receiptWindow = window.open('', '_blank');
        receiptWindow.document.write(receiptContent);
        receiptWindow.document.close();
        receiptWindow.print();
    }
</script>
