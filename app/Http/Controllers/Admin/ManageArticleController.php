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

    public function add(Request $request, $id = null)
    {
        try {
            if ($request->isMethod('GET')) {
                if ($id) {
                    $formLabel = 'Edit';
                    $article = ManageArticle::findorFail($id);
                } else {
                    $article = [];
                    $formLabel = 'Add';
                }
                $label = 'article';
                return view('Admin.ManageArticle.form', compact('label', 'formLabel', 'article'));
            } else if ($request->isMethod('POST')) {
                $data = $request->all();
                $validator =  Validator::make($data, [
                    'title' =>  'required',
                    'description'=> 'required'
                ]);
                if ($validator->fails()) {
                    return redirect()->back()->withInput()->withErrors($validator->errors());
                }
                $user = ManageArticle::where('id', $request['id'])->first();
                if ($request['id']) {
                    $msz =  'Updated';
                } else {
                    $msz =  'Added';
                }
                $users =  ManageArticle::addEdit($data);
                $msz = $request['id'] ? 'Updated' : 'Added';
                return redirect('admin/manage-article')->with(['success', 'User ' . $msz . ' Successfully']);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
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
