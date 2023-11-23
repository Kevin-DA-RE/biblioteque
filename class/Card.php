<?php

class Card {

    private $items;

    public function __construct($items = array())
    {
        $this->items = $items;
    }

    public function getMovie (string $name, string $url)
    {
        $html = "";
        foreach ($this->items as $item){
        $name = $item["nom"];
        $url = $item["url"];
        $html.= <<<HTML
                <div class="col-lg-4">
                    <div class="card" >
                            <h5 class="card-title">$name</h5>
                            <img src="{$url}" class="card-img-top" alt="{$url}"style="width: 18rem;height: 380px">
                            <div class="card-body">                        
                                <a href="{$url}" class="btn btn-primary">View</a>
                            </div>
                    </div>
                </div>
HTML;
        }

        return $html;
        
    }

}