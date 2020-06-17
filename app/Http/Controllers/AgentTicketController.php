<?php

namespace App\Http\Controllers;

use App\Http\Helpers\TicketStatus;
use App\Http\Requests\TicketDetailRequest;
use App\Repositories\TicketRepositoryInterface;

class AgentTicketController extends Controller
{
    use TicketStatus;

    protected $ticketRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TicketRepositoryInterface $ticketRepository)
    {
        $this->ticketRepository = $ticketRepository;
        $this->middleware('auth');
    }

    /**
     * Display the specified resource.
     *
     * @param $ticket_id
     * @return void
     */
    public function view($ticket_id)
    {
        $ticket_status = $this->getStatusList();
        $ticket = $this->ticketRepository->getTicketById($ticket_id);
        return view('agent.ticket', compact('ticket', 'ticket_status'));
    }
}
