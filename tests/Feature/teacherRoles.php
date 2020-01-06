<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class teacherRoles extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYjY3MzgzMWM1YmZkODk0M2U3MTgxYzE4NzA3MDBiOTY1YmFiMDc4MzRlODk4YzM0MGQzMmFjYzMzNGQ3MGM0OTNjNGM5YTdmY2Q1MmQxNDUiLCJpYXQiOjE1Nzc3MTM3MTYsIm5iZiI6MTU3NzcxMzcxNiwiZXhwIjoxNjA5MzM2MTE2LCJzdWIiOiI0Iiwic2NvcGVzIjpbXX0.KKNLXlTIUNPg2SOtPouUmPMFTQysTD1bNbZSHt0DEKnF--OUs6Y1Vvo0KDtX9wqi7wfpdnG08ob43qHNWI2uovOQ7XzFVEWxz6oUli5rtA46KJxQSkXbShi1HLpXnxV3BxN3H5oQ-7ikyRedhzm1JxXwExrwkzkF1RwQMYbI-JTLG_MDcxRgVzjylR-GKkVtKYMvXbS-3L_yPMF6b-Ft0kC8JHLSojSBDN53t7uiIqYRk7uoC600ItlZ6IzTZDxtangJoaiWk3ow6qrp_NfmHyTvEOjINUWZbFF0TOKZc0UaQtKzra_r76JNUxjNmiXAHVqwk6anoIlBTMmWYxfAMj0x8wUcjpU9FYZdi-JLkYBhGR_bfU5qSMaheBd-sVpHIttxj8QXAGV9QVOFoe1s0cOpeeNC7bJemct_UbiUm4ai-0uLpZ3yzoIyszD1slov7VrggXiFUxdRVIQTs-nn3uwZ05cIhI9cDECkmJTu8_FfZ-vPwI_ghV0m3TqdgihHhue-fVf4RvqPDao6BMhwmjjQcaIdU9V406sI6Q9G1Xv4cophLG4bYVWW73FAeHPNVJx5K5RzdKbAlhsOSfPW1TqixWi0jxaRvpg_Vl_cf8BwXzeDm9rF1389KHSa3VwNNMSNotiWyNH0-wHnHR_6tUUi3hATRxCGpjjb5hmfMjM';
        $this->headers['Accept'] = 'application/json';
        $this->headers['Authorization'] = 'Bearer '.$token;
        $response = $this->get('/show');
        $response->assertStatus(200);


        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Authorization' =>'Bearer '.$token,
        ])->json('POST', '/show', ['name' => 'Sally']);

        $response
            ->assertStatus(201)
            ->assertJson([
                'created' => true,
            ]);
    }
}
