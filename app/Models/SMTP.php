<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use App\Models\Message;
use App\Models\Setting;
use App\Mail\sendEmail;
use Swift_Mailer;
use Swift_SmtpTransport;
use Swift_Message;
use Swift_Attachment;

/**
 * Class SMTP
 * @package App\Models
 * @version March 27, 2020, 12:53 pm UTC
 *
 * @property \App\Models\user user
 * @property integer user_id
 * @property string host_name
 * @property string smtp_username
 * @property string smtp_password
 * @property integer smtp_port
 * @property string encryption_method
 * @property string defaut_from_email
 */
class SMTP extends Model
{
    use SoftDeletes;

    public $table = 's_m_t_p_s';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'host_name',
        'smtp_username',
        'smtp_password',
        'smtp_port',
        'encryption_method',
        'defaut_from_email',
        'message_limit',
        'smtprotation',
        'model_name',
        'sms_hit'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'host_name' => 'string',
        'smtp_username' => 'string',
        'smtp_password' => 'string',
        'smtp_port' => 'integer',
        'encryption_method' => 'string',
        'defaut_from_email' => 'string',
        'model_name' => 'string',
        'message_limit' => 'integer',
        'smtprotation' => 'integer',
        'sms_hit' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\user::class, 'user_id', 'id');
    }

    protected function smtp($customer_id = [], $lead_email = [])
    {
    if(!empty($lead_email)){
        $getMessage = Message::getMessage($customer_id);
        $messageSubject   = $getMessage[0]['messageheader'];
        $messageBody   = $getMessage[0]['messagebody'];

        $setting = Setting::where('for_user_id',$customer_id)->where('value',1)->get();
        //  dd($setting);
        if(!empty($setting)){
            $getSmtp = SMTP::where('user_id', $customer_id)->whereColumn('smtprotation','>','sms_hit')
            ->orderBy('id')->limit(1)->get()->toArray();  
        }else{
            $getSmtp = SMTP::whereColumn('smtprotation','>','sms_hit')
            ->orderBy('id')->limit(1)->get()->toArray();  
        }
        
        if(empty($getSmtp)){
            SMTP::where('user_id', $customer_id)->update(['sms_hit' => 0]);
        }

        if(!empty($getSmtp)){
            //how many hit count in SMTP Database
            $sms_hit = $getSmtp[0]['sms_hit'];
        $hostName = $getSmtp[0]['host_name'];
        $smtpUsername = $getSmtp[0]['smtp_username'];
        // $smtpPassword = $getSmtp[0]['smtp_password'];
        $smtpAppPassword = $getSmtp[0]['smtp_password'];
        $smtpPort = $getSmtp[0]['smtp_port'];
        $encryptionMethod = $getSmtp[0]['encryption_method'];
        $defautFromEmail = $getSmtp[0]['defaut_from_email'];
        $modelName = $getSmtp[0]['model_name'];

            $transport = new Swift_SmtpTransport($hostName , $smtpPort, $encryptionMethod);
        $transport->setUsername($smtpUsername)->setPassword($smtpAppPassword);

        if($transport){
        $mailer = new Swift_Mailer($transport);
        
        $message = new Swift_Message($messageSubject);
        $message
        ->setFrom([$defautFromEmail => $modelName])
        ->setTo($lead_email)
        ->setSubject($messageSubject)
        ->addPart($messageBody, 'text/html');
        $result = $mailer->send($message);
        } 


        Message::where('id', $getMessage[0]['id'])->update(['sms_hit' => $sms_hit + 1]);
        SMTP::where('id', $getSmtp[0]['id'])->update(['sms_hit' => $sms_hit + 1]);
        
        }
        
    }else{
        echo "All Email Send!";
    }

    }
}
