<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Requests\HelloRequest;
//use Validator;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    //public function index(Request $request) {
        //return view('hello.index', ['data'=>$request->data]);
        //return view('hello.index');
    //    return view('hello.index', ['msg'=>'フォームを入力']);
    //}

    /*
    public function index(Request $request) {
        $validator = Validator::make($request->query(), [
            'id' => 'required',
            'pass' => 'required',
        ]);
        if ($validator->fails()) {
            $msg = 'クエリーに問題があります。';
        } else {
            $msg = 'ID/PASSを受け付けました。フォームを入力下さい。';
        }
        return view('hello.index', ['msg'=>$msg]);
    }*/

    //public function post(HelloRequest $request) {
    //    return view('hello.index', ['msg'=>'正しく入力されました！']);
    //}
    /*
    public function post(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric|between:0,150',
        ]);
        if ($validator->fails()) {
            return redirect('/hello')->withErrors($validator)->withInput();
        }
        return view('hello.index', ['msg'=>'正しく入力されました！']);
    }*/

    /*
    public function post(Request $request) {
        $rules = [
            'name' => 'required',
            'mail' => 'email',
            //'age' => 'numeric|between:0,150',
            'age' => 'numeric',
        ];
        $messages = [
            'name.required' => '名前は必ず入力して下さい。',
            'mail.email' => 'メールアドレスが必要です。',
            'age.numeric' => '年齢を整数で記入下さい。',
            //'age.between' => '年齢は0〜150の間で入力下さい。',
            'age.min' => '年齢はゼロ歳以上で記入下さい。',
            'age.max' => '年齢は200歳以下で記入下さい。',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        
        $validator->sometimes('age', 'min:0', function($input){
            return !is_int($input->age);
        });
        $validator->sometimes('age', 'max:200', function($input){
            return !is_int($input->age);
        });
        
        if ($validator->fails()) {
            return redirect('/hello')->withErrors($validator)->withInput();
        }
        return view('hello.index', ['msg'=>'正しく入力されました！']);
    }*/
    
    /*
    public function index(Request $request) {
        return view('hello.index', ['msg'=>'フォームを入力下さい。']);
    }    
    public function post(HelloRequest $request) {
        return view('hello.index', ['msg'=>'正しく入力されました！']);
    }*/    

    /*
    public function index(Request $request) {
        if ($request->hasCookie('msg')) {
            $msg = 'Cookie: ' . $request->cookie('msg');
        } else {
            $msg = '※クッキーはありません。';
        }
        return view('hello.index', ['msg'=>$msg]);
    }
    
    public function post(Request $request) {
        $validate_rule = [
            'msg' => 'required',
        ];
        $this->validate($request, $validate_rule);
        $msg = $request->msg;
        $response = response()->view('hello.index', ['msg' => '「' . $msg . '」をクッキーに保存しました。']);
        $response->cookie('msg', $msg, 100);
        return $response;
    }*/

    //public function index(Request $request) {
    public function index() {
        //if (isset($request->id)) {
            //$param = ['id' => $request->id];
            //$items = DB::select('select * from people where id = :id', $param);
        //} else {
            //$items = DB::select('select * from people');
        //}
        $items = DB::table('people')->get();
        return view('hello.index', ['items' => $items]);
    }
    
    //public function post(Request $request) {
    public function post() {
        $items = DB::select('select * from people');
        return view('hello.index', ['items' => $items]);
    }
    
    public function add(Request $request) {
        return view('hello.add');
    }
    
    public function create(Request $request) {
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        //DB::insert('insert into people (name, mail, age) values (:name, :mail, :age)', $param);
        DB::table('people')->insert($param);
        return redirect('/hello');
    }
    
    public function edit(Request $request) {
        $item = DB::table('people')->where('id', $request->id)->first();
        //dd($item);
        return view('hello.edit', ['form' => $item]);
        //$param = ['id' => $request->id];
        //$item = DB::select('select * from people where id = :id', $param);
        //return view('hello.edit', ['form' => $item[0]]);
    }
    
    public function update(Request $request) {
        $param = [
            //'id' => $request->id,
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::table('people')->where('id', $request->id)->update($param);
        //DB::update('update people set name = :name, mail = :mail, age = :age where id = :id', $param);
        return redirect('/hello');
    }
    
    public function del(Request $request) {
        $item = DB::table('people')->where('id', $request->id)->first();
        return view('hello.del', ['form' => $item]);
        //$param = ['id' => $request->id];
        //$item = DB::select('select * from people where id = :id', $param);
        //return view('hello.del', ['form' => $item[0]]);
    }
    
    public function remove(Request $request) {
        DB::table('people')->where('id', $request->id)->delete();
        //$param = ['id' => $request->id,];
        //DB::delete('delete from people where id = :id', $param);
        return redirect('/hello');
    }
    
    public function show(Request $request) {
        $page = $request->page;
        $items = DB::table('people')->offset($page * 1)->limit(1)->get();
        /*
        $min = $request->min;
        $max = $request->max;
        $items = DB::table('people')
            ->whereRaw('age >= ? and age <= ?', [$min, $max])
            ->get();
        */
        /*
        $name = $request->name;
        $items = DB::table('people')
            ->where('name', 'like', '%' . $name . '%')
            ->orWhere('mail', 'like', '%' . $name . '%')
            ->get();
        */
        //$id = $request->id;
        //$items = DB::table('people')->where('id', '<=', $id)->get();
        return view('hello.show', ['items' => $items]);
    }
}
