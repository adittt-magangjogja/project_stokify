@extends('layouts.dashboard')

@section('content')
    <section class="mx-auto max-w-2xl p-4 sm:p-6">
        <h1 class="mb-6 text-xl font-semibold text-gray-900 dark:text-white">Ubah kategori</h1>
        @include('admin.categories._form', ['action' => route('admin.categories.update', $category), 'method' => 'PUT', 'category' => $category])
    </section>
@endsection
