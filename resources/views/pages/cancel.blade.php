@extends('layouts.page')

@section('content')

    <div class="container">
        @if ($message)
            <div class="row mt-5">
                <div class="col">
                    <h3 class="text-center">{{ $message }}</h3>
                </div>
            </div>
        @endif
    </div>

@endsection
