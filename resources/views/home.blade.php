@extends('layouts.app')

@section('content')
<div class="container">
{{-- Type A --}}
    <div class="card m-3">
        <div class="card-header">{{ __('Type A Employee Records (Earnings less than 60k)') }}</div>

    <div class="card-body">
        @if(isset($data['typeA']))
         <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Employee Id</th>
                    <th>Age</th>
                    <th>Salary</th>
                    <th>Bonus</th>
                    <th>Med Benefits</th>
                    <th>Allowences</th>
                    <th>Leave Expense</th>
                    <th>Total</th>
                    <th>Joined Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['typeA'] as $typeA)
                <tr>
                    <td>{{ $typeA['employee_name']}}</td>
                    <td>{{ $typeA['employee_id']}}</td>
                    <td>{{ $typeA['age']}}</td>
                    <td>{{ $typeA['salary']}}</td>
                    <td>{{ $typeA['bonus']}}</td>
                    <td>{{ $typeA['med_claims']}}</td>
                    <td>{{ $typeA['allowences']}}</td>
                    <td>{{ $typeA['leave_payments']}}</td>
                    <td>{{ $typeA['totalExpense']}}</td>
                    <td>{{ $typeA['joining_date']}}</td>
                </tr>
                @endforeach


            </tbody>
            <tfoot>

            </tfoot>
         </table>
         @endif
     </div>
    </div>

        {{-- Type B --}}
    <div class="card m-3">
      <div class="card-header mt-5">{{ __('Type B Employee Records (Earnings more than 60k less than 100k)') }}</div>

    <div class="card-body">
        @if(isset($data['typeB']))
         <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Employee Id</th>
                    <th>Age</th>
                    <th>Salary</th>
                    <th>Bonus</th>
                    <th>Med Benefits</th>
                    <th>Allowences</th>
                    <th>Leave Expense</th>
                    <th>Total</th>
                    <th>Joined Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['typeB'] as $typeB)
                <tr>
                    <td>{{ $typeB['employee_name']}}</td>
                    <td>{{ $typeB['employee_id']}}</td>
                    <td>{{ $typeB['age']}}</td>
                    <td>{{ $typeB['salary']}}</td>
                    <td>{{ $typeB['bonus']}}</td>
                    <td>{{ $typeB['med_claims']}}</td>
                    <td>{{ $typeB['allowences']}}</td>
                    <td>{{ $typeB['leave_payments']}}</td>
                    <td>{{ $typeB['totalExpense']}}</td>
                    <td>{{ $typeB['joining_date']}}</td>
                </tr>
                @endforeach


            </tbody>
            <tfoot>

            </tfoot>
         </table>
         @endif
     </div>
    </div>


       {{-- Type C --}}
    <div class="card m-3">
      <div class="card-header mt-5">{{ __('Type C Employee Records (Earnings more than 60k less than 100k)') }}</div>

    <div class="card-body">
        @if(isset($data['typeC']))
         <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Employee Id</th>
                    <th>Age</th>
                    <th>Salary</th>
                    <th>Bonus</th>
                    <th>Med Benefits</th>
                    <th>Allowences</th>
                    <th>Leave Expense</th>
                    <th>Total</th>
                    <th>Joined Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['typeC'] as $typeC)
                <tr>
                    <td>{{ $typeC['employee_name']}}</td>
                    <td>{{ $typeC['employee_id']}}</td>
                    <td>{{ $typeC['age']}}</td>
                    <td>{{ $typeC['salary']}}</td>
                    <td>{{ $typeC['bonus']}}</td>
                    <td>{{ $typeC['med_claims']}}</td>
                    <td>{{ $typeC['allowences']}}</td>
                    <td>{{ $typeC['leave_payments']}}</td>
                    <td>{{ $typeC['totalExpense']}}</td>
                    <td>{{ $typeC['joining_date']}}</td>
                </tr>
                @endforeach


            </tbody>
            <tfoot>

            </tfoot>
         </table>
         @endif
     </div>


    </div>
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
        $('.table').DataTable({
            'iDisplayLength' : 5,
            "lengthMenu" : [ [5,10, 25, 50 -1], [5, 10, 25, 50, "All"] ]
        });
    });
    </script>
@endsection
