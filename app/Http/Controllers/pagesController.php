<?php

	namespace blog\Http\Controllers;

	use blog\Post;

	class pagesController extends Controller {

		public function getIndex() {

			$posts = Post::orderBy('id', 'desc')->paginate(10);

			return view('pages.welcome')->with('posts', $posts);

		}

		public function getAbout() {
			
			$name = "Apal";

			return view('pages.about') -> withName($name);

		}

		public function getContact() {
			
			return view('pages.contact');

		}
	}

?>