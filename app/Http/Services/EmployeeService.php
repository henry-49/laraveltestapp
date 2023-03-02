<?php

namespace App\Http\Services;

use COM;

class EmployeeService {

    public $employeesTypeAData = [];
    public $employeesTypeBData = [];
    public $employeesTypeCData = [];


    /**
     * Get Employee Type A data where the salary less than 60k.
     */
    public  function getEmployeeTypeA($employees) {

        $data = [];


     // get employee where the salary less than 60k.
      foreach ($employees as $employee)
      {
            if((int) $employee->salary < 60000)
            {
                $data['id'] = $employee->id;
                $data['employee_id'] = $employee->employee_id;
                $data['employee_name'] = $employee->employee_name;
                $data['age'] = $employee->age;
                $data['joining_date'] = $employee->joining_date;
                $data['salary'] = $employee->salary;
                $data['bonus'] = $employee->bonus;
                $data['med_claims'] = $employee->med_claims;
                $data['allowences'] = $employee->allowences;
                $data['leave_payments'] = $employee->leave_payments;

                $data['totalExpense'] = $employee->salary +
                                        $employee->bonus +
                                        $employee->employee_medical_claims +
                                        $employee->allowences +
                                        $employee->leave_payments;


                $this->getEmployeeTypeA[] = $data;

            }

      }

      return $this->getEmployeeTypeA;

    }


    /**
     * Get Employee Type B data where the salary less than 60k and less than 100k.
     */
    public function getEmployeeTypeB($employees)
    {

        // get employee where the salary less than 60k and greater than 100.
        foreach ($employees as $employee) {
            if ((int) $employee->salary > 60000  && (int) $employee->salary < 100000)
            {
                $data['id'] = $employee->id;
                $data['employee_id'] = $employee->employee_id;
                $data['employee_name'] = $employee->employee_name;
                $data['age'] = $employee->age;
                $data['joining_date'] = $employee->joining_date;
                $data['salary'] = $employee->salary;
                $data['bonus'] = $employee->bonus;
                $data['med_claims'] = $employee->med_claims;
                $data['allowences'] = $employee->allowences;
                $data['leave_payments'] = $employee->leave_payments;

                $data['totalExpense'] = $employee->salary +
                                        $employee->bonus +
                                        $employee->employee_medical_claims +
                                        $employee->allowences +
                                        $employee->leave_payments;


                $this->getEmployeeTypeB[] = $data;

            }
      }

      return $this->getEmployeeTypeB;
    }


    /**
     * Get Employee Type A data where the salary more than 100k.
     */
    public function getEmployeeTypeC($employees)
    {

         // get employee where the salary more than 100k.
      foreach ($employees as $employee)
      {
            if((int) $employee->salary > 100000)
            {
                $data['id'] = $employee->id;
                $data['employee_id'] = $employee->employee_id;
                $data['employee_name'] = $employee->employee_name;
                $data['age'] = $employee->age;
                $data['joining_date'] = $employee->joining_date;
                $data['salary'] = $employee->salary;
                $data['bonus'] = $employee->bonus;
                $data['med_claims'] = $employee->med_claims;
                $data['allowences'] = $employee->allowences;
                $data['leave_payments'] = $employee->leave_payments;

                $data['totalExpense'] = $employee->salary +
                                        $employee->bonus +
                                        $employee->allowences +
                                        $employee->med_claims +
                                        $employee->leave_payments;


                $this->getEmployeeTypeC[] = $data;

            }
      }

      return $this->getEmployeeTypeC;
    }

}
