<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Person;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function show($id)
    {
        $post = Post::find($id);
        $this->authorize('show', $post);
        return view('pages.post', ['post' => $post, "comments" => $post->comments->where("deleted", "=", false)]);
    }

    public function create(Request $request)
    {
        $post = new Post();
        $post->user_id = Auth::user()->id;

        $post->description = $request->input('description');
        if ($request->input("group_id") != null) {
            $post->private = "false";
            $post->group_id = $request->input('group_id');
        } else {
            $post->private = $request->input('private');
            $post->group_id = null;
        }
        if ($request->input('picture') != null)
            $post->picture = public_path() . "images/posts/" . $post->id . ".png";

        $this->authorize('create', $post);

        $post->save();

        return $post;
    }

    public function delete($id)
    {
        $post = Post::find($id);

        $this->authorize('delete', $post);
        $post->update(["banned" => 'true']);

        return $post;
    }

    public function showPostInfo(Request $request, $id)
    {
        $post = Post::find($id);

        if ($post == null) {
            return null;
        }

        return view("partials.post", ["post" => $post, "comments" => $post->comments->where("deleted", "=", false)->take(2)]);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        $this->authorize('update', $post);
        $post->description = $request->input('description');
        $post->private = $request->input('private');

        return $post;
    }

    public function showPostForm()
    {
        $this->authorize('form', Post::class);
        return view("partials.post_form");
    }
}
