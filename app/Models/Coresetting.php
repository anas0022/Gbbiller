<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coresetting extends Model
{
    use HasFactory;

    protected $table = 'site_config';

    protected $fillable = [
        'site_title', 'version', 'site_description', 'siteurl', 'whatsapp_no', 'address', 
        'meta_keyword', 'meta_details', 'min_logo', 'fav_icon', 'logo', 'web_logo', 
        'googlemap_API', 'smtp_host', 'smtp_port', 'smtp_username', 'smtp_password', 
        'sendgrid_API', 'if_msg91', 'msg91_apikey', 'if_textlocal', 'textlocal_apikey', 
        'if_greensms', 'app_logo', 'greensms_apikey', 'sms_senderid', 'sms_dltid', 
        'cod_status', 'bank_transfer_status', 'razorpay_status', 'razo_key_id', 'sms_msg', 
        'razo_key_secret', 'if_googlemap', 'site_email', 'ccavenue_status', 
        'ccavenue_testmode', 'ccavenue_merchant_id', 'ccavenue_access_code', 
        'ccavenue_working_key', 'if_fixeddelivery', 'delivery_charge', 'if_handlingcharge', 
        'handling_charge', 'if_firebase', 'firebase_API', 'firebase_config', 
        'if_onesignal', 'onesignal_id', 'onesignal_key','slno'
    ];

    
    public static function updateOrCreateSettings(array $data)
    {
       
        $settings = self::first();

        if ($settings) {
            $settings->update($data); 
        } else {
            $settings = self::create($data); 
        }

        return $settings;
    }
}
