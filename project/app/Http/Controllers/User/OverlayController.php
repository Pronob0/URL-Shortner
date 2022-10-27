<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Overlay;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OverlayController extends Controller
{
    public function index()
    {
        $overlay = \App\Models\Overlay::all();
        $user = auth()->user();
        return view('user.overlay.index', compact('user','overlay'));
    }

    public function create()
    {
        $user = auth()->user();
        return view('user.overlay.create', compact('user'));
    }

    public function overlay_create($slug){
        $user = auth()->user();
        return view('user.overlay.form', compact('user', 'slug'));
    }

    public function contact_store( Request $request)
    {
        $user = auth()->user();

        $rules =
        [
            'name' => 'required',
            'email' => 'required|email',
            'subject'=>'required',
            'label'=>'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
          }

          $contact = new Overlay();
          $contact->user_id = $user->id;
          $contact->name = $request->name;
          $contact->type= 'contact';
          $json= array('email' => $request->email, 'subject' => $request->subject, 'label' => $request->label); 
          $contact->data = json_encode($json);
          $contact->save();
          $msg = __('Successfully Added New Overlay');
          return response()->json($msg);

    }

    public function contact_edit($id){
        $user = auth()->user();
        $contact = Overlay::find($id);
        $data= json_decode($contact->data);
        return view('user.overlay.contact_edit', compact('user', 'contact', 'data'));
    }

    public function contact_update(Request $request, $id){
        $user = auth()->user();

        $rules =
        [
            'name' => 'required',
            'email' => 'required|email',
            'subject'=>'required',
            'label'=>'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
          }

          $contact = Overlay::find($id);
          $contact->user_id = $user->id;
          $contact->name = $request->name;
          $contact->type= 'contact';
          $json= array('email' => $request->email, 'subject' => $request->subject, 'label' => $request->label); 
          $contact->data = json_encode($json);
          $contact->save();
          $msg = __('Successfully Updated Overlay');
          return response()->json($msg);
    }

    public function contact_delete($id){
        $user = auth()->user();
        $contact = Overlay::find($id);
        $contact->delete();
        Toastr::success('Data Deleted Successfully','Success');
        return redirect()->back();
    }

    public function poll_store( Request $request)
    {
        $user = auth()->user();

        $rules =
        [
            'name' => 'required',
            'question'=>'required',
            'option'=>'required',
            'option.*'=>'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
          }
          $poll = new Overlay();
          $poll->user_id = $user->id;
          $poll->name = $request->name;
          $poll->type= 'poll';
          $json= array('question' => $request->question, 'options' => $request->option); 
          $poll->data = json_encode($json);
          $poll->save();
          $msg = __('Successfully Added New Overlay');
          return response()->json($msg);

    }

   

    



}
