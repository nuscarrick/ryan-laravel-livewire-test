<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use App\Services\KanyeService;

class KanyeTest extends TestCase
{
    public function test_data_is_from_kanye_rest_site(): void
    {
        $original_kanye_quotes = Http::get("https://api.kanye.rest/quotes")->json();        
        $kanyeService = new KanyeService();
        $data = $kanyeService->getList();
        foreach($data as $d){
          $this->assertContains($d, $original_kanye_quotes);
        }
    }

    public function test_it_only_fetch_limited_data(): void 
    {
        $kanyeService = new KanyeService();
        $data = $kanyeService->getList();
        $this->assertEquals(count($data), config('kanye.quote_limit'));
    }

    public function test_api_endpoint_return_data_sucessfully(): void 
    {
        $response = $this
            ->withHeaders(['api_token' => config('kanye.api_key')])
            ->getJson('/api/kanye/get_list');

        $response->assertStatus(200);        
    }

    public function test_api_endpoint_return_data_from_kanye_rest_site(): void 
    {
        $original_kanye_quotes = Http::get("https://api.kanye.rest/quotes")->json();            
        $response = $this
            ->withHeaders(['api_token' => config('kanye.api_key')])
            ->getJson('/api/kanye/get_list');

        foreach($response->json() as $d){
            $this->assertContains($d, $original_kanye_quotes);
        }
    }

    public function test_api_endpoint_return_failed_without_api_key(): void 
    {
        $response = $this
            ->getJson('/api/kanye/get_list');    
        $response->assertStatus(401); 
    }


    public function test_api_endpoint_with_limit_parameter(): void 
    {
        $limit = 10;
        $response = $this
            ->withHeaders(['api_token' => config('kanye.api_key')])    
            ->getJson('/api/kanye/get_list?limit='.$limit);    
        $this->assertEquals(count($response->json()), $limit);
    }
}
