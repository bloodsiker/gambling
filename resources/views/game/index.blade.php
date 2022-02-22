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
                            <div class="input-group">
                                <input type="text" id="secureLink" value="{{ route('game.secure_link', ['hash' => auth()->user()->secure_link]) }}" readonly class="form-control" placeholder="Secure link">
                                <button class="btn btn-outline-success" id="btnNewLink" type="button">Generate new link</button>
                                <button class="btn btn-outline-danger" id="btnDeactivateLink" type="button">Deactivate link</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="container-numbers">
                                <div class="number">
                                    0
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center fs-2">
                            <div class="container-profit">

                            </div>
                        </div>
                        <div class="col-md-12 text-center mb-2">
                            <button class="btn btn-success" id="btnLucky" type="button">Im feeling lucky</button>
                        </div>
                        <div class="col-md-12 text-center">
                             <a href="{{ route('game.history') }}" class="btn btn-warning" type="button">History</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>


    </script>
@endpush
