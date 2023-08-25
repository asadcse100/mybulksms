<?php

namespace App\Imports;
use Auth;

use App\Models\MessageInfo;
// use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class LeadsImport implements ToCollection
{

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            $user_id = Auth::user()->id;
            MessageInfo::updateOrCreate(
                [
                    'user_id' => $user_id,
                    'email' => $row[0],
                    'status'    => '0'
                ]
            );
        }
    }

}
