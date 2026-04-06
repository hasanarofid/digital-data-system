<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Digital - {{ date('d/m/Y') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            .no-print { display: none; }
            body { background: white; }
            .print-break { page-break-after: always; }
        }
        body { font-family: 'Inter', sans-serif; background-color: #f8fafc; }
    </style>
</head>
<body class="p-8">
    <div class="max-w-5xl mx-auto bg-white p-10 shadow-sm border border-slate-200">
        <!-- Header -->
        <div class="flex justify-between items-start border-b-2 border-slate-900 pb-8 mb-8">
            <div>
                <h1 class="text-4xl font-black text-slate-900 uppercase italic tracking-tighter mb-2">DigitalData</h1>
                <p class="text-xs text-slate-500 font-bold uppercase tracking-widest">Field Data Collection System | Laporan Resmi</p>
            </div>
            <div class="text-right">
                <p class="text-xs font-black uppercase text-slate-900">Tanggal Cetak</p>
                <p class="text-xl font-bold text-slate-700">{{ date('d F Y') }}</p>
                <p class="text-[10px] text-slate-400 font-mono mt-1">REF: DD-{{ date('YmdHis') }}</p>
            </div>
        </div>

        <!-- Summary Stats -->
        <div class="grid grid-cols-4 gap-4 mb-8">
            <div class="p-4 bg-slate-50 border border-slate-200 rounded-lg">
                <p class="text-[10px] font-black uppercase text-slate-400 mb-1">Total Entri</p>
                <p class="text-2xl font-black text-slate-900">{{ $data->count() }}</p>
            </div>
            <div class="p-4 bg-slate-50 border border-slate-200 rounded-lg">
                <p class="text-[10px] font-black uppercase text-slate-400 mb-1">Terverifikasi</p>
                <p class="text-2xl font-black text-green-600">{{ $data->where('status', 'verified')->count() }}</p>
            </div>
            <div class="p-4 bg-slate-50 border border-slate-200 rounded-lg">
                <p class="text-[10px] font-black uppercase text-slate-400 mb-1">Pending</p>
                <p class="text-2xl font-black text-yellow-600">{{ $data->where('status', 'pending')->count() }}</p>
            </div>
            <div class="p-4 bg-slate-50 border border-slate-200 rounded-lg">
                <p class="text-[10px] font-black uppercase text-slate-400 mb-1">Admin</p>
                <p class="text-2xl font-black text-slate-900">{{ auth()->user()->name }}</p>
            </div>
        </div>

        <!-- Table -->
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-900 text-white uppercase text-[10px] font-black tracking-widest">
                    <th class="p-4 border border-slate-800">No</th>
                    <th class="p-4 border border-slate-800">Nama Lengkap</th>
                    <th class="p-4 border border-slate-800">NIK</th>
                    <th class="p-4 border border-slate-800">Program</th>
                    <th class="p-4 border border-slate-800">Operator</th>
                    <th class="p-4 border border-slate-800 text-center">Status</th>
                    <th class="p-4 border border-slate-800">Tanggal</th>
                </tr>
            </thead>
            <tbody class="text-[11px] font-medium text-slate-700">
                @foreach($data as $index => $item)
                <tr class="{{ $index % 2 == 0 ? 'bg-white' : 'bg-slate-50' }} border-b border-slate-200">
                    <td class="p-4 border-x border-slate-200 text-center font-bold">{{ $index + 1 }}</td>
                    <td class="p-4 border-x border-slate-200 uppercase font-bold text-slate-900">{{ $item->name }}</td>
                    <td class="p-4 border-x border-slate-200 font-mono">{{ $item->nik }}</td>
                    <td class="p-4 border-x border-slate-200 uppercase text-[9px] font-black text-blue-600">{{ $item->program->name }}</td>
                    <td class="p-4 border-x border-slate-200">{{ $item->user->name }}</td>
                    <td class="p-4 border-x border-slate-200 text-center">
                        <span class="px-2 py-0.5 rounded text-[9px] font-black uppercase {{ $item->status == 'verified' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                            {{ $item->status }}
                        </span>
                    </td>
                    <td class="p-4 border-x border-slate-200">{{ $item->created_at->format('d/m/Y H:i') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Footer for Print -->
        <div class="mt-12 flex justify-between items-end italic text-slate-400 text-[10px]">
            <p>Dicetak secara otomatis oleh Sistem Digital Data pada {{ date('d/m/Y H:i:s') }}</p>
            <div class="text-right border-t border-slate-200 pt-8 mt-8 w-48 no-print">
                <p class="mb-12 not-italic font-black text-slate-900 uppercase">Tanda Tangan Admin</p>
                <div class="h-0.5 bg-slate-200 w-full mb-1"></div>
                <p class="not-italic font-bold text-slate-600 text-[11px]">{{ auth()->user()->name }}</p>
            </div>
        </div>
    </div>

    <!-- Print Action Floating Button -->
    <div class="fixed bottom-8 right-8 no-print flex gap-4">
        <button onclick="window.history.back()" class="px-6 py-3 bg-slate-200 text-slate-700 rounded-full font-black uppercase text-xs hover:bg-slate-300 transition-all shadow-xl">Kembali</button>
        <button onclick="window.print()" class="px-8 py-3 bg-slate-900 text-white rounded-full font-black uppercase text-xs hover:scale-105 transition-all shadow-xl shadow-slate-900/20">Cetak Ke PDF</button>
    </div>
</body>
</html>
