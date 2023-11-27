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
                <div class="col col-lg-4 mb-5 text-center">
                    <div class="card" >
                            <h5 class="card-title">$name</h5>
                            <div class="text-center">
                                <img src="{$url}" class="card-img-top" alt="{$url}"style="width: 18rem;height: 380px">
                            </div>                            
                            <div class="card-body">                        
                                <a href="{$url}" class="btn btn-primary">View</a>
                            </div>
                    </div>
                </div>
HTML;
        }

        return $html;
        
    }

    public function addMovie(array $data){
        
    }


}