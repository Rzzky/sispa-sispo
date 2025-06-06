@extends('layout.app') {{-- pastikan sudah pakai "layouts" sesuai struktur folder --}}

@section('title', 'Form Peminjaman')

@section('content')
<div class="bg-white rounded-lg shadow-lg p-6 max-w-3xl mx-auto">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Form Peminjaman</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-4 rounded mb-6">
            <strong>Terjadi kesalahan:</strong>
            <ul class="list-disc pl-5 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('peminjaman.store') }}" method="POST" class="space-y-5">
        @csrf

        <div>
            <label for="id_user" class="block text-sm font-medium text-gray-700 mb-1">ID User</label>
            <input type="text" name="id_user" class="w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
        </div>

        <div>
            <label for="id_barang" class="block text-sm font-medium text-gray-700 mb-1">Pilih Barang</label>
            <select name="id_barang" class="w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                @foreach ($barangs as $barang)
                    <option value="{{ $barang->id_barang }}">{{ $barang->nama_barang }} (Stok: {{ $barang->jumlah }})</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="jumlah" class="block text-sm font-medium text-gray-700 mb-1">Jumlah</label>
            <input type="number" name="jumlah" min="1" class="w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
        </div>

        <div>
            <label for="tanggal_pinjam" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Pinjam</label>
            <input type="date" name="tanggal_pinjam" class="w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
        </div>

        <div>
            <label for="label_status" class="block text-sm font-medium text-gray-700 mb-1">Label Status (Opsional)</label>
            <select name="label_status" class="w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                <option value="menunggu" selected>Menunggu</option>
                <option value="selesai">Selesai</option>
                <option value="penting">Penting</option>
            </select>
        </div>

        <div class="pt-4">
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition duration-300">
                <i class="fas fa-paper-plane mr-2"></i>Ajukan Peminjaman
            </button>
        </div>
    </form>
</div>
@endsection
