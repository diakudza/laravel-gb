<?php

namespace App\Services;

use App\Models\News;
use App\Services\Contract\Parser;
use SimpleXMLElement;

class ParserService implements Contract\Parser
{
    protected string $link;
    protected $array;

    public function setlink(string $link): Parser
    {
        $this->link = $link;
        return $this;
    }

    public function parse()
    {
        $xml = simplexml_load_file($this->link);
        foreach ($xml->channel->item as $item) {
            $this->array[] = $item;
        }
        return $this;
    }

    public function saveInNewsTable()
    {
        foreach ($this->array as $item) {
            $news = new News;
            $news->title = $item->title;
            $news->text = $item->description;
            $news->link = $item->link;
            $news->source = 'parser';
            $news->save();
        }
    }
}
