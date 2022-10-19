<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportUser implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        
    	$user=User::get();
    	$user_array=[];
    	foreach ($user as $key => $row) {    		
    		$data=array('name'=>$row->name,'email'=>$row->email);            
    		array_push($user_array, $data);
    	}        
    	return (object)collect($user_array);
    }

    public function headings(): array
    {
    	return [
    		'User Name',
    		'User Email'
    	];
    }
}
