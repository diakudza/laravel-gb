<?php

namespace App\Services\Contract;

interface Parser
{
    public function setlink(string $link): Parser;
    public function parse();
    public function saveInNewsTable();
}
