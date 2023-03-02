<?php

namespace App\Http\Controllers;

use App\Http\Services\EmployeeService;
use App\Models\Employee;
use Exception;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{

 public function __construct(protected EmployeeService $employeeService)
 {

 }
    // Main page view
    public function index()
    {
      // $employees =  Employee::all();
       return view('index');
    }

    // Dashboard page
    public function home()
    {

        try
        {
            $data = [];

            if(auth()->check())
            {
                $employees = Employee::all();

                if(empty($employees->toArray()))
                {

                    return [];
                }

                // Employyees where salary is less that 60k. Type B
                $employeeTypeA = $this->employeeService->getEmployeeTypeA($employees);
                #$employeeTypeA = (new EmployeeService)->getEmployeeTypeA($employees);


                // Employyees where salary is more than 80k and less than 100k. Type B
                # $employeeTypeB = $this->employeeService->getEmployeeTypeB($employees);
                #$employeeTypeB = (new EmployeeService)->getEmployeeTypeB($employees);
                $employeeTypeB = $this->employeeService->getEmployeeTypeA($employees);

                // Employyees where salary is more than 100k. Type C
                #$employeeTypeC = $this->employeeService->getEmployeeTypeC($employees);
                #$employeeTypeC = (new EmployeeService)->getEmployeeTypeC($employees);
                $employeeTypeC = $this->employeeService->getEmployeeTypeA($employees);

               $data = [
                    'typeA' => $employeeTypeA,
                    'typeB' => $employeeTypeB,
                    'typeC' => $employeeTypeC,

               ];
               return view('home')->with('data', $data);
            }
            return $data;

        }catch(Exception $e)
        {
            echo $e->getMessage();
        }
        return view('home');
    }
}
