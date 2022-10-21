<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;
use App\Models\Todo;
class ApiController extends Controller
{
    use GeneralTrait;
   public function all_todo()
   {
        $todo = Todo::all();
        return $this->returnData('Data',$todo,'Done');
   }
}
