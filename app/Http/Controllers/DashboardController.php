<?php

namespace App\Http\Controllers;

use App\Repositories\TicketRepositoryInterface;

class DashboardController extends Controller
{
    protected $ticketRepository;

    /**
     * Create a new controller instance.
     *
     * @param TicketRepositoryInterface $ticketRepository
     */
    public function __construct(TicketRepositoryInterface $ticketRepository)
    {
        $this->ticketRepository = $ticketRepository;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tickets = $this->ticketRepository->all();
        return view('agent.index', compact('tickets'));
    }

}
