<?php

namespace App\Http\Controllers;

use App\Amenities;
use App\Facilities;
use Illuminate\Http\Request;
use App\Hotel;
use App\Roon;
use Illuminate\Support\Str;

class HotelController extends Controller
{
    public function test(){
       

        $data = [
            "user_id" => 'Ojimah_testAPI',
            "user_password" => 'OjimahTest@2021',
            "access" => 'Test',
            "ip_address" => '27.72.60.28',
            "checkin" => '2021-04-30',
            "checkout" => '2021-05-01',
            "city_name" => 'Bangalore',
            "country_name" => 'India',
            'maxResult'=> 20,
            "occupancy" => [
                [
                    'room_no' => 0,
                    'adult' => 1,
                    'child' => 0,
                    'child_age' =>[
                        0
                    ]
                ]
                    ],
            "requiredCurrency" => "INR"
            
        ];
        $api = new Hotel();
        $dt = (array) $api->post('https://travelnext.works/api/hotel_trawexv6/hotel_search', $data);
        $sessionId = ((array)$dt['status'])['sessionId'];
       
        foreach ($dt['itineraries'] as $itemHotel) {
            $result = json_encode($itemHotel) ;
            $itemHotel = (array) $itemHotel;
            $path = 'sessionId=' . $sessionId;
            $path .=  '&hotelId=' .$itemHotel['hotelId'];
            $path .=  '&productId=' .$itemHotel['productId'];
            $path .=  '&tokenId=' .$itemHotel['tokenId'];
            $data = (array)$api->get('https://travelnext.works/api/hotel_trawexv6/hotelDetails?' . $path);
           
            if($api->countByHotelId($itemHotel['hotelId']) == 0){
                $amenity = new Amenities();
                
                $hotel =  Hotel::updateOrCreate([
                'merchant_id' => 2,
                'name' =>  $data['name'],
                'slug' => Str::slug($data['name']),
                'location' => $data['address'] . ',' . $data['city'] . ',' .$data['country'] ,
                'image' => $itemHotel['thumbNailUrl'],
                'star' => (integer)$data['hotelRating'],
                'description' => ((array)$data['description'])['content'],
                'avg_rate' => $itemHotel['total'],
                'min_price' => $itemHotel['total'],
                'active' => 1,
                'hotelId'=> $itemHotel['hotelId'],
                'productId' => $itemHotel['productId'],
                'inclusions' => $result
                ]);
                $ids = [] ;

                foreach ($data['facilities'] as $value) {
                    $amenityItem = $amenity->getItemByName($value);
                    if( count($amenityItem)){
                        $ids[] = $amenityItem[0]->id;
                    }else{
                        $item =  Amenities::create([
                            'name' => $value,
                            'type' => 1,
                        ]);
                        $ids[] = $item->id;
                    }
                 }

                 $hotel->amenities()->attach($ids);
                 $dataRoom =[
                    'sessionId' =>  $sessionId,
                    'productId' => $itemHotel['productId'],
                    'tokenId' =>  $itemHotel['tokenId'],
                    'hotelId' =>  $itemHotel['hotelId']
                ];

                $rooms = (array)$api->post('https://travelnext.works/api/hotel_trawexv6/get_room_rates', $dataRoom);
                $dtRooms = (array)$rooms['roomRates'];
                
                foreach ( $dtRooms['perBookingRates'] as $itemRoom ){
                    $itemRoom = (array) $itemRoom;
                    $imgRoom = '';
                    foreach ($itemRoom['roomImages'] as $value) {
                        $imgRoom .= $value  . ',';
                    }
                    $room = Roon::updateOrCreate([
                        'name' =>  $itemRoom['roomType'],
                        'hotel_id' => 1,
                        'adult_quantity' => $itemRoom['maxOccupancyPerRoom'] > 1 ?  $itemRoom['maxOccupancyPerRoom'] : 1,
                        'description' => $itemRoom['description'],
                        'price' => $itemRoom['netPrice'],
                        'min_price' => $itemRoom['netPrice'],
                        'inclusions' => json_encode($itemRoom),
                        'image' => $imgRoom,
                    ]);
                    $idR = [] ;
                
                    foreach ($itemRoom['facilities'] as $value){
                        $facility = new Facilities();
                        $facilityItem = $facility->getItemByName($value);
                        // dd($facilityItem);
                        if( count($facilityItem)){
                            $idR[] = $facilityItem[0]->id;
                        }else{
                            $item =  Facilities::create([
                                'name' =>$value,
                                'type' => 2,
                            ]);
                            $idR[] = $item->id;
                        }
                    }
                    $room->facility()->sync($idR);
                    
                };

            }
           
          
        }
    }
}
