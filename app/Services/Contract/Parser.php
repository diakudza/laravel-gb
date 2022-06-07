<?php

namespace App\Services\Contract;

use App\Models\News;

interface Parser
{
    public function setlink(string $link, int $category): Parser;
    public function parse();
    public function saveInNewsTable();
}
