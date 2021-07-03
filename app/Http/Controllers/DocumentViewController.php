<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentViewController extends Controller
{
    public function alldocuments()
    {
        $documents=Document::all();
        $users=User::all();
        return view('pages/feed',['documents'=>$documents],['users'=>$users]);
    }

    public function add()
    {
        return view('pages.add');
    }

    
    public function store(Request $req)
  {
    $doc= new Document();

 
  $doc->title=$req->title;
  $doc->subtitle=$req->subtitle;
  $doc->summary=$req->summary;
  $doc->keywords=$req->keywords;
  $doc->user_id=Auth::user()->id;
  $doc->save();
  return redirect('/all');
  }

  
  public function destroy($id){
    Document::find($id)->delete();
    return redirect('/all');
}





public function edit($id)
    {
      $document=  Document::find($id);
       return view('pages.update',['doc'=>$document]);
    }

  public function update(Request $req,$id){
      
    $doc=Document::find($id);
    $doc->title=$req->title;
    $doc->subtitle=$req->subtitle;
    $doc->summary=$req->summary;
    $doc->keywords=$req->keywords;

    $doc->update();
    return redirect('/all');
  }
}
