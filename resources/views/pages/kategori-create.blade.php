@extends('layouts.dashboard')
@section('content')<main class="mx-auto max-w-2xl p-6"><h1 class="mb-5 text-2xl font-bold">Tambah kategori</h1><form method="POST" action="{{ route('kategori.store') }}" class="space-y-4">@csrf
<label class="block">Nama<input class="mt-1 block w-full rounded border p-2" name="name" value="{{ old('name') }}" required>@error('name')<span class="text-red-600">{{ $message }}</span>@enderror</label>
<label class="block">Deskripsi<textarea class="mt-1 block w-full rounded border p-2" name="description">{{ old('description') }}</textarea></label><button class="rounded bg-blue-700 px-4 py-2 text-white">Simpan</button> <a href="{{ route('kategori.index') }}">Batal</a></form></main>@endsection
