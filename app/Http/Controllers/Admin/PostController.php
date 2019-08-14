<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Validator;
use function implode;
use function str_replace;
use function strtolower;
use function time;
use function view;

class PostController extends Controller
{
	/*
	 * CATEGORIES FUNCTIONS
	 */
	
	function Categories(Request $request)
	{
		$data = array ();
		$data['title'] = 'Category List';

        if (count($request->all()) > 0) {
            $string = $request->string;
            $data['categories'] = Category::where('name', "LIKE", "%" . $string . "%")
                ->orWhere('description', "LIKE", "%" . $string . "%")
                ->orWhere('bangla_name', "LIKE", "%" . $string . "%")
                ->orderBy('name', 'asc')->paginate(10);
		} else {
            $data['categories'] = Category::orderBy('name', 'asc')->paginate(10);
		}
		
		return view('backend.dynamic.categories', $data);
	}
	
	function SaveCategory(Request $request)
	{
        $validator = Validator::make($request->all(), [
			'name' => 'required|unique:categories|max:50',
            'bangla_name' => 'required|unique:categories|max:100',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'description' => 'required',
		]);


        if ($validator->fails()) {
			return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
		}
		
		$new = new Category();
        $new->name = $request->name;
        $new->bangla_name = $request->bangla_name;
        $new->description = $request->description;
        $new->status = $request->status;
        $new->is_league = $request->is_league;
		
		if (Input ::has('logo')) {
			$image = Input ::file('logo');
            $filename = 'category_' . time() . '.' . $image->getClientOriginalExtension();
			$path = public_path('/image_upload/' . $filename);
            Image::make($image->getRealPath())->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path);
            $new->image = '/image_upload/' . $filename;
        }

        $new->save();
		
		$notification = array (
			'message' => 'Category Information Saved Successfully!',
			'alert-type' => 'success'
		);

        return back()->with($notification);
	}
	
	function UpdateCategory(Request $request)
	{
        $id = $request->id;
		
		$new = Category ::find($id);
        $new->name = $request->name;
        $new->bangla_name = $request->bangla_name;
        $new->description = $request->description;
        $new->status = $request->status;
        $new->is_league = $request->is_league;
		
		if (Input ::has('logo')) {
			$image = Input ::file('logo');
            $filename = 'category_' . time() . '.' . $image->getClientOriginalExtension();
			$path = public_path('image_upload/' . $filename);
            Image::make($image->getRealPath())->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path);
            $new->image = 'image_upload/' . $filename;
        }


        $new->save();
		
		$notification = array (
			'message' => 'Category Information Updated Successfully!',
			'alert-type' => 'success'
		);

        return back()->with($notification);
	}
	
	public function DeleteCategory($id)
	{
		Category ::destroy($id);
		$notification = array (
			'message' => 'Category Information Deleted Successfully!',
			'alert-type' => 'success'
		);

        return back()->with($notification);
	}
	
	
	/*
	 * ARTICLES FUNCTIONS
	 */
	
	public function CreateArticle()
	{
		$data = array ();
		$data['title'] = 'Create Article';
        $data['categories'] = Category::orderBy('name', 'asc')->get();
        $data['users'] = User::orderBy('name', 'asc')->get();
		return view('backend.dynamic.article_management.create_article', $data);
	}
	
	public function SaveArticle(Request $request)
	{
		
		$article = new Article();
        $article->title = $request->title;
        $article->description = $request->description;
        $article->user_id = $request->user_id;
        $article->tags = $request->tags;
        $article->meta_title = $request->meta_title;
        $article->meta_keyword = $request->meta_keyword;
        $article->status = $request->status;
        $article->featured_status = $request->featured_status;
        $article->slug = str_replace(' ', '-', strtolower($request->slug));

        $categories = implode(',', $request->category_id);
        $article->category_id = $categories;

        if ($request->file('image')) {
			
			$image = Input ::file('image');
            $image_name = str_replace(' ', '-', strtolower($request->slug)) . '_' . time() . '.' . $image->getClientOriginalExtension();
			
			$path = public_path('image_upload/post_image/' . $image_name);


            $img = Image::make($image->getRealPath())->resize(800, 800, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path);
			
			
			//Medium Size Image conversion
			
			$m_path = public_path('/image_upload/post_image/resized/');
			
			//Image resizing with aspect ratio and saving it to the directory
            $img->resize(null, 200, function ($constraint) {
                $constraint->aspectRatio();
			});
            $img->save($m_path . '/' . $image_name, 85);
			
			
			// Thumbnail Size conversion
			
			$thumbs_path = public_path('/image_upload/post_image/thumbs/');
			
			//Image resizing with aspect ratio and saving it to the directory
            $img->resize(null, 85, function ($constraint) {
                $constraint->aspectRatio();
			});
            $img->save($thumbs_path . '/' . $image_name, 85);

            $article->image = $image_name;
			
		}

        $article->save();
		
		$notification = array (
			'message' => 'Article Created Successfully!',
			'alert-type' => 'success'
		);


        return redirect('admin/articles-list')->with($notification);
	}
	
	public function manageArticles(Request $request)
	{
		$data = array ();
		$data['title'] = 'Articles List';

        if (count($request->all()) > 0) {
            $string = $request->string;
            $data['articles'] = Article::with('author', 'admin')->latest()->where('title', "LIKE", "%" . $string . "%")
                ->orderBy('title', 'asc')->paginate(20);
		} else {
            $data['articles'] = Article::with('author', 'admin')->latest()->orderBy('title', 'asc')->paginate(20);
		}
		
		$data['module_navigation'] = view('backend/module_navigation/manage_article_nav', $data);
		
		return view('backend.dynamic.article_management.manage_articles', $data);
	}
	
	public function managePendingArticles(Request $request)
	{
		$data = array ();
		$data['title'] = 'Pending Articles List';

        if (count($request->all()) > 0) {
            $string = $request->string;
            $data['articles'] = Article::with('author', 'admin')->latest()->where('title', "LIKE", "%" . $string . "%")
                ->orderBy('title', 'asc')->paginate(20);
		} else {
            $data['articles'] = Article::with('author', 'admin')->latest()->where('status', 0)->orderBy('title', 'asc')->paginate(20);
		}
		
		$data['module_navigation'] = view('backend/module_navigation/manage_article_nav', $data);
		
		return view('backend.dynamic.article_management.manage_articles', $data);
	}
	
	public function deleteArticle($id)
	{
	    $image = Article::where('id', $id)->value('image');
	    if($image != '')
	    {
	        $this->deleteArticleImage($id);
	    }
		
		
		Article ::destroy($id);
		$notification = array (
			'message' => 'Article Deleted Successfully!',
			'alert-type' => 'success'
		);

        return back()->with($notification);
	}
	
	public function EditArticle($id)
	{
		$data = array ();
		$data['title'] = 'Edit Article';

        $data['categories'] = Category::orderBy('name', 'asc')->get();
        $data['users'] = User::orderBy('name', 'asc')->get();
		$data['info'] = Article::find($id);
		
		return view('backend.dynamic.article_management.edit_article', $data);
	}
	
	public function UpdateArticle(Request $request, $id)
	{
		$article = Article::find($id);

        $article->title = $request->title;
        $article->description = $request->description;
        $article->user_id = $request->user_id;
        $article->tags = $request->tags;
        $article->meta_title = $request->meta_title;
        $article->meta_keyword = $request->meta_keyword;
        $article->status = $request->status;
        $article->featured_status = $request->featured_status;
        $article->slug = str_replace(' ', '-', strtolower($request->slug));

        $categories = implode(',', $request->category_id);
        $article->category_id = $categories;

        if ($request->file('image')) {
			
			$this->deleteArticleImage($id);
			
			$image = Input ::file('image');
            $image_name = str_replace(' ', '-', strtolower($request->slug)) . '_' . time() . '.' . $image->getClientOriginalExtension();
			
			$path = public_path('image_upload/post_image/' . $image_name);


            $img = Image::make($image->getRealPath())->resize(800, 800, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path);
			
			
			//Medium Size Image conversion
			
			$m_path = public_path('/image_upload/post_image/resized/');
			
			//Image resizing with aspect ratio and saving it to the directory
            $img->resize(null, 200, function ($constraint) {
                $constraint->aspectRatio();
			});
            $img->save($m_path . '/' . $image_name, 85);
			
			
			// Thumbnail Size conversion
			
			$thumbs_path = public_path('/image_upload/post_image/thumbs/');
			
			//Image resizing with aspect ratio and saving it to the directory
            $img->resize(null, 85, function ($constraint) {
                $constraint->aspectRatio();
			});
            $img->save($thumbs_path . '/' . $image_name, 85);

            $article->image = $image_name;
			
		}

        $article->save();
		
		$notification = array (
			'message' => 'Article Updated Successfully!',
			'alert-type' => 'success'
		);


        return redirect('admin/articles-list')->with($notification);
	}
	
	public function deleteArticleImage($id)
	{
		$image = Article::where('id', $id)->value('image');
		
		if($image != '')
		{
		    if(file_exists(public_path('/image_upload/post_image/'.$image))) // make sure it exits inside the folder
    		{
    			unlink(public_path('/image_upload/post_image/'.$image)); // delete file/image
    			unlink(public_path('/image_upload/post_image/resized/'.$image)); // delete file/image
    			unlink(public_path('/image_upload/post_image/thumbs/'.$image)); // delete file/image
    		}
		}
		
		
		return true;
	}
}
