@extends('layouts.adminlayout')

@section('content')
    
    @include('admin._form', [
        'action' => route('articles.store'),
        'method' => 'POST',
    ])
@endsection
