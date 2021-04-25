<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    public $table = 'hotels';
    public $fillable = [
            'name',
            'image',
            'description',
            'location',
            'seo_image',
            'merchant_id',
            'meta_title',
            'meta_description',
            'meta_keyword',
            'star',
            'rules_checkin',
            'rules_checkout',
            'rules_description',
            'min_price',
            'avg_rate',
            'active',
            'slug',
            'hotelId','productId', 'currency', 'inclusions',
        ];

        public function get($path){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_URL, $this->base_url . $path);
            curl_setopt($ch, CURLOPT_USERPWD, $this->account . ":" . $this->password);

            $response = curl_exec($ch);

            curl_close($ch);
            return json_decode($response);

        }

        public function post($path, $data)
        {
            $ch = curl_init();
            $headers = array(
                "Content-Type: application/json"
            );
            curl_setopt($ch, CURLOPT_URL, $path);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            $response     = curl_exec ($ch);
            curl_close($ch);
            return json_decode($response);
        }

        public function amenities()
        {
            return $this->belongsToMany(Amenities::class);
        }

        public function countByHotelId($hotelId){
            return $this->where('hotelId',$hotelId)->count();
        }



}
