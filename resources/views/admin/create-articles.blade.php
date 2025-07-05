@extends('layouts.adminlayout')

@section('content')
<div class="p-6 bg-white rounded-lg shadow">
    <h2 class="text-2xl font-bold  mb-4 mr-4">Tambah Artikel</h2>
    
    @include('admin._form', [
        'action' => route('articles.store'),
        'method' => 'POST',
    ])
</div>
@endsection
