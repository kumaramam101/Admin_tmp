<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class ToolsModel extends Model
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

    public function getSingleData($tblName, $wherekey, $wherevalue)
    {
        $query = DB::table($tblName)->select('*');
        $query->where($wherekey, $wherevalue);
        $result = $query->get();
        return $result;
    }

    public function updateData($table_name, $data, $where1, $where2)
    {
        $resp = DB::table($table_name)
            ->where($where1, $where2)
            // ->where('id', 1)
            ->update($data);

        return $resp;
    }
}
