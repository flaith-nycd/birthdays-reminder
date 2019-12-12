<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BirthdayExport;
use Excel;
use Auth;

class ExportController extends Controller
{
    public function export_excel(){
        $user=Auth::user();
        return Excel::download(new BirthdayExport(),$user->name.'_birthday_list.xlsx');
    }

    public function export_csv(){
        $user=Auth::user();
        return Excel::download(new BirthdayExport(),$user->name.'_birthday_list.csv');
    }

}
