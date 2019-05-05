<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Mail;

class StudentController extends Controller
{

    //
    public function mail()
    {
        /*
        Mail::raw('邮件内容 测试', function($message) {

            $message->from('json_vip@163.com', '慕课网');
            $message->subject('邮件主题 测试');
            $message->to('752766395@qq.com');
        });
        */

        Mail::send('student.mail', [
            'name' => 'sean',
            'age' => 18,
            //'student' => $stundent
        ], function($message) {
            $message->to('752766395@qq.com');
        });

    }


    public function upload(Request $request)
    {
        if ($request->isMethod('POST')) {

            //var_dump($_FILES);
            $file = $request->file('source');

            // 文件是否上传成功
            if ($file->isValid()) {

                // 原文件名
                $originalName = $file->getClientOriginalName();
                // 扩展名
                $ext = $file->getClientOriginalExtension();
                // MimeType
                $type = $file->getClientMimeType();
                // 临时绝对路径
                $realPath = $file->getRealPath();

                $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;

                $bool = Storage::disk('uploads')->put($filename, file_get_contents($realPath));

                var_dump($bool);
            }

            exit;
        }

        return view('student.upload');
    }


    public function error()
    {

        // $student = DB::table('studnet') 1001
//        $student = null;
//
//        if ($student == null) {
//            abort('500');
//        }

        //$name = 'sean';
        //var_dump($name);

//        return view('student.error');


        //Log::info('这是一个info级别的日志');
//        Log::warning('这是一个warning级别的日志');

        //Log::error('这是一个数组', ['name' => 'sean', 'age' => 18]);
    }


    public function queue()
    {
        dispatch(new SendEmail('752766395@qq.com'));
    }

    public function cache1()
    {
        // put()
        // Cache::put('key1', 'val1', 10);

        // add()
        //$bool = Cache::add('key2', 'val2', 10);
        //var_dump($bool);

        // forever()
        // Cache::forever('key3', 'val3');

        // has()
//        if (Cache::has('key1')) {
//            $val = Cache::get('key1');
//            var_dump($val);
//        } else {
//            echo 'No';
//        }
    }

    public function cache2()
    {
        // get()
        //$val = Cache::get('key3');

        // pull()
        //$val = Cache::pull('key3');
        //var_dump($val);

        // forget()
        $bool = Cache::forget('key1');
        var_dump($bool);
    }
}
