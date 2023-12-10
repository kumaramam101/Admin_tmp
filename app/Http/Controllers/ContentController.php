<?php

namespace App\Http\Controllers;
use App\Models\ContentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use DB;
class ContentController extends Controller
{
    public function terms()
    {
        $model = new ContentModel;
        $tblName = "tbl_terms";
        $p['termdata'] = $model->getAlldata($tblName);
        $p['showHeader'] = true;
        $p['showSidebar'] = true;
        $p['showFooter'] = true;
        $p['body'] = 'content.terms';
        return view('layout.index',$p);
    }
    public function addTerms()
    {
        $p['showHeader'] = true;
        $p['showSidebar'] = true;
        $p['showFooter'] = true;
        $p['body'] = 'content.addTerms';
        return view('layout.index',$p);
    }
    public function addSaveTerms(Request $request)
    {
        $model = new ContentModel;
        $tblName = "tbl_terms";
        if(isset($_POST['termName'])){
            $dt['termName'] = $_POST['termName'];
        }
        if(isset($_POST['termAlias'])){
            $dt['termAlias'] = $_POST['termAlias'];
        }
        if(isset($_POST['termStatus'])){
            $dt['status'] = $_POST['termStatus'];
        }
        $dt['createdOn'] = Carbon::now();
        $resp = $model->insertData($tblName, $dt); //print_r($resp); die;
        if($resp !=0){
            $data['status'] = 1;
            $data['type'] = "term";
            $data['massage'] = "Turm added successfully.";
        }else{
            $data['status'] = 0;
            $data['type'] = "term";
            $data['massage'] = "something want wrong !!";
        }
        echo json_encode($data);
    }
}
