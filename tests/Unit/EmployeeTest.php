<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;

use App\Http\Controllers\EmployeesController;
use App\Http\Services\EmployeeService;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_if_user_not_logged_in()
    {
       $returnedValue = (new EmployeesController)->home();
        $this->assertEmpty($returnedValue);
        //$this->assertEquals([], $returnedValue);

    }

    /**
     * Check for type A data is returning from service function.
     */
    public function test_get_employee_type_a_not_empty()
    {
        // cretae new employee with random data
        $employee = Employee::factory(200)->create([
            'joining_date' => now()->toDateString(),
        ]);

        $response = (new EmployeeService)->getEmployeeTypeA($employee);

       // dd($response);

        $this->assertNotEmpty($response);

    }


    /**
     * Check for type B data is returning from service function.
     */
    public function test_get_employee_type_b_not_empty()
    {
        // cretae new employee with random data
        $employee = Employee::factory(200)->create([
            'joining_date' => now()->toDateString(),
        ]);

        $response = (new EmployeeService)->getEmployeeTypeB($employee);

        //dd($response);

        $this->assertNotEmpty($response);
    }

    /**
     * Check for type C data is returning from service function.
     */
    public function test_get_employee_type_c_not_empty()
    {
        // cretae new employee with random data
        $employee = Employee::factory(200)->create([
            'joining_date' => now()->toDateString(),
        ]);

        $response = (new EmployeeService)->getEmployeeTypeC($employee);

        //dd($response);

        $this->assertNotEmpty($response);
    }


    public function test_if_user_logged_in_and_dashboard_gets_employee_data()
    {
        // Create a user
        $user = User::factory()->create([
            'password' => Hash::make('test12345'),
        ]);

        //Login the same user.
        $response = $this->post('login', [
            'email' => $user->email,
            'password' => 'test12345',
        ]);

        // If logged in successfully check
        $response->assertRedirect('/home');


        // cretae new employee with random data
        $employee = Employee::factory(200)->create([
            'joining_date' => now()->toDateString(),
        ]);

        $employeeTypeAData = (new EmployeeService)->getEmployeeTypeA($employee);
        $employeeTypeBData = (new EmployeeService)->getEmployeeTypeB($employee);
        $employeeTypeCData = (new EmployeeService)->getEmployeeTypeC($employee);


        $data = [
            'typeA' => $employeeTypeAData,
            'typeB' => $employeeTypeBData,
            'typeC' => $employeeTypeCData,

        ];

       // dd(array_keys($data));

        // Get data from dashboard
        $response = $this->get(route('home'));
       // dd($response['data']);
        $this->assertEquals(array_keys($data), array_keys($response['data']));
    }


    /**
     * @test
     */
    public function check_if_displayed_correctly_employee_dashboard()
    {
        // Create a user
        $user = User::factory()->create([
            'password' => Hash::make('test12345'),
        ]);

        //Login the same user.
        $response = $this->post('login', [
            'email' => $user->email,
            'password' => 'test12345',
        ]);

        // If logged in successfully check
        $response->assertRedirect('/home');


        // cretae new employee with random data
        $employee = Employee::factory(20)->create([
            'joining_date' => now()->toDateString(),
        ]);

        $employeeTypeAData = (new EmployeeService)->getEmployeeTypeA($employee);
        $employeeTypeBData = (new EmployeeService)->getEmployeeTypeB($employee);
        $employeeTypeCData = (new EmployeeService)->getEmployeeTypeC($employee);


        $data = [
            'typeA' => $employeeTypeAData,
            'typeB' => $employeeTypeBData,
            'typeC' => $employeeTypeCData,

        ];

        $employeeTypeData = [];

        // Get One employee from each type.
        foreach ($employeeTypeAData as $employeeTypeA)
        {

            $employeeTypeData['type_a'] = $employeeTypeA['employee_name'];
        }

        foreach ($employeeTypeBData as $employeeTypeB)
        {

            $employeeTypeData['type_b'] = $employeeTypeB['employee_name'];
        }

        foreach ($employeeTypeCData as $employeeTypeC)
        {
            $employeeTypeData['type_c'] = $employeeTypeC['employee_name'];
        }

        // Get data from dashboard.
        $response = $this->get(route('home'));

        $this->assertTrue(collect($response['data']['typeA'])->contains('employee_name', $employeeTypeData['type_a']));
        $this->assertTrue(collect($response['data']['typeB'])->contains('employee_name', $employeeTypeData['type_b']));
        $this->assertTrue(collect($response['data']['typeC'])->contains('employee_name', $employeeTypeData['type_c']));
    }
}
