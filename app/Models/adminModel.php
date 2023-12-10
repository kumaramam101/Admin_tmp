<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class adminModel extends Model
{
    use HasFactory;

    public function checkUser($tblName, $userData)
    {   //print_r($userData);die;
        $query = DB::table($tblName)->select('*');
        $query->where('email', $userData);
        $result = $query->get();
        return $result;
    }
    public function insertUser($tblName, $userData)
    {
        $resp = DB::table($tblName)->insert($userData);
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
}
