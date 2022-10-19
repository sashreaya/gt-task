<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User as UserModel;
use App\Models\Roles as RolesModel;
use Config;
use Auth;
use App\Models\ThemeInfo as ThemeInfoModel;
use App\Models\ThemeImages as ThemeImagesModel;
use DataTables;
use App\Exports\ExportUser;
use Excel;

class UserController extends Controller
{	

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->ThemeImagesModel = new ThemeImagesModel();
        $this->ThemeInfoModel = new ThemeInfoModel();
        $this->UserModel = new UserModel();
        $this->RolesModel = new RolesModel();
    }
	
	public function index(Request $request)
    {
    	if ($request->ajax()) 
        {
            $data = $this->UserModel->orderBy('id','desc');
            return DataTables::of($data)->make(true);
        }
        $data = [];    
        return view('admin.index',$data);
    }
	
    public function show(Request $request)
    {
    	if ($request->ajax()) 
        {
            $data = $this->ThemeInfoModel->where('user_id',$request->id)->with('themeImage')->orderBy('id','desc');
            return DataTables::of($data)->make(true);
	    }
	     $data = [];    
        return view('admin.index',$data);
    }  

    public function exportUser(Request $request)
    {
       return Excel::download(new ExportUser, 'user.xlsx');
    }
}
