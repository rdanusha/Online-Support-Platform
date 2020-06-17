@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Ticket Details') }}</div>

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
                            <div class="col-md-12">
                                @include('layouts.flash-message')
                                <form method="POST" action="{{ route('ticket.update',$ticket->id) }}" novalidate>
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row">
                                        <label for="name"
                                               class="col-md-3 col-form-label text-md-right">{{ __('Response Message') }}</label>
                                        <div class="col-md-6">
                                            <textarea id="response" type="text"
                                                      class="form-control @error('response') is-invalid @enderror"
                                                      name="response" required>{{ old('response') }}</textarea>
                                            @error('response')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name"
                                               class="col-md-3 col-form-label text-md-right">{{ __('Ticket Status') }}</label>
                                        <div class="col-md-6">
                                            <select id="status" type="text"
                                                    class="form-control @error('status') is-invalid @enderror"
                                                    name="status" required>
                                                @foreach($ticket_status as $status)
                                                    <option value="{{ $status }}">{{$status}}</option>
                                                @endforeach

                                            </select>
                                            @error('status')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Submit Response') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
