<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\adminModel;
use App\Models\ToolsModel;
use Illuminate\Support\Str;
use Carbon\Carbon;
class ToolsController extends Controller
{
    public function Tools()
    {
        $model = new ToolsModel;
        $tblName = "tools";
        $p['toolsdata'] = $model->getAlldata($tblName);
        $p['showHeader'] = true;
        $p['showSidebar'] = true;
        $p['showFooter'] = true;
        $p['body'] = 'Tools.toollist';
        return view('layout.index',$p);
    }
    public function addTool()
    {
        $p['showHeader'] = true;
        $p['showSidebar'] = true;
        $p['showFooter'] = true;
        $p['body'] = 'Tools.addTool';
        return view('layout.index',$p);
    }
    public function addSaveTools(Request $request)
    {   //print_r($_POST);die;
        $model = new ToolsModel;
        $tblName = "tools";
        if(isset($_POST["toolTitle"])){
            $dt["toolTitle"] = $_POST["toolTitle"];
        }
        if(isset($_POST["toolAlias"])){
            $dt["toolAlias"] = $_POST["toolAlias"];
        }
        if(isset($_POST["toolHeading"])){
            $dt["toolHeading"] = $_POST["toolHeading"];
        }
        if(isset($_POST["toolSynopsis"])){
            $dt["toolSynopsis"] = $_POST["toolSynopsis"];
        }
        if(isset($_POST["tool_html"])){
            $dt["tool_HTML"] = $_POST["tool_html"];
        }
        if(isset($_POST["tool_css"])){
            $dt["tool_CSS_cdn"] = $_POST["tool_css"];
        }
        if(isset($_POST["tool_js"])){
            $dt["tool_JS_cdn"] = $_POST["tool_js"];
        }
        if(isset($_POST["tool_status"])){
            $dt["toolStatus"] = $_POST["tool_status"];
            if($_POST["tool_status"] == 1){
                $dt['publishedOn'] = Carbon::now()->timestamp;
            }
        }
        if($_POST["hidden_id"] > 0){
            // $user = new adminModel;
            // $tblName = "tbl_user";
            // $wherekey = "tbl_user.email";
            // $wherevalue = Session::get('email');
            // $userdata = $user->getSingleData($tblName, $wherekey, $wherevalue); //print_r($userdata);die;
            // $name = $userdata[0]->first_name; //print_r($name);die;
            // if(isset($userdata)){
            //     $dt["updatedBy"] = $name;
            // }
            if(isset($_POST["new_status"])){
                $dt["toolStatus"] = $_POST["new_status"];
                $dt['publishedOn'] = Carbon::now()->timestamp;
            }
            $dt['updatedOn'] = Carbon::now()->timestamp;

            $where1 =  'tools.uniqueId';
            $where2 =  $_POST['hidden_id'];
            $Resp = $model->updateData($tblName, $dt, $where1, $where2);
            if($Resp !=0 ){
                $data['status'] = 1;
                $data['massage'] = "Tool Updated successfully.";
            }else{
                $data['status'] = 0;
                $data['massage'] = "something want wrong !!";
            }
        }else{
            $publisher = Session::get('email');
            if(isset($publisher)){
                $dt["publishedBy"] = $publisher;
            }
            $dt['createdOn'] = Carbon::now()->timestamp;
            $resp = $model->insertData($tblName, $dt); //print_r($resp); die;
            if($resp !=0){
                $data['status'] = 1;
                $data['massage'] = "Tool added successfully.";
            }else{
                $data['status'] = 0;
                $data['massage'] = "something want wrong !!";
            }
        }
        echo json_encode($data);
    }
    public function editTool($id)
    {
        $id1 = $id; //print_r($id1);die;
        $p = [];
        $decryptedId = Crypt::decryptString($id);
        $p['id'] = $decryptedId;
        $model = new ToolsModel;
        $tblName = "tools";
        $wherekey = "tools.uniqueId";
        $wherevalue = $decryptedId;
        $getTool = $model->getSingleData($tblName, $wherekey, $wherevalue); //print_r($getTool);die;
        if (count($getTool) != 0) {
            $p['toolData'] = $getTool[0];
        }
        $p['showHeader'] = true;
        $p['showSidebar'] = true;
        $p['showFooter'] = true;
        $p['body'] = 'Tools.addTool';
        return view('layout.index',$p);
    }
}
