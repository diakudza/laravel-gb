<?php

namespace App\Services;

use App\Models\News;
use App\Models\Source;
use App\Services\Contract\Parser;
use SimpleXMLElement;

class ParserService implements Contract\Parser
{
    protected string $link;
    protected $array;
    protected $category;

    public function setlink(string $link, int $category): Parser
    {
        $this->link = $link;
        $this->category = $category;
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

    /**
     * @return void
     */
    public function saveInNewsTable():void
    {
        $allnews = new News();
        $allnews = $allnews->select('title')->get();

        foreach ($this->array as $item) {
            $news = new News;

            if ($allnews->where('title', $item->title)->first()) {
                continue;
            }
            $news->category_id = $this->category;
            $news->title = $item->title;
            $news->text = $item->description;
            $news->link = $item->link;
            $news->source = 'parser';
            $news->save();


        }
    }

}
