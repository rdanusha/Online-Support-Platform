<?php

namespace App\Repositories;

interface TicketRepositoryInterface
{
    public function all();

    public function create($request);

    public function update($request, $id);

    public function getTicketByReferenceNo($reference_number);
}
