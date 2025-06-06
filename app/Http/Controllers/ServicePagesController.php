<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use App\Models\DoctorDepartmentTranslation;
use App\Models\DoctorTranslation;
use App\Models\Doctor;
use App\Models\Image;

use Illuminate\Http\Request;

class ServicePagesController extends Controller
{
    public function inektsionnayaterapiya(){

        return view('services.inektsionnaya-terapiya');
    }
    public function plazmoterapiya(){

        return view('services.plazmoterapiya');
    }
    public function rflifting(){

        return view('services.rf-lifting');
    }

    public function lazernayaepilyatsiya(){

        return view('services.lazernaya-epilyatsiya');
    }

    public function lazernoeomolozhenie(){

        return view('services.lazernoe-omolozhenie');
    }

    public function co2(){

        return view('services.co2');
    }

    public function checkup(){

        return view('services.checkup');
    }

    public function panoptix(){

        return view('services.panoptix');
    }

    public function oklens(){

        return view('services.oklens');
    }

    public function tests()
    {


        return view('services.tests');
    }

    public function liposaktsiya(){

        return view('services.liposaktsiya-ta-liposkulpturuvannya-v-dokart');
    }

}
