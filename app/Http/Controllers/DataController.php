<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;

class DataController extends Controller
{
    
    public function storeData(){


    $allFileData = file_get_contents(public_path('data/jsondata.json'));
    $decodeFileData = json_decode($allFileData, true);
 
   
    $array = [
        'appsettings' => json_encode($decodeFileData['AppSettings']),
        'mosqueinfo' => json_encode($decodeFileData['MosqueInfo']),
        'showadscontrol' => json_encode($decodeFileData['ShowAdsControl']),
        'subscription' => json_encode($decodeFileData['Subscription']),
        'users' => json_encode($decodeFileData['Users']),
        'poc' => json_encode($decodeFileData['poc']),
    ];
    

// Data Created with a single orm Query
    Data::create($array);


    return redirect('/');


    }
    

}
