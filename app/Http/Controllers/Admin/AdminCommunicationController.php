<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Feedback;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AdminCommunicationController extends Controller
{










    public function feedback_list(Request $request){

        $limit = $request->query('limit') ? $request->query('limit') : 10;
        $star = $request->query('star')!="" ? $request->query('star') : "" ;
        $status = $request->query('status')!="" ? $request->query('status') : "" ;
        $query_builder = Feedback::query();


        if ($star != ""){
            $query_builder = $query_builder->where('star',$star);
        }
        if ($status != ""){
            $query_builder = $query_builder->where('status',$status);
        }
        $feedbacks = $query_builder->paginate($limit)->appends(['star'=>$star,'status'=>$status]);
        return view('admin/feedback_list',['feedbacks'=>$feedbacks,'star'=>$star,'status'=>$status]);
    }












    public function feedback_deactive($id){
        $feedbacks = Feedback::find($id);
        $feedbacks->status = Status::DEACTIVE;
        $feedbacks->save();
        return redirect()->route('feedback_list');
    }
    public function feedback_active($id){
        $feedbacks = Feedback::find($id);
        $feedbacks->status = Status::ACTIVE;
        $feedbacks->save();
        return redirect()->route('feedback_list');
    }

    public function contact_list(Request $request){
        $contact = Contact::all();
        $limit = $request->query('limit') ? $request->query('limit') : 10;
        $search = $request->query('search');
        $query_builder = Contact::query();
        if ($search && strlen($search)>0){
            $query_builder = $query_builder->where('email','like','%'.$search.'%')
                ->orWhere('phone','like','%'.$search.'%')
                ->orWhere('message','like','%'.$search.'%');
            $contact = $query_builder->paginate($limit)->appends(['search' => $search]);
        }else{
            $contact = Contact::paginate($limit);
        }
        return view('admin/contact_list',['contact'=>$contact]);
    }
    public function delete_contact($id){
        $contact = Contact::find($id);
        $contact->delete();
        return redirect()->route('contact_list');
    }





}
