<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Hash;
use Validator;
use App\User;
use App\Post;
use App\Paginator;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
	//
	private $itemPerPage = 5;
	public function index(Request $request, $currentPage = 1){
		$pages = Post::where([['is_page', true],['permalink', "!=", "about"]])->orderBy('id', 'desc')->skip(($currentPage-1)*$this->itemPerPage)->take($this->itemPerPage)->get();
		$pagesCount = Post::where('is_page', true)->count();

		$paginator = new Paginator('/kanepe/pages/', $pagesCount, $this->itemPerPage, $currentPage);

		return view('admin.page.list', [
			'pages' => $pages,
			'paginator' => $paginator
		]);
	}

	public function edit(Request $request, $pageid = -1){
		$title = "";
		$permalink = "";
		$content = "";
		if($pageid != -1){
			$page = Post::find($pageid);
			$title = $page->title;
			$permalink = $page->permalink;
			$content = $page->content;
		}
		return view('admin.page.edit', [
			'id' => $pageid,
			'title' => $title,
			'permalink' => $permalink,
			'content' => $content
		]);
	}

	public function save(Request $request){
		$this->validate($request, [
			'title' => 'required|max:255',
			'permalink' => 'required|max:255',
			'content' => 'required'
		]);
		if($request->id == -1){
			$page = new Post();
		} else {
			$page = Post::find($request->id);
		}
		$page->title = $request->title;
		$page->content = $request->content;
		$page->permalink = $request->permalink;
		$page->user_id = Auth::user()->id;
		$page->is_page = true;
		$page->save();
		return redirect("/kanepe/pages/");
	}

	public function delete(Request $request, $id){
		$page = Post::find($id);
		$page->delete();
		return redirect("/kanepe/pages/");
	}

	public function editAbout(Request $request){
		$page = Post::where('permalink', 'about')->first();
		$user = Auth::user();
		return view('admin.about.edit', [
			'page' => $page,
			'user' => $user,
		]);
	}

	public function saveAbout(Request $request){
		$this->validate($request, [
			'content' => 'required'
		]);
		$page = Post::where('permalink', 'about')->first();
		$page->content = $request->content;
		$page->user_id = Auth::user()->id;
		$page->save();
		return redirect("/");
	}

	public function saveProfile(Request $request){
		$validator = Validator::make($request->all(), [
			'name' => 'required',
			'email' => 'required',
			'password' => 'confirmed',
        ]);
        $this->currentPassTrue = Hash::check($request->current_password, Auth::user()->password);
        $validator->after(function($validator) {
			if (!$this->currentPassTrue) {
				$validator->errors()->add('current_password', 'Current password is not true!');
			}
		});
		
		if($validator->fails()){
            return back()
                        ->withErrors($validator)
                        ->withInput();
		}
		
		Auth::user()->fill([
			'name' => $request->name,
			'email' => $request->email,
            'password' => strlen($request->password) >= 6 ? Hash::make($request->password) : Auth::user()->password
        ])->save();

		return redirect("/kanepe/");
	}
}
