<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Post;
use App\Category;
use App\Paginator;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
	//
	private $itemPerPage = 5;
	public function index(Request $request, $currentPage = 1){
		$posts = Post::where('is_page', false)->orderBy('id', 'desc')->skip(($currentPage-1)*$this->itemPerPage)->take($this->itemPerPage)->get();
		$postsCount = Post::where('is_page', false)->count();

		$paginator = new Paginator('/kanepe/posts/', $postsCount, $this->itemPerPage, $currentPage);

		return view('admin.post.list', [
			'posts' => $posts,
			'paginator' => $paginator
		]);
	}

	public function edit(Request $request, $pageid = -1){
		$title = "";
		$permalink = "";
		$content = "";
		if($pageid != -1){
			$post = Post::find($pageid);
			$title = $post->title;
			$permalink = $post->permalink;
			$content = $post->content;
		}
		return view('admin.post.edit', [
			'id' => $pageid,
			'title' => $title,
			'permalink' => $permalink,
			'content' => $content,
		]);
	}

	public function save(Request $request){
		$this->validate($request, [
			'title' => 'required|max:255',
			'permalink' => 'required|max:255',
			'content' => 'required',
		]);
		if($request->id == -1){
			$post = new Post();
		} else {
			$post = Post::find($request->id);
		}
		$post->title = $request->title;
		$post->content = $request->content;
		$post->permalink = $request->permalink;
		$post->user_id = Auth::user()->id;
		$post->save();
		return redirect("/kanepe/posts/");
	}

	public function delete(Request $request, $id){
		$post = Post::find($id);
		$post->delete();
		return redirect("/kanepe/posts/");
	}
}
