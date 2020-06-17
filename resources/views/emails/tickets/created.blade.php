<p>Dear {{$ticket->customer_name}},</p>
<p>Your ticket has been created successfully</p>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if($ticket)
                        <div class="col-md-12">
                            <p><b> {{ __('Ticket Reference Number: ') }}</b> {{ $ticket->reference_number }}</p>
                            <p><b>{{ __('Ticket Status: ') }}</b> {{ $ticket->status }}</p>
                            <p><b>{{ __('Customer Name: ') }}</b> {{ $ticket->customer_name }}</p>
                            <p><b>{{ __('Subject: ') }}</b> {{ $ticket->subject }}</p>
                            <p><b>{{ __('Description: ') }}</b> {{ $ticket->description }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
