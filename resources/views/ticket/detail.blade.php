@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Ticket Status') }}</div>

                    <div class="card-body">
                        @if($ticket)
                            <div class="col-md-12">
                                <p><b> {{ __('Ticket Reference Number: ') }}</b> {{ $ticket->reference_number }}</p>
                                <p><b>{{ __('Ticket Status: ') }}</b> {{ $ticket->status }}</p>
                                <p><b>{{ __('Customer Name: ') }}</b> {{ $ticket->customer_name }}</p>
                                <p><b>{{ __('Subject: ') }}</b> {{ $ticket->subject }}</p>
                                <p><b>{{ __('Description: ') }}</b> {{ $ticket->description }}</p>
                            </div>
                            <div class="col-md-12">
                                <hr>
                                <h5><b>Response:</b></h5>
                                @if($ticket->ticketResponse)
                                    @foreach ($ticket->ticketResponse as $response)
                                        <p><b>{{ __('Agent: ') }}</b> {{$response->agent->name}}</p>
                                        <p><b>{{ __('Message: ') }}</b> <br> {{$response->response}}</p>
                                        <p><b>{{ __('Date: ') }}</b> <br> {{$response->created_at}}</p>
                                        <hr>
                                    @endforeach
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
