<?php

namespace App\Http\Controllers;

use App\Helpers\API_Article;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->apiArticle = new API_Article;
    }
   
    public function index()
    {
        return view('posts.index');
    }

    public function edit($id)
    {
        $data = $this->apiArticle->articleById($id);
        if(!empty($data)){
            return response()->json([
                'code'       => 200,
                'message'    => 'Data ditemukan',
                'article'    => $data->response
            ], 200);
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->rules(), $this->message());

        if ($validated == NULL) {
            return response()->json([
                'code'      => 412,
                'message'   => 'Inputan tidak sesuai',
                'response'  => $validated
            ], 412);
        }

        $this->apiArticle->articlePost($request->title, $request->content, $request->category, $request->status);

        return response()->json([
            'code'      => 200,
            'message'   => 'Berhasil',
            'response'  => 'Data article berhasil disimpan'
        ], 200);
    }

    public function update($id, Request $request)
    {
        $validated = $request->validate($this->rules(), $this->message());

        if ($validated == NULL) {
            return response()->json([
                'code'      => 412,
                'message'   => 'Inputan tidak sesuai',
                'response'  => $validated
            ], 412);
        }

        $this->apiArticle->articleUpdate($id, $request->title, $request->content, $request->category, $request->status);

        return response()->json([
            'code'      => 200,
            'message'   => 'Berhasil',
            'response'  => 'Data article berhasil diubah'
        ], 200);
    }

    public function destroy($id)
    {
        $article    = $this->apiArticle->articleById($id);
        $response   = $article->response;

        $this->apiArticle->articleUpdate($id, $response->title, $response->content, $response->category, 'Thrash');

        return response()->json([
            'code'      => 200,
            'message'   => 'Berhasil',
            'response'  => 'Data article berhasil dihapus'
        ], 200);
    }

    public function rules()
    {
        $rules = [
            'title'     => 'required|min:20',
            'content'   => 'required|min:200',
            'category'  => 'required|min:3'
        ];
        return $rules;
    }

    public function message()
    {
        $message = [
            'title.required'    => 'Title tidak boleh kosong',
            'title.min'         => 'Title minimal 20 karakter',
            'content.required'  => 'Content tidak boleh kosong',
            'content.min'       => 'Content minimal 200 karakter',
            'category.required' => 'Category tidak boleh kosong',
            'category.min'      => 'Category minimal 3 karakter'
        ];
        return $message;
    }
}
