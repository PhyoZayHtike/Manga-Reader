<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use App\Models\Chapter;
use App\Models\HomePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    //noraml home page
    public function home(){
        $detail = HomePage::when(request('search'),function($query){
            $query->where('title','like','%'.request('search').'%' );
        })->orderBy('id','desc')->paginate(12);
        $detail->appends(request()->all());
        $chapters = Chapter::orderBy('chapter_number','asc')->get();
        return view("admin.home",compact("detail",'chapters'));
    }
    //create page
    public function createPage(){
        return view("admin.create");
    }
    //create mainPhoto manga
    public function create(Request $request){
        $this->createPageValidation($request);
        $data = $this->getCreatePageData($request);

        //image
        $fileName = uniqid().$request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/mainPhoto', $fileName);
        $data['image'] = $fileName;

        HomePage::create($data);
        return redirect()->route('admin#home');
    }
        //delete Manga
    public function mangaDelete($id){
        // mainphoto delete
      $mainPhoto = HomePage::find($id);
      $photoPath = $mainPhoto->image;
       if($photoPath){
        Storage::disk('public')->delete('mainPhoto/' .$photoPath);
       }

        // chapter photo delete
        $chapterPhotoPaths = Chapter::where('chapter_id', $id)->pluck('image_path')->toArray();

        foreach ($chapterPhotoPaths as $imagePath) {
            if ($imagePath && Storage::disk('public')->exists('chapters/' . $imagePath)) {
                Storage::disk('public')->delete('chapters/' . $imagePath);
            }
        }
      HomePage::where('id',$id)->delete();
      Chapter::where('chapter_id',$id)->delete();
     return back();
    }
    //detail page
    public function detail($id){
        $order = request('order','asc');
        $detail = HomePage::where('id',$id)->first();
        $chapters = Chapter::where('chapter_id',$id)->orderBy('chapter_number',$order)->get();
        return view('admin.detail',compact('detail','chapters','order'));
    }

    // chapter delete
    public function chapterDelete($chapterId, $chapterNumber){
        $chapterPhoto = Chapter::where('chapter_id',$chapterId)
         ->where('chapter_number',$chapterNumber)->pluck('image_path');
        foreach($chapterPhoto as $imagePath) {
          if ($imagePath && Storage::disk('public')->exists('chapters/'. $imagePath)) {
             Storage::disk('public')->delete('chapters/' . $imagePath);
          }
        }
         Chapter::where('chapter_id',$chapterId)
         ->where('chapter_number',$chapterNumber)
         ->delete();
     return back();
    }

    // account management page
    public function account(){
        $data= Auth::user()->when(request('search'),function($query){
            $query
            ->orWhere('name','like','%'.request('search').'%')
            ->orWhere('email','like','%'.request('search').'%');
        })->paginate(7);
        $data->appends(request()->all());
        return view('admin.accountManagement',compact('data'));
    }
    // change role
    public function changeRole(Request $request){
       User::where('id',$request->userId)->update([
         'role' => $request->role,
       ]);
    }

    // account delete
    public function accountDelete($userId){
        User::where('id',$userId)->delete();
        return back();
    }

    // message
    public function message(){
        $message = Message::paginate(6);
        return view('admin.message',compact('message'));
    }
    // delete message
    public function messageDelete($id){
        Message::where('id',$id)->delete();
        return back();
    }

    //create data
    private function getCreatePageData($request){
        return [
         'title' => $request->name,
         'type' => $request->typeList,
         'summary' => $request->summary,
         'author_name' => $request->authorName,
         'artist_name' => $request->artistName,
         'genre_name' => $request->genreName,
         'rating' => $request->rating,
        ];
    }
    //validation
    private function createPageValidation($request){
        Validator::make($request->all(), [
           'name' => 'required',
           'typeList' => 'required',
           'summary' => 'required',
           'authorName' => 'required',
           'artistName' => 'required',
           'genreName' => 'required',
           'rating' => 'required|numeric|between:1,5',
           'image' => 'required|mimes:png,jpg,jpeg,webp|file',
        ])->validate();
    }
}
