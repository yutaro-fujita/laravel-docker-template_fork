<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todo = new Todo();
        $todos = $todo->all();
        return view('todo.index', ['todos' => $todos]);
    }
    public function create()
    {
        return view('todo.create');
    }
    public function store(Request $request)
    {
        $content = $request->input('content');
        $todo = new Todo(); //modelのインスタンス化
        $todo->content = $content; //Todoインスタンスのカラム名(DBに存在するカラム名)のプロパティに値を保存
        dd($todo); //オブジェクトの状態をDBに保存(INSERT文)
        $todo->save(); //オブジェクトの状態をDBに保存(INSERT文)
        return redirect()->route('todo.index');
    }
}
