<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

use App\Http\Requests\UserFormRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::all();
        $posts = Post::paginate(10); //generara una paginacion automatica
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */


    /*
     *
     * Cambiamos el request por el UserFormRequest
     * ya que hay tenemos las reglas de validacion y mensajes del formulario
     * */
    public function store(UserFormRequest $request)
    {


        /*$reglas = [
            'title' => 'required|min:5|max:10',
            'content' => 'required|min:5|max:50'
        ];
        $validacion = \Validator::make($request->all(), $reglas);

        if($validacion->fails()){

            //dd($validacion);
            return redirect()->route('posts.create')
                ->withErrors($validacion)
                ->withInput();
        }*/

        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->user_id = 1;

        $post->save();

        return $post->id;

        //dd($request->all());

        /*return response()->json(['test' => 'true']);

        return $request->input('name', 'valor por default');
  */
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $post = Post::find($id);

        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();  //eliminamos el pos

        return redirect()->route('posts.index');
    }
}
