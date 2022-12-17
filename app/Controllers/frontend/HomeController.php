<?php
namespace App\Controllers\frontend;
use App\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Respect\Validation\Validator;
use function strlen;

class  HomeController extends Controller
{
    public function getIndex(){
        $this->view('home');
    }
    public function  getRegister(){
        $this->view('register');
    }
    public function  postRegister(){

        $validator = new Validator();
        $errors = [];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $profile_photo = $_FILES['profile_photo'];



        // Validation
        if($validator::alnum()->noWhitespace()->validate($username) === false){
            $errors['username'] = 'Username can only contain alphabets or numeric';
        }

        if(strlen($username) < 6){
            $errors['username'] = 'Username must have at least 6 chars';
        }

        if($validator::email()->validate($email) === false){
            $errors['email'] = 'Email must be a validate email address';
        }

        if(strlen($password) < 6){
            $errors['password'] = 'Password must have at least 6 chars';
        }

        if($validator::image()->validate($profile_photo['name'])){
            $errors['profile_photo'] = 'Profile photo must be an image file';
        }


        if(empty($errors)){

            $file_name = "profile_photo_".time();
            $extension = explode('.', $profile_photo['name']);
            $ext = end($extension);
            move_uploaded_file($profile_photo['tmp_name'], 'media/profile_photo/'.$file_name.'.'.$ext);

            $token = sha1($username.$email.uniqid('llc', true));

            User::create([
                'username' => $username,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_BCRYPT),
                'profile_photo' => $file_name.'.'.$ext,
                'email_verification_token' => $token,
            ]);

            // Send Email
            $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
            try{
                // Server setting
                $mail->SMTPDebug = 2;
                $mail->isSMTP();
                $mail->Host = 'smtp.mailtrap.io';
                $mail->SMTPAuth = true;
                $mail->Username = 'f45e61a95b407b';
                $mail->Password = 'c9b28a09cc37df';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 2525;

                // Recipients
                $mail->setFrom('geniusdevs24@gmail.com', 'System User');
                $mail->addAddress($email, $username);

                // Content
                $mail->isHTML(true);
                $mail->Subject = 'Registration successfully';
                $mail->Body = 'Dear '.$username.', <br/> Please click the following link to activate your account <br/> <a href="http://127.0.0.1:8000/activate/'.$token.'">Click here to Activate</a>';
                $mail->send();


            }catch (Exception $e){
                echo "Message could not be sent. Mailer Error : ".$mail->ErrorInfo;
            }

            $_SESSION['success'] = 'User registration successful';
            header('Location: /login') ;
            exit();
        }

        $_SESSION['errors'] = $errors;
        header('Location: /register') ;
        exit();

      //  die();
    }

    public  function getLogin(){
        $this->view('login');
    }

    public  function getActivate($token = ''){

        $errors = [];

        if(empty($token)){
            $errors[] = 'Token not provided';
            $_SESSION['errors'] = $errors;
            header('Location: /login');
            exit();
        }

        $user = User::where('email_verification_token',$token)->first();

        if($user){
            $user->update([
                'email_verified_at' => Carbon::now(),
                'email_verification_token' => null,
            ]);

            $_SESSION['success'] = 'Account activated. You can login now.';
            header('Location: /login') ;
            exit();
        }

        $errors[] = 'Token not provided';
        $_SESSION['errors'] = $errors;
        header('Location: /login');
        exit();

    }

    public function postLogin(){

        $validator = new Validator();
        $errors = [];

        $email = $_POST['email'];
        $password = $_POST['password'];

        // Validation

        if($validator::email()->validate($email) === false){
            $errors['email'] = 'Email must be a validate email address';
        }

        if(strlen($password) < 6){
            $errors['password'] = 'Password must have at least 6 chars';
        }

        if(empty($errors)){

            $user = User::select(['id', 'password', 'email','username', 'email_verified_at'])->where('email', $email)->first();


            if($user){

                if($user->email_verified_at === null){
                    $errors[] = 'Your account is not verified';
                    $_SESSION['errors'] = $errors;
                    header('Location: /login');
                    exit();
                }
                if(password_verify($password, $user->password) === true){
                    $_SESSION['success'] = 'Logged in.';
                    header('Location: /dashboard') ;
                    exit();
                }
                $errors[] = 'Invalid credentials.';
                $_SESSION['errors'] = $errors;
                header('Location: /login');
                exit();
            }
            $errors[] = 'Invalid User.';
            $_SESSION['errors'] = $errors;
            header('Location: /login');
            exit();
        }



    }

    
}
