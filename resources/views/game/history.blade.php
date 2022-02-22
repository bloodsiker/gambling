@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">
                    @include('layouts.include._navbar')
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Number</th>
                                    <th scope="col">Win/Lose</th>
                                    <th scope="col">Profit</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($histories as $history)
                                    <tr>
                                        <th scope="row">{{ $history->id }}</th>
                                        <td>{{ $history->user->username }}</td>
                                        <td>{{ $history->number }}</td>
                                        <td>{{ $history->result === 1 ? 'Win' : 'Lose' }}</td>
                                        <td>{{ $history->profit }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
