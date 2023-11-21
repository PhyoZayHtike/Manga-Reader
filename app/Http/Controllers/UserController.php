<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\HomePage;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //user page
     public function userHome(){
        $data = HomePage::when(request('search'),function($query){
            $query->where('title','like','%'.request('search').'%' );
        })->orderBy('id','desc')->paginate(8);
        $data->appends(request()->all());
        $chapters = Chapter::orderBy('chapter_number','asc')->get();
        return view('userHome.user',compact('data','chapters'));
    }
    public function filter($type){
        $data = HomePage::when(request('search'),function($query){
            $query->where('title','like','%'.request('search').'%' );
        })->where('type',$type)->orWhere('rating','>=',$type)
        ->orderBy('id','desc')
        ->paginate(8);
        $data->appends(request()->all());
        $chapters = Chapter::orderBy('chapter_number','asc')->get();
        return view('userHome.user',compact('data','chapters'));
    }
    public function genres($genre){
        $data = HomePage::when(request('search'),function($query){
            $query->where('title','like','%'.request('search').'%' );
        })->where('genre_name',$genre)->paginate(8);
        $data->appends(request()->all());
        $chapters = Chapter::orderBy('chapter_number','asc')->get();
        return view('userHome.user',compact('data','chapters'));
    }
    public function userdetail($id){
        $order = request('order','asc');
        $detail = HomePage::where('id',$id)->first();
        $chapters = Chapter::where('chapter_id',$id)->orderBy('chapter_number',$order)->get();
        return view('userHome.detail',compact('detail','chapters','order'));
    }

    //read
    public function view($chapterId , $chapterNumber){
        $data = HomePage::where('id',$chapterId)->first();
        $chapterNum = Chapter::where('chapter_number',$chapterNumber)->first();
        $chapter = Chapter::where('chapter_id',$chapterId)
                  ->where('chapter_number', $chapterNumber)
                  ->get();
        $allChapters = Chapter::where('chapter_id', $chapterId)->get();
       $prevChapter = Chapter::where('chapter_id', $chapterId)
       ->where('chapter_number', $chapterNumber - 1)
       ->first();
       $nextChapter = Chapter::where('chapter_id', $chapterId)
       ->where('chapter_number', $chapterNumber + 1)
       ->first();
        return view('userHome.read',compact('data','chapterNum','chapter','prevChapter','nextChapter','allChapters'));
    }
}
