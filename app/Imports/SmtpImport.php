<?php

namespace App\Imports;

use App\Models\SMTP;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SmtpImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SmtpServer2([
            "host_name" => $row["host_name"],
            "smtp_username" => $row["smtp_username"],
            "smtp_password" => $row["smtp_password"],
            "smtp_port" => $row["smtp_port"],
            "encryption_method" => $row["encryption_method"],
            "defaut_from_email" => $row["defaut_from_email"],
            "model_name" => $row["model_name"]
        ]);
    }
}
