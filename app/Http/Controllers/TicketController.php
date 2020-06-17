<?php

namespace App\Http\Controllers;

use App\Http\Helpers\TicketStatus;
use App\Http\Requests\FindTicketRequest;
use App\Http\Requests\TicketResponseStoreRequest;
use App\Http\Requests\TicketStoreRequest;
use App\Mail\TicketCreated;
use App\Mail\TicketResponded;
use App\Repositories\TicketRepositoryInterface;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller
{
    use TicketStatus;

    protected $ticketRepository;

    /**
     * TicketController constructor.
     * @param TicketRepositoryInterface $ticketRepository
     */
    public function __construct(TicketRepositoryInterface $ticketRepository)
    {
        $this->ticketRepository = $ticketRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ticket.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ticket.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketStoreRequest $request)
    {
        $user = $request->email;
        $ticket = $this->ticketRepository->create($request);
        $reference_number = $ticket->reference_number;
        if (!empty($reference_number)) {
            $message = "Ticket created successfully! <br> Ticket reference number :  $reference_number ";
            Mail::to($user)->send(new TicketCreated($ticket));
            return back()->with('success', $message);
        }
        return back()->with('error', 'Something went wrong!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(FindTicketRequest $request)
    {
        $reference_number = $request->reference_number;
        $ticket = $this->ticketRepository->getTicketByReferenceNo($reference_number);
        return view('ticket.detail', compact('ticket'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(TicketResponseStoreRequest $request, $id)
    {
        $result = $this->ticketRepository->update($request, $id);
        if ($result) {
            $ticket = $this->ticketRepository->getTicketById($id);
            $user = $ticket->email;
            Mail::to($user)->send(new TicketResponded($ticket));
            return back()->with('success', 'Ticket updated successfully!');
        }

        return back()->with('error', 'Something went wrong!');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view()
    {
        return view('ticket.view');
    }
}
