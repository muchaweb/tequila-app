<?php  
class VerifyRegisterController extends \BaseController {

    public function confirmCode($confirmation_code)
    {

        if(!$confirmation_code) {
            throw new InvalidConfirmationCodeException;   
        }

        $user = User::whereConfirmationCode($confirmation_code)->first();

        if(!$user) {
            throw new InvalidConfirmationCodeException;  
        }
        
        $user->confirmed          = 1;
        $user->confirmation_code  = null;

        //-- Email data
        $email    = $user->email;
        $name     = $user->name;
        $lastname = $user->lastname;

        //-- Business data
        $store             = Business::first();
        $business_name     = $store->business;
        $business_phone    = $store->phone;
        $business_email    = $store->email;
        $business_address  = $store->address;

       Mail::send('emails.admin.users.welcome-user', 
            array('name'              =>    $user->name,
                  'lastname'          =>    $user->lastname,
                  'nickname'          =>    $user->nickname,
                  'email'             =>    $user->email,
                  'password'          =>    $user->password,
                  'business'          =>    $business_name,
                  'phone'             =>    $business_phone,
                  'email'             =>    $business_email,
                  'address'           =>    $business_address), function($message) use($email, $name, $lastname) {
            $message->to($email, $name.' '.$lastname)
                    ->subject('Activación completada.');
        });

       $user->save();

       return Redirect::route('login_form');
    }
}
?>