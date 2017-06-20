<?php
/**
 * Created by PhpStorm.
 * User: 小奔
 * Date: 2017-06-20
 * Time: 21:49
 */

namespace App\Markdown;


class Markdown
{
    protected $parser;

    public function __construct(Parser $parser)
    {
        $this->parser = $parser;
    }

    public function changeToHtml($text){
        $html = $this->parser->makeHtml($text);
        return $html;
    }
}