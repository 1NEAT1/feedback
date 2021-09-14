<?php

namespace App\Models\FeedBack;

interface IFeedBack
{

    public function store(array $request): bool;

    public function errors(): object;
}
