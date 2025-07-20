@extends('layouts.adminlayout')

@section('content')
        <div class="flex items-center gap-2 mb-6 mt-14">
            <a href="{{ route('articles.index') }}">
                <div
                    class="flex items-center justify-center w-6 h-6 border-2 border-blue-600 rounded-full cursor-pointer hover:border-blue-700">
                    <i data-lucide="arrow-left" class="w-4 h-4 text-blue-600 hover:text-blue-700"></i>
                </div>
            </a>
        </div>
        @include('admin._form', [
        'action' => route('articles.store'),
        'method' => 'POST',
    ])
@endsection
