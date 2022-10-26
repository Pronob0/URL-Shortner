<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Currency;
use Illuminate\Http\Request;
use Datatables;

class CurrencyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function datatables()
    {
        $datas = Currency::orderBy('id')->get();
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)

         ->addColumn('status', function(Currency $data) {
            $status      = $data->is_default == 1 ? __('Default') : __('Undeafault');
            $status_sign = $data->is_default == 1 ? 'success'   : 'danger';

            return '<div class="btn-group mb-1">
            <button type="button" class="btn btn-'.$status_sign.' btn-sm btn-rounded " >
              '.$status .'
            </button>
          </div>';

        })


                            ->addColumn('action', function(Currency $data) {

                                $delete = $data->is_default == 1 ? '':'<a href="javascript:;" data-href="' . route('admin.currency.delete',$data->id) . '" data-toggle="modal" data-target="#deleteModal" class="dropdown-item">'.__("Delete").'</a>';
                                $default = $data->is_default == 1 ? '<a href="javascript:;" class="dropdown-item"> '.__("Default").'</a>' : '<a class="status dropdown-item" href="javascript:;" data-href="' . route('admin.currency.status',['id1'=>$data->id,'id2'=>1]) . '">'.__('Set Default').'</a>';

                                return '<div class="btn-group mb-1">
                              <button type="button" class="btn btn-primary btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                '.'Actions' .'
                              </button>
                              <div class="dropdown-menu" x-placement="bottom-start">
                                <a href="' . route('admin.currency.edit',$data->id) . '"  class="dropdown-item">'.__("Edit").'</a>'.$delete.$default.'

                              </div>
                            </div>';
                            })
                            ->rawColumns(['action','status'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }
    public function index()
    {
        return view('admin.currency.index');
    }
    public function create()
    {
        return view('admin.currency.create');
    }
    public function store(Request $request)
    {

        //--- Logic Section
        $data = new Currency();
        $input = $request->all();
        $isExist = Currency::where('is_default',1)->exists();
        if(!$isExist){
            $input['is_default'] = 1;
        }
        $data->fill($input)->save();
        //--- Logic Section Ends

        //--- Redirect Section
        $msg = __('New Data Added Successfully.').' '.'<a href="'.route('admin.currency.index').'"> '.__('View Lists.').'</a>';
        return response()->json($msg);
        //--- Redirect Section Ends
    }
    public function edit($id)
    {
        $data = Currency::findOrFail($id);
        return view('admin.currency.edit',compact('data'));
    }

 public function update(Request $request, $id)
    {
        //--- Logic Section
        $data = Currency::findOrFail($id);
        $input = $request->all();
        $data->update($input);
        //--- Logic Section Ends

        //--- Redirect Section
        $msg = __('Data Updated Successfully.').' '.'<a href="'.route('admin.currency.index').'"> '.__('View Lists.').'</a>';
        return response()->json($msg);
        //--- Redirect Section Ends
    }
    public function status($id1,$id2)
        {
            $data = Currency::findOrFail($id1);
            $data->is_default = $id2;
            $data->update();
            $data = Currency::where('id','!=',$id1)->update(['is_default' => 0]);

            //--- Redirect Section
            $msg = __('Data Updated Successfully.');
            return response()->json($msg);
                //--- Redirect Section Ends
        }
        public function destroy($id)
        {
            if($id == 1)
            {
            return __("You cant't remove the main currency.");
            }
            $data = Currency::findOrFail($id);
            if($data->is_default == 1) {
            Currency::where('id','=',1)->update(['is_default' => 1]);
            }
            $data->delete();
            //--- Redirect Section
            $msg = __('Data Deleted Successfully.');
            return response()->json($msg);
            //--- Redirect Section Ends
        }


}
