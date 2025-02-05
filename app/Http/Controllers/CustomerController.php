<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Exports\CustomerExport;
use App\Imports\CustomerImport;
use Maatwebsite\Excel\Facades\Excel;

class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::all();
        return view('customer.index',compact('customers'));
    }
    
    public function importExcelData(Request $request){
        $request->validate([
            'import_file' => [
                'required',
                'file'
            ],
        ]);
        // Excel::import(new CustomerImport, 'customers.xlsx');
        Excel::import(new CustomerImport, $request->file('import_file'));

        return redirect()->back()->with('status','Imported successfully');
    }
    public function export() 
    {
        $filename = 'customers.xlsx';
        return Excel::download(new CustomerExport, $filename);
    }
}
