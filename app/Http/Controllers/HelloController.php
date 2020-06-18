<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HelloRequest;
//use Validator;

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
    }    

}
