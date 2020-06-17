@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        <div class="card-title">
                            Tickets
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Ref. Number</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($tickets)
                                    @foreach($tickets AS $ticket)
                                        <tr class="@if($ticket->status=='Pending')table-danger @endif">
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>{{$ticket->reference_number}}</td>
                                            <td>{{$ticket->subject}}</td>
                                            <td>{{$ticket->customer_name}}</td>
                                            <td>{{$ticket->email}}</td>
                                            <td>{{$ticket->phone}}</td>
                                            <td>{{$ticket->status}}</td>
                                            <td><a href="{{route('ticket-detail',$ticket->id)}}">View</a></td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>

                        {{ $tickets->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
