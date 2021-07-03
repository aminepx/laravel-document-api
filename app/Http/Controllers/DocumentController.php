<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function alldocuments()
    {
        $documents=Document::all();
        return response()->json(['documents'=>$documents]);
    }



    public function store(Request $req)
  {
    $doc= new Document();

 
  $doc->title=$req->title;
  $doc->subtitle=$req->subtitle;
  $doc->summary=$req->summary;
  $doc->keywords=$req->keywords;
  $doc->save();
  }


  public function destroy($id){
    Document::find($id)->delete();
}


  public function update(Request $req,$id){
      
    $doc=Document::find($id);
    $doc->title=$req->title;
    $doc->subtitle=$req->subtitle;
    $doc->summary=$req->summary;
    $doc->keywords=$req->keywords;

    $doc->update();
  }
}
