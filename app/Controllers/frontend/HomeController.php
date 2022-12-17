<?php
namespace App\Controllers\frontend;
use App\Controllers\Controller;
use App\Models\User;
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

        if($validator::image()->validate($profile_photo['name']) === false){
            $errors['profile_photo'] = 'Profile photo must be an image file';
        }


        if(empty($errors)){

            $file_name = "profile_photo_".time();
            $extension = explode('.', $profile_photo['name']);
            $ext = end($extension);
            move_uploaded_file($profile_photo['tmp_name'], 'media/profile_photo'.$file_name.'.'.$ext);

            User::create([
                'username' => $username,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_BCRYPT),
                'profile_photo' => $file_name.'.'.$ext,
            ]);

            $_SESSION['success'] = 'User registration successful';
            header('location:/login') ;
        }

        $_SESSION['errors'] = $errors;
        header('location:/register') ;

      //  die();
    }

    public  function getLogin(){
        $this->view('login');
    }
}
