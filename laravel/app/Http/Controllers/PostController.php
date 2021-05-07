<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Person;
use App\Models\User;
use App\Models\Post;

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
        $this->authorize('create', $post);

        $post->user_id = Auth::user()->id;
        $post->picture = $request->input('picture');
        $post->description = $request->input('description');
        $post->private = $request->input('private');
        $post->group_id = $request->input('group_id');
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

    public function showPostInfo(Request $request)
    {
        $post = Post::find($request->query('id'));

        if ($post == null) {
            return null;
        }

        return $post;
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        $this->authorize('update', $post);
        $post->description = $request->input('description');
        $post->private = $request->input('private');

        return $post;
    }
}
