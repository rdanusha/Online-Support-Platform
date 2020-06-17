<?php


namespace App\Http\Helpers;


trait TicketStatus
{
    public $status_list = ['Pending', 'Open', 'Resolve', 'Close', 'Reopen'];

    function getStatusList()
    {
        return $this->status_list;
    }

}
