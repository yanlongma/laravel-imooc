<?php

namespace App\Http\Controllers;


use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{

    public function test1()
    {


        //新增
//        $bool = DB::insert('insert into student(name, age) values(?, ?)',
//            ['imooc', 19]);
//        var_dump($bool);

        // 更新
//        $num = DB::update('update student set age = ? where name = ?',
//            [20, 'sean']);
//        var_dump($num);

        // 查询
//        $students = DB::select('select * from student where id > ?',
//            [1001]);
//        dd($students);

        // 删除
        $num = DB::delete('delete from student where id > ?', [1001]);
        var_dump($num);

    }

    // 使用查询构造器添加数据
    public function query1()
    {
//        $bool = DB::table('student')->insert(
//            ['name' => 'imooc', 'age' => 18]
//        );
//        var_dump($bool);

//        $id = DB::table('student')->insertGetId(
//            ['name' => 'sean', 'age' => 18]
//        );
//        var_dump($id);


        $bool = DB::table('student')->insert([
            ['name' => 'name1', 'age' => 20],
            ['name' => 'name2', 'age' => 21],
        ]);
        var_dump($bool);
    }

    // 使用查询构造器更新数据
    public function query2()
    {

//        $num = DB::table('student')
//            ->where('id', 12)
//            ->update(['age' => 30]);
//        var_dump($num);


        //$num = DB::table('student')->increment('age');
        //$num = DB::table('student')->increment('age', 3);

        //$num = DB::table('student')->decrement('age');
        //$num = DB::table('student')->decrement('age', 3);

//        $num = DB::table('student')
//            ->where('id', 12)
//            ->decrement('age', 3);

        $num = DB::table('student')
            ->where('id', 12)
            ->decrement('age', 3, ['name' => 'iimooc']);
        var_dump($num);

    }

    // 使用查询构造器删除数据
    public function query3()
    {
//        $num = DB::table('student')
//            ->where('id', 15)
//            ->delete();

//        $num = DB::table('student')
//            ->where('id', '>=', 13)
//            ->delete();

//        var_dump($num);


        DB::table('student')->truncate();

    }


    public function query4()
    {

//        $bool = DB::table('student')->insert([
//            ['id' => 1001, 'name' => 'name1', 'age' => 18],
//            ['id' => 1002, 'name' => 'name2', 'age' => 18],
//            ['id' => 1003, 'name' => 'name3', 'age' => 19],
//            ['id' => 1004, 'name' => 'name4', 'age' => 20],
//            ['id' => 1005, 'name' => 'name5', 'age' => 21],
//        ]);
//        var_dump($bool);

        // get()

//        $studnets = DB::table('student')->get();

        // first
//        $student = DB::table('student')
//            ->orderBy('id', 'desc')
//            ->first();
//        dd($student);

        // where
//        $students = DB::table('student')
//            ->where('id', '>=', 1002)
//            ->get();

//        $students = DB::table('student')
//            ->whereRaw('id >= ? and age > ?', [1001, 18])
//            ->get();


        // pluck
//        $names = DB::table('student')
//            ->pluck('name');


        //lists
//        $names = DB::table('student')
//            ->lists('name', 'id');


        // select
//        $students = DB::table('student')
//            ->select('id', 'name', 'age')
//            ->get();


        // chunk

//        echo '<pre>';
//        DB::table('student')->chunk(2, function($students) {
//
//            var_dump($students);
//
//
//            if (你的条件) {
//                return false;
//            }
//        });



        //dd($students);

    }

    // 聚合函数
    public function query5()
    {
//        $num = DB::table('student')->count();

//        $max = DB::table('student')->max('age');

        //$min = DB::table('student')->min('age');

//        $avg = DB::table('student')->avg('age');

        $sum = DB::table('student')->sum('age');
        var_dump($sum);
    }


    public function orm1()
    {
        // all()
//        $students = Student::all();

        // find()
//        $student = Student::find(1001);

        // findOrFail()
//        $student = Student::findOrFail(1006);

        //var_dump($student);


//        $students = Student::get();
//        $student = Student::where('id', '>', '1001')
//            ->orderBy('age', 'desc')
//            ->first();
//        dd($student);

//        echo '<pre>';
//        Student::chunk(2, function($students) {
//            var_dump($students);
//        });

        // 聚合函数
        //$num = Student::count();
        $max = Student::where('id', '>', 1001)->max('age');
        var_dump($max);


    }

    public function orm2()
    {
        // 使用模型新增数据
//        $student = new Student();
//        $student->name = 'sean2';
//        $student->age = 20;
//        $bool = $student->save();
//        dd($bool);

//        $student = Student::find(1017);
//        echo date('Y-m-d H:i:s', $student->created_at);

        // 使用模型的Create方法新增数据

//        $student = Student::create(
//            ['name' => 'imooc', 'age' => 18]
//        );
//        dd($student);

        // firstOrCreate()
//        $student = Student::firstOrCreate(
//            ['name' => 'imoocs']
//        );

        // firstOrNew()
        $student = Student::firstOrNew(
            ['name' => 'imoocsss']
        );
        $bool = $student->save();
        dd($bool);

    }

    public function orm3()
    {
        // 通过模型更新数据
//        $student = Student::find(1021);
//        $student->name = 'kitty';
//        $bool = $student->save();
//        var_dump($bool);

        $num = Student::where('id', '>', 1019)->update(
            ['age' => 41]
        );
        var_dump($num);
    }

    public function orm4()
    {

        // 通过模型删除
//        $student = Student::find(1021);
//        $bool = $student->delete();
//        var_dump($bool);

        // 通过主键删除
        //$num = Student::destroy(1020);
        //$num = Student::destroy(1018, 1019);
//        $num = Student::destroy([1016, 1017]);
//        var_dump($num);

        $num = Student::where('id', '>', 1004)->delete();
        var_dump($num);


    }

    public function section1()
    {

        //$students = Student::get();
        $students = [];

        $name = 'sean';
        $arr = ['sean', 'imooc'];

        return view('student.section1', [
            'name' => $name,
            'arr' => $arr,
            'students' => $students,
        ]);
    }

    public function urlTest()
    {
        return 'urlTest';
    }

    public function request1(Request $request)
    {
        // 1. 取值
        //echo $request->input('name');
        //echo $request->input('sex', '未知');

//        if ($request->has('name')) {
//            echo $request->input('name');
//        } else {
//            echo '无该参数';
//        }

//        $res = $request->all();
//        dd($res);

        // 2. 判断请求类型
//        echo $request->method();

//        if ($request->isMethod('POST')) {
//            echo 'Yes';
//        } else {
//            echo 'No';
//        }

//        $res = $request->ajax();
//        var_dump($res);

//        $res = $request->is('student/*');
//        var_dump($res);

        echo $request->url();

    }


    public function session1(Request $request)
    {
        // 1. HTTP request session();
//        $request->session()->put('key1', 'value1');
//        echo $request->session()->get('key1');

        // 2. session()
//        session()->put('key2', 'value2');
//        echo session()->get('key2');

        // 3. Session
        // 存储数据到Session
//        Session::put('key3', 'value3');

        // 获取Session的值
//        echo Session::get('key3');
        // 不存在则取默认值
//        echo Session::get('key4', 'default');

        // 已数组的形式存储数据
//        Session::put(['key4' => 'value4']);

        // 把数据放到Sesion的数组中
//        Session::push('student', 'sean');
//        Session::push('student', 'imooc');
//        $res = Session::get('student', 'default');
//        var_dump($res);

        // 取出数据并删除
//        $res = Session::pull('student', 'default');
//        var_dump($res);

        // 取出所有的值
//        $res = Session::all();
//        dd($res);


        // 判断session中某个key是否存在
//        if (Session::has('key11')) {
//            $res = Session::all();
//            dd($res);
//        } else {
//            echo '你们老大不在';
//        }

        // 暂存数据
        Session::flash('key-flash', 'val-flash');


    }

    public function session2(Request $request)
    {

        return Session::get('message', '暂无信息');

//        return 'session2';
        //echo Session::get('key-flash');

        // 获取session所有的数据
//        $res = Session::all();
//        dd($res);

        // 删除session中指定的key的值
//        Session::forget('key3');

        // 清空所有sesion信息
//        Session::flush();

//        $res = Session::all();
//        dd($res);



    }


    public function response()
    {

        // 3. 响应json
//        $data = [
//            'errCode' => 0,
//            'errMsg' => 'success',
//            'data' => 'sean',
//        ];
//
//        return response()->json($data);


        // 4. 重定向
//         return redirect('session2');

//        return redirect('session2')->with('message', '我是快闪数据');

        //action()

//        return redirect()->action('StudentController@session2')
//            ->with('message', '我是快闪数据');

        // route()
//        return redirect()->route('session2')
//            ->with('message', '我是快闪数据');

        return redirect()->back();

    }

    // 活动的宣传页面
    public function activity0()
    {

        return '活动快要开始啦，敬请期待';
    }

    // 活动的宣传页面
    public function activity1()
    {

        return '活动进行中，谢谢您的参与1';
    }

    // 活动的宣传页面
    public function activity2()
    {

        return '互动进行中，谢谢您的参与2';
    }



}