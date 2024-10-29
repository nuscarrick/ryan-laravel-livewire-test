<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class KanyeService 
{
    private $baseURL="https://api.kanye.rest/text"; 
    
    private function fetch()
    {        
        $response = Http::get($this->baseURL);
        return $response->body();
    }

    public function getList($limit=5){
        $data = [];
        foreach(range(1,$limit) as $index) {
            $data[] = $this->fetch();                
        }
        return $data;      
    }


}
