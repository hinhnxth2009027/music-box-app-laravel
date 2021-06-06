<?php
namespace App\Http\Controllers\User;
use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Feedback;
use App\Models\Musics;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function home(Request $request){
        $songs = Musics::all();
        $limit = $request->query('limit') ? $request->query('limit') : 1000;
        $search = $request->query('search');
        $query_builder = Musics::query();
        if ($search && strlen($search)>0){
            $query_builder = $query_builder->where('song_key','like','%'.$search.'%')
                ->orWhere('song_name','like','%'.$search.'%')
                ->orWhere('author','like','%'.$search.'%')
                ->orWhere('public_by','like','%'.$search.'%')
                ->orWhere('like','like','%'.$search.'%')
                ->orWhere('lyrics','like','%'.$search.'%');
            $songs = $query_builder->paginate($limit)->appends(['search' => $search]);
        }else{
            $songs = DB::table('musics')->where('status', '=', Status::ACTIVE)->Paginate($limit);
        }
        return view('user/index',['musics'=>$songs,'keyword'=>$search]);
    }

    public function login(){
        if (Auth::check()){
            return redirect()->route('homePage');
        }else{
            return view('user/login');
        }

    }

    public function checkLogin(Request $request){
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email'=>$email,'password'=>$password])){
            return redirect()->route('homePage')->with('login_success','Logged in successfully');
        }else{
            $message = ' account and/or password. Please check and try again.';
            return back()->with(['login_error'=>$message,'email'=>$email,'password'=>$password]) ;
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function user_profile(){
        $user = User::find(Auth::id());
        return view('user/profile',['user'=>$user]);
    }


    public function update_profile(Request $request,$id){
        $user = User::find($id);
        $data = $request->all();
        if ($data['new_password']!=null){
            $data['password'] = Hash::make($data['new_password']);
        }else{
            unset($data['password']);
        }
        $user->update($data);
        return redirect()->route('user_profile');
    }

    public function contact(){
        return view('user/contact_page');
    }

    public function send_contact(Request $request){
        $contact = new Contact();
        $contact->fill($request->all());
        $contact->save();
        return back()->with('send_contact_success','Your message has been sent successfully admin will reply you soon via email or phone number you provided');
    }
    public function evaluate(){

        $feedback = Feedback::query()->where('status','=',Status::ACTIVE)->with('user')->get();
        $feedback1 = Feedback::all();
        $starw = 0;
        foreach ( $feedback1 as $feedbacks)
        {
            $starw+=$feedbacks->star;
        }
        return view('user/evaluate',['feedbacks'=>$feedback->reverse(),'starw'=>$starw/sizeof($feedback1)]);
    }

    public function evaluate_send(Request $request){
        $feedback = new Feedback();
        $feedback->fill($request->all());
        $feedback->save();
        return back()->with('send_success','Submit review successfully');
    }

    public function about(){
        return view('user/about');
    }


}
