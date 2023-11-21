<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\HomePage;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function uploadChapter(Request $request) {
        $request->validate([
            'chapterNumber' => 'required',
            'chapterImages' => 'required|array',
            'chapterImages.*' => 'image|mimes:jpeg,png,jpg,gif,webp',
        ]);

        foreach ($request->file('chapterImages') as $image) {
            $imageName = uniqid() .  '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('public/chapters', $imageName);
            Chapter::create([
                'chapter_number' => $request->chapterNumber,
                'chapter_id' => $request->chapterId,
                'image_path' => $imageName,
            ]);
        }
        return back();
    }
    public function view($chapterId, $chapterNumber){
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
        return view('admin.read',compact('chapter','data','chapterNum','prevChapter','nextChapter','allChapters'));
    }
}
