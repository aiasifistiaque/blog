<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\test;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class DeleteArticle extends Controller
{
    public function destroy($id) {
        test::destroy($id);
        return redirect()->action('Auth\Profile@profile');        
     }
}
