<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Post;
use App\Page;
use App\Category;
use App\Paginator;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use League\CommonMark\CommonMarkConverter;

class ContentController extends Controller
{
	//
	private $itemPerPage = 5;

	public function index(){
		$posts = Post::where('is_page', false)->select('permalink', 'title', 'created_at')->get();
		$about = Post::where([['is_page', true],['permalink', 'about']])->select('content')->first();

		$converter = new CommonMarkConverter();
		$about->content = $converter->convertToHtml($about->content);
		return view('index', [
			'posts' => $posts,
			'about' => $about,
		]);
	}

	public function blogIndex($currentPage = 1){
		$posts = Post::where('is_page', false)->orderBy('id', 'desc')->skip(($currentPage-1)*$this->itemPerPage)->take($this->itemPerPage)->get();
		$postCount = Post::where('is_page', false)->count();

		$paginator = new Paginator('/blog/page/', $postCount, $this->itemPerPage, $currentPage, true);

		$converter = new CommonMarkConverter();
		foreach ($posts as $post) {
			$post->content = $converter->convertToHtml($post->content);
		}

		return view('blog.index', [
			'posts' => $posts,
			'paginator' => $paginator,
			'header' => ''
		]);
	}

	public function blogPost($permalink){
		$post = Post::where([
				['permalink', $permalink],
				['is_page', false]
			])->firstOrFail();

		$converter = new CommonMarkConverter();
		$post->content = $converter->convertToHtml($post->content);

		$header = (object) [
			'created_at' => $post->created_at,
			'title' => $post->title,
			'author' => (object) [
				'name' => User::first()->name,
				'link' => '/blog'
			]
		];
		$disqus = (object) [
			'permalink' => url("/")."/blog/$post->permalink",
			'identifier' => "post-$post->id",
			'title' => $post->title,
		];

		return view('blog.singlePost', [
			'header' => $header,
			'post' => $post,
			'disqus' => $disqus,
		]);
	}

	public function page($permalink){
		if($permalink == "about")
			abort(404);
		$page = Post::where([
				['permalink', $permalink],
				['is_page', true]
			])->firstOrFail();

		$converter = new CommonMarkConverter();
		$page->content = $converter->convertToHtml($page->content);
		
		$header = (object) [
			'created_at' => $page->created_at,
			'title' => $page->title,
			'author' => (object) [
				'name' => User::first()->name,
				'link' => '/'
			]
		];
		$disqus = (object) [
			'permalink' => url("/")."/$page->permalink",
			'identifier' => "page-$page->id",
			'title' => $page->title,
		];

		return view('page', [
			'header' => $header,
			'page' => $page,
			'disqus' => $disqus,
		]);
	}


}
