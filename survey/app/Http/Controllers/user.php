<?php

namespace App\Http\Controllers;
use app\DataTables\MemberDataTable;
use Illuminate\Http\Request;
class user extends Controller
{
    public function index(MemberDataTable $dataTable){
        return $dataTable->render('member');
    }
}
