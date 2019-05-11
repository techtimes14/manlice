<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
//require_once(ROOT . DS . 'vendor' . DS ."MailChimp.php");

class EmailComponent extends Component
{

    public static function getAdminEmail(array $fields)
    {
        $AdminsTable = TableRegistry::get('Admin.Admins');
		return $AdminsTable->find('all',['conditions'=>['Admins.type'=>'SA']])->first();
    }
    /**
     * [contactsAdmin function is for sending email to admin when someone submit contact form on the site]
     * @param  [type] $user_data [user submited data]
     * @param  [type] $settings  [website settings]
     * @return [type]            [true or false]
     */
    public function contactsAdmin($user_data, $settings){
        $admin_email = self::getAdminEmail(['mail_email','contact_email']);
		$email = new Email();
        $email->to(array($admin_email->contact_email));
        $email->subject('Manlice Contact');
        $email->from(array($admin_email->mail_email => WEBSITE_NAME));
        $email->emailFormat('html');              
        $email->template('contact_admin',Null);
        $email->viewVars(array('url'=>Router::url("/",true),'settings'=>$settings,'user_data'=>$user_data));
        /*if($email->send()){
            return true;
        }else{
            return false;
        }*/
    }
    
    /**
     * [userRegister function is for sending an verification email after user register]
     * @param  [type] $user_email [user email]
     * @param  [type] $url        [verification url]
     * @param  [type] $user_data  [user data]
     * @param  [type] $settings   [website settings]
     * @return [type]             [description]
     */
    public static function userRegister($user_email, $url, $user_data, $settings){
        $form_email = self::getAdminEmail(['mail_email']);
        $email = new Email();
        $email->to(array($user_email));
        $email->subject('Manlice Account Verification');
        $email->from(array($form_email->mail_email => WEBSITE_NAME));
        $email->emailFormat('html');              
        $email->template('user_verification',NULL);
        $email->viewVars(array('verify_url'=>$url, 'url'=>Router::url("/",true),'user_details' => $user_data,'settings'=>$settings));
        if($email->send()){
            return true;
        }else{
            return false;
        }

    }
    /**
     * [resetPassword sending link to user when password reset]
     * @param  [string] $user_email [user email id]
     * @param  [string] $url        [password reset url]
     * @param  [array] $settings   [website settings]
     * @return [type]             [true or false]
     */
    public static function resetPassword($user_email,$name, $url, $settings){
        $form_email = self::getAdminEmail(['mail_email']);
        $email = new Email();
        $email->to(array($user_email));
        $email->subject('Manlice Password Reset');
        $email->from(array($form_email->mail_email => WEBSITE_NAME));
        $email->emailFormat('html');
        $email->template('reset_password',NULL);
        $email->viewVars(array('reset_url'=>$url, 'url'=>Router::url("/",true),'settings'=>$settings,'name'=>$name));
        if($email->send()){
            return true;
        }else{
            return false;
        }
    }

}
