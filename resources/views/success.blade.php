@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Success register</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3 text-center">
                            <div class="col-md-12">
                                @php
                                    $link = route('game.secure_link', ['hash' => auth()->user()->secure_link]);
                                @endphp
                                Secure link: <a href="{{ $link }}">{{ $link}}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
