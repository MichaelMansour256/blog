<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function testAction()
    {
        $allPosts=[
            ['id'=>1,'title'=>'mvc pattern','posted_by'=>'ahmed','created_at'=>'2020-08-29'],
            ['id'=>2,'title'=>'bbc pattern','posted_by'=>'mick','created_at'=>'2020-08-23'],
            ['id'=>3,'title'=>'factory pattern','posted_by'=>'ghaly','created_at'=>'2020-08-27'],
            ['id'=>4,'title'=>'oop pattern','posted_by'=>'mansour','created_at'=>'2020-08-28']
        ];
        return view('test',['posts'=>$allPosts]);
    }
}
