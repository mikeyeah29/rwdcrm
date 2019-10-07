@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="stats">
                        <div class="stat">
                            <p>Positive Response Rate: <span>30%</span></p>
                            <p>Netural Response Rate: <span>40%</span></p>
                            <p>Negitive Response Rate: <span>30%</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            
        </div>

    </div>
</div>
@endsection
