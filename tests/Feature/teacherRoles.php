<?php

namespace Tests\Feature;

use App\Http\Middleware\userRoleMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\ClientRepository;
use Laravel\Passport\Passport;
use Symfony\Component\Process\Process;
use Tests\TestCase;
use App\User;


class teacherRoles extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */


    protected function acting_as($role_type){
        if($role_type =='teacher')
        {
            $id = 2;
            $user = factory(User::class)->make(['id' => $id, 'role_type' => $role_type]);
            //dd($user);
        }
        else{
            $user = factory(User::class)->make(['role_type' => $role_type]);
        }
        Passport::actingAs($user);

    }


    public function addSchool_as_admin()
    {
        $this->acting_as('admin');
        $data = [
            'name' => 'school 1',
        ];
        $request = $this->post('/api/addSchool' , $data);
        //dd($request);
        $this->assertEquals($request->getStatusCode(), 200);

    }

    public function addClass_as_admin()
    {
        $this->acting_as('admin');
        $data = [
            'name' => 'unit test class',
            'school_id' => 1,
            'teacher_id' => 2,
        ];
        $request = $this->post('/api/addClass' , $data);
        //dd($request);
        $this->assertEquals($request->getStatusCode(), 200);

    }
    public function Register_teacher()
    {

        $data = factory(User::class)->make(['role_type' => 'parent']);;;

        $data =[
            'name' => $data->name,
            'email' => $data->email,
            'password' => '123456',
            'c_password' => '123456',
            'role_type' => $data->role_type,
            ];
        //dd($data);

        $request = $this->call('post','/api/register' , $data);
        //dd($request);
        $this->assertEquals($request->getStatusCode(), 200);

    }


    /** @test */
    public function test_run()
    {
//        $process = new Process(['php', 'artisan', 'migrate']);
  //      $process->run();
//
        //$process = new Process(['php', 'artisan', 'passport:install']);
      //  $process->run();

        $this->Register_teacher();
        $this->addSchool_as_admin();
        $this->addClass_as_admin();

    }

}
/*
 *
 *




    public function showClasses_as_teacher()
    {
        parent::setUp();
        $this->acting_as('teacher');
        //$request = Request::create('/api/showClasses', 'GET');

        $request = $this->get('/api/showClasses');
        //dd($request);

        $this->assertEquals($request->getStatusCode(), 200);
    }
 */
