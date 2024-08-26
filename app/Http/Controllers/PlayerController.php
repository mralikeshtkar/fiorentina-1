<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Exception;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Botble\Base\Supports\Breadcrumb;
use Botble\Base\Http\Controllers\BaseController;
use App\Http\Forms\AdForms;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Http;



class PlayerController extends BaseController
{




    public static function fetchSquad(){
    
                $response = Http::withHeaders([
                    "x-rapidapi-host" => 'flashlive-sports.p.rapidapi.com',
                    "x-rapidapi-key" => '1e9b76550emshc710802be81e3fcp1a0226jsn069e6c35a2bb'
                ])->get('https://flashlive-sports.p.rapidapi.com/v1/teams/squad?sport_id=1&locale=en_INT&team_id=Q3A3IbXH');

                $playersGroups=$response->json()['DATA'];
                foreach($playersGroups as $playersGroup){
                    foreach($playersGroup['ITEMS'] as $player ){
                        dd($player);
                        Player::where('name', $player['PLAYER_NAME'])->update(
                            [
                                'image' => $player['PLAYER_IMAGE_PATH'],
                                'flag_id' => $player['PLAYER_FLAG_ID'],
                                'jersey_number' => $player['PLAYER_JERSEY_NUMBER'],
                            ]
                        );

                    }
                }
    
                // Dump the filtered data
                dd($Player::all());
    }


}
