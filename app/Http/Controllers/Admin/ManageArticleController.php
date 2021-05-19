<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\ManageArticle;
use Auth;

class ManageArticleController extends Controller
{

    public function index(Request $request)
    {
        $article_list = ManageArticle::get()->toArray();
        $label = 'article';
        return view('Admin.ManageArticle.list', compact('label', 'article_list'));
    }

    public function add(Request $request)
    {    
        if($request->isMethod('post')){
            $data                       = $request->all();
            $add_article                = new ManageArticle;
            $add_article->title         = $data['title'];
            $add_article->description   = $data['description'];
            if(!empty($data['image'])){
                $fileName = time() . '.' . $request->image->extension();
                $base_url = url('uploads/articles');
                $request->image->move(public_path('uploads/articles'), $fileName);
                $add_article->image = $base_url.'/'.$fileName;
            }
            if($add_article->save()){
                return redirect('/admin/manage-article')->with('success','Article added successfully');
            }else{
                return redirect('/admin/manage-article')->with('error','CommonError');
            }
        }
        $label = 'article';
        return view('Admin.ManageArticle.form', compact('label'));
            
    }

    public function edit(Request $request, $id)
    {    
        if($request->isMethod('post')){
            $data                       = $request->all();
            $edit_article                = ManageArticle::find($id);
            $edit_article->title         = $data['title'];
            $edit_article->description   = $data['description'];
            if(!empty($data['image'])){
                $fileName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads\articles'), $fileName);
                $base_url = url('uploads/articles');
                $edit_article->image = $base_url.'/'.$fileName;
            }
            if($edit_article->save()){
                return redirect()->back()->with('success','Article edited successfully');
            }else{
                return redirect('/admin/manage-article')->with('error','CommonError');
            }
        }
        $article_details = ManageArticle::where('id',$id)->first();
        $label = 'article';
        return view('Admin.ManageArticle.form', compact('label','article_details'));
            
    }

    public function delete($id)
    {
        $delete = ManageArticle::where('id', $id)->delete();
        if ($delete) {
            return redirect()->back()->with('success', 'Article deleted successfully');
        } else {
            return redirect('admin/category')->with('error', 'Something went wrong, Please try again later.');
        }
    }
}
