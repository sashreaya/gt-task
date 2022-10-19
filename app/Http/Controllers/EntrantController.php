<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ThemeInfo as ThemeInfoModel;
use App\Models\ThemeImages as ThemeImagesModel;
use Validator;
use Auth;
use DataTables;
class EntrantController extends Controller
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
    }


    public function index(Request $request)
    {
        if ($request->ajax()) 
        {
            $data = $this->ThemeInfoModel->where('user_id',$request->id)->orderBy('id','desc');
            return DataTables::of($data)
                            ->addIndexColumn()
                            ->addColumn('image', function ($row) {
                                if(!empty($row->themeImage))
                                {
                                    return '<div class=""><span><img src="'.url('storage/app/public/'.$row->themeImage->image).'" width="30px"></span></div>';
                                }else{
                                    return '<div>--</div>';
                                }
                            })
                             ->addColumn('action', function ($row) {
                                $btn = '<div></div>';                               
                                $btn .= '<span><div class=""><a href="'.url('dashboard/edit/'.$row->id).'" class="btn btn-dim  btn-outline-success" ><em class="fas fa-eye"></em></a>&nbsp;&nbsp;<a href="'.url('dashboard/delete/'.$row->id).'" class="btn btn-dim  btn-outline-success" ><em class="fas fa-trash"></em></a></div></span>';

                                return $btn;                               
                              
                            })
                            ->rawColumns(['action','image'])
                            ->make(true);
        }
         $data = [];    
        return view('dashboard.index',$data);
    }

    public function store(Request $request)
    {

    	$validator = Validator::make($request->all(), [
                                                'theme' => 'required',
                                                'description' => 'required'
                                            ]);

        if ($validator->fails()) {
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        }   
        /* Create DATa */
        $theme = $request->input('theme');
        $description = $request->input('description');

      

        $entrat_info = $this->ThemeInfoModel->create(['theme'       => $theme,
                                                        'user_id'     => Auth::user()->id,
                                                        'description' => $description
                                                    ]);
        if($entrat_info)
        {
        	 /** Upload image */

             $photo = "";
       		$images = $request->file('image');

        	foreach($images as $image) {
           
           		$name = str_replace(' ', '-', $image->getClientOriginalName());           
	            $image->move(storage_path('app/public/shots'),$name);
	            $photo = 'shots/'.$name;

                $this->ThemeImagesModel->insert([
                    'image' => $photo,
                    'user_id' => Auth::user()->id,
                    'theme_info_id' => $entrat_info->id,
                ]);		          
            }
            $notification = array(
                'message' => 'Form submited successfully',
                'alert-type' => 'success',
            );
            return redirect('home')->with($notification);
        }
        $notification = array(
                'message' => 'Error, while adding info',
                'alert-type' => 'error',
            );
        return redirect('home')->with($notification);
    }


    public function edit(Request $request)
    {
        $data['theme'] = $this->ThemeInfoModel->where('id',$request->id)->with('themeImage')->first(); 
        return view('dashboard.edit',$data);       
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
                                                'theme' => 'required',
                                                'description' => 'required'
                                            ]);

        if ($validator->fails()) {
           return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        }   
        /* Create DATa */
        $theme = $request->input('theme');
        $description = $request->input('description');

      

        $entrat_info = $this->ThemeInfoModel->where('id',$request->id)->update(['theme'       => $theme,
                                                        'description' => $description
                                                    ]);
        if($entrat_info)
        {
             /** Upload image */

             $photo = "";
            $images = $request->file('image');
            $image_arr = $this->ThemeImagesModel->where('theme_info_id',$request->id)->where('user_id',Auth::user()->id)->get();
            foreach ($image_arr as $key => $value) {
                $this->ThemeImagesModel->where('id',$value->id)->delete();
            }
            foreach($images as $image) {
           
                $name = str_replace(' ', '-', $image->getClientOriginalName());           
                $image->move(storage_path('app/public/shots'),$name);
                $photo = 'shots/'.$name;

                $this->ThemeImagesModel->insert([
                    'image' => $photo,
                    'user_id' => Auth::user()->id,
                    'theme_info_id' => $request->id,
                ]);               
            }
             $notification = array(
                        'message' => 'Form submited successfully',
                        'alert-type' => 'success',
                    );
            return redirect('home')->with($notification);
        }
        
        return redirect('home')->with('error','Error, while adding info');
    }

     public function destroy($id)
    {
        $response = $this->ThemeInfoModel->where('id',$id)->delete();
          $image_arr = $this->ThemeImagesModel->where('theme_info_id',$id)->where('user_id',Auth::user()->id)->get();
            foreach ($image_arr as $key => $value) {
                unlink($value);
                $this->ThemeImagesModel->where('id',$value->id)->delete();
            }
        if($response)
        {
           return redirect()->back()->with('success','Theme deleted successfully');
        }
    }
}
