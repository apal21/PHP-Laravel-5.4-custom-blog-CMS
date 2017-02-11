<?php

	namespace blog\Http\Controllers;

	use blog\Post;
	use blog\Category;
	use Illuminate\Http\Request;
	use Mail;
	use Session;

	class pagesController extends Controller {

		public function getIndex() {

			$posts = Post::orderBy('id', 'desc')->paginate(10);
			$recents = Post::orderBy('id', 'desc')->take(5)->get();
			$categories = Category::orderBy('id', 'asc')->get();

			return view('pages.welcome')->with('posts', $posts)->with('recents', $recents)->with('categories', $categories);

		}

		public function getAbout() {
			
			$name = "Apal";

			return view('pages.about') -> withName($name);

		}

		public function getContact() {
			
			return view('pages.contact');

		}

		public function postContact(Request $request) {

			$this->validate($request, [
					'name' => 'required|max:30',
					'email' => 'required|email',
					'subject' => 'required'
				]);

			$data = [
				'name' => $request->name,
				'email' => $request->email,
				'subject' => $request->subject
			];

			Mail::send('emails.contact', $data, function($message) use ($data) {

				$message->from($data['email']);
				$message->to('apalshah21121996@gmail.com');
				$message->subject($data['subject']);

			});

			Session::flash('success', 'Your message has been sent');

			return redirect('/');
		}
	}

?>