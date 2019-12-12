<?php

namespace App;

use App\Birthday;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Auth;

class BirthdayExport implements FromCollection,WithHeadings
{
  public function collection()
  {
    return Birthday::where('user_id',Auth::id())->get();
  }

  public function headings(): array
    {
        return [
            'id',
            'user_id',
            'name',
            'email',
            'date',
            'created_at',
            'updated_at'
        ];
    }
}