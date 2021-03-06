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

  $req->validate([
    'pdf'=>'required|mimes:pdf',
    
]);

$newPdfname=$req->pdf->getClientOriginalName();
$req->pdf->move(public_path('pdf'),$newPdfname);
$doc->pdf=$newPdfname;
  $doc->user_id=Auth::user()->id;
  $doc->save();
  return redirect('/');
  }

  
  public function destroy($id){
    Document::find($id)->delete();
    return redirect('/');
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
    return redirect('/');
  }


  public function search(){
    
    $search=$_GET['search'];
    $document=Document::where('keywords','LIKE','%'.$search.'%')->get();
    return view('pages.search',compact('document'));
  }
  public function download(Request $req, $file){

    return response()->download(public_path(('pdf/'.$file)));
}

  public function getUsers(){
  $users=User::all();
  return view('pages/profile',['users'=>$users]);
}
public function editProfile($id)
    {
      $user=  User::find($id);
       return view('pages.editProfile',['user'=>$user]);
    }

public function updateProfile(Request $req,$id){
      
  $user=User::find($id);
  $user->name=$req->name;
  
  $newImagename=$req->image->getClientOriginalName();
  $req->image->move(public_path('images'),$newImagename);
  $user->image=$newImagename;
  $user->update();
  return redirect('profile');
}

}
