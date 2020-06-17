<?php


namespace App\Repositories;


use App\Ticket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TicketRepository implements TicketRepositoryInterface
{

    /**
     * Return all records with pagination
     * @return mixed
     */
    public function all()
    {
        return Ticket::paginate(10);
    }


    /**
     * Create a ticket
     * @param $request
     * @return mixed
     */
    public function create($request)
    {
        $reference_number = Str::random(6);

        $data = [
            'subject' => $request->subject,
            'priority' => $request->priority,
            'description' => $request->description,
            'customer_name' => $request->customer_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'reference_number' => $reference_number,
            'status' => 'Pending',
        ];

        return Ticket::create($data);

    }

    /**
     * Update ticket status and add Ticket Response
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        $response = $request->response;
        $status = $request->status;
        $agent_id = Auth::id();

        $ticket = Ticket::find($id);
        $ticket->status = $status;

        $ticket_response_data = [
            'agent_id' => $agent_id,
            'ticket_id' => $ticket->id,
            'response' => $response
        ];
        $ticket->ticketResponse()->create($ticket_response_data);

        return $ticket->save();
    }

    /**
     * Get ticket by Reference
     * @param $reference_number
     * @return mixed
     */
    public function getTicketByReferenceNo($reference_number)
    {
        return Ticket::where('reference_number', $reference_number)->first();
    }

    /**
     * Get ticket by ID
     * @param $id
     * @return mixed
     */
    public function getTicketById($id)
    {
        return Ticket::find($id);
    }

}
