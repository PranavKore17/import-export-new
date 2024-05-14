<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

// FromCollection,WithHeadings
class CustomerExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function view(): View
    {
        return view('customer.export', [
            'customers' => Customer::all()
        ]);
    }

    
    // public function collection()
    // {
    //     // return Customer::all();
    //     return Customer::select('name','email','phone')->get();
    // }

    // public function headings(): array
    // {
    //     return [
    //         'Name',
    //         'Email',
    //         'Phone',
    //     ];
    // }
}
