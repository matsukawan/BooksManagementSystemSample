<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Review;
use App\Models\Employee;
use App\Models\Departments;

class DbController extends Controller
{
    public function index()
    {
        $data = [
            'records' => Book::All()
        ];
        return view('db.showLibrary',$data);
    }   
}
