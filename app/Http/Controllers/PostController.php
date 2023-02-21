<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{

    // method ini akan dipanggil ketika route /post diakses
    public function index()
    {
        $posts = Post::latest()->get();
        // dump($posts);
        return view('posts.index', compact('posts'));
    }


    // method ini akan dipanggil ketika tombol create di klik
    public function create()
    {
        return view('posts.create');
    }


    // method ini akan dipanggil ketika form di submit
    public function store(Request $request)
    {
        // validasi data
        $this->validate($request, [
            'title' => 'required|string|max:155',
            'content' => 'required',
            'status' => 'required'
        ]);

        // simpan data ke database
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'status' => $request->status,
            'slug' => Str::slug($request->title)
        ]);
        // dump($post);

        // redirect jika sukses menyimpan data
        if ($post) {
            return redirect()
                ->route('post.index')
                ->with([
                    'success' => 'Post created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Post failed to create'
                ]);
        }
    }


    // method ini akan dipanggil ketika tombol edit di klik
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        // dump($post);
        return view('posts.edit', compact('post'));
    }


    // edit data
    public function update(Request $request, $id)
    {
        // validasi data
        $this->validate($request, [
            'title' => 'required|string|max:155',
            'content' => 'required',
            'status' => 'required'
        ]);


        // update data
        $post = Post::findOrFail($id);
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'status' => $request->status,
            'slug' => Str::slug($request->title)
        ]);

        if ($post) {
            return redirect()
                ->route('post.index')
                ->with([
                    'success' => 'Post has been updated successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
    }


    // hapus data
    public function destroy($id)
    {
        // ambil data berdasarkan id dan hapus
        $post = Post::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('post.index')
                ->with([
                    'success' => 'Post has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('post.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
