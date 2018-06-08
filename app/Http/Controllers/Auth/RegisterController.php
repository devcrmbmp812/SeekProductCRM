<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\User;
use Mail;
use DB;
use App\Mail\VerificationMail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/main';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'surname' => 'required|string|max:255',
            'lasname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'surname' => $data['surname'],
            'lasname' => $data['lasname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register(Request $request){
        $this->validate($request, [
            "surname"      =>  'required|string|max:255',
            "lasname"      =>  'required|string|max:255',
            'email'     =>  'required|string|email|max:255|unique:users',
            'password'  => 'required|string|min:6|confirmed',
        ]);

        if (User::where('email', '=', $request->get('email'))->exists()) {
            return redirect('register')->with('error', 'Email is already existed.');
        }else{
            $i = 0;
            $pin = "";
            while($i < 4){
                $pin .= mt_rand(0, 9);
                $i++;
            }

            User::create([
                'surname' => $request['surname'],
                'lasname' => $request['lasname'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'confirmed' => 0,
                'confirmation_code' => $pin,
            ]);               
             Mail::to($request['email'])->send(new VerificationMail($request['surname'],$pin));

        }
        session(['email' => $request['email']]);
        return redirect()->route('mail_verify_window'); 
    }

    public function mail_verify_window(){
        return view('auth\mail_verify');
    }

    public function mail_verify(Request $request){
        $code = $request->get('code');
        if (User::where('email', '=', session('email'))->exists()) {
            $user = User::where('email', '=', session('email'))->first();
            if($user->confirmation_code == $code){
                return redirect()->route('phone_verify_window'); 
            }else{
                $email = session('email');
                return view('auth\mail_verify', ['email' => $email]);
            }
        }
    }

    public function phone_verify_window(){
        $email = session('email');
        return view('auth\phone_verify');
    }

    public function phone_verify(Request $request){
        $phoneNumber = $request->get('phoneField');
        $prefix = $request->get('prefix');
        $i = 0;
        $pin = "";
        while($i < 4){
            $pin .= mt_rand(0, 9);
            $i++;
        }
        /**for test**/
        $pin="5000";
        if($this->process_send_sms($prefix.$phoneNumber, $pin, "verify")=="OK"){
            session(['phone_code' => $pin]);
            return redirect()->route('phone_verify_confirm_window'); 
        }else{
            return redirect()->route('phone_verify_window'); 
        }
    }

    public function phone_verify_confirm_window(){
        return view('auth\phone_verify_confirm');
    }

    public function phone_verify_confirm(Request $request){
        $phone_code = $request->get('phone_code');
        if($phone_code==session('phone_code')){
            DB::table('users')
            ->where('email', session('email'))
            ->update(['confirmed' => '1']);
            return redirect('main');
        }else{
            return redirect()->route('phone_verify_confirm_window'); 
        }
    }

    private function sendSMS($content) {
        $ch = curl_init('http://api.smsbroadcast.com.au/api-adv.php');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec ($ch);
        curl_close ($ch);
        return $output;    
    }
    
    private function process_send_sms($mobile_phone, $data, $type) {
        $username       = 'zidra';
        $password       = 'creat3';
        $destination    = $mobile_phone; //Multiple numbers can be entered, separated by a comma
        $source         = 'Hoze';
        $ref            = 'hoze';
        
        if($type == 'verify') {
            $text = 'Your Verification Code is: '.$data;
        } else {
            $text = $data;
        }

        $content =  'username='.rawurlencode($username).
                    '&password='.rawurlencode($password).
                    '&to='.rawurlencode($destination).
                    '&from='.rawurlencode($source).
                    '&message='.rawurlencode($text).
                    '&ref='.rawurlencode($ref);
      
        $smsbroadcast_response = $this->sendSMS($content);
        $response_lines = explode("\n", $smsbroadcast_response);
        
         foreach( $response_lines as $data_line){
            $message_data = "";
            $message_data = explode(':',$data_line);
            
            return $message_data[0];

            // if($message_data[0] == "OK"){
            //     echo "The message to ".$message_data[1]." was successful, with reference ".$message_data[2]."\n";
            //     //return "Login code has been sent to your phone";
            // }elseif( $message_data[0] == "BAD" ){
            //     echo "The message to ".$message_data[1]." was NOT successful. Reason: ".$message_data[2]."\n";
            //     //return "Sending login code failed";
            // }elseif( $message_data[0] == "ERROR" ){
            //     echo "There was an error with this request. Reason: ".$message_data[1]."\n";
            //     //return "There was an error with this request";
            // }
        }
    }
}
