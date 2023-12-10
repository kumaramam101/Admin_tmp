<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class ContentModel extends Model
{
    use HasFactory;

    public function insertData($tblName, $data)
    {
        $resp = DB::table($tblName)->insert($data);
        return $resp;
    }
    public function getAlldata($tblName)
    {
        $query = DB::table($tblName)->select('*');
        $result = $query->get();
        return $result;
    }
}
