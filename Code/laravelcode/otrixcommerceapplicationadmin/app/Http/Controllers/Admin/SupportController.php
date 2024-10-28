<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contactus;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SupportController extends Controller
{

    public function index(Request $request) {
        $records = Contactus::latest()->paginate($this->defaultPaginate);
        return view('admin.contactus.index',['records' => $records]);
    }

}
