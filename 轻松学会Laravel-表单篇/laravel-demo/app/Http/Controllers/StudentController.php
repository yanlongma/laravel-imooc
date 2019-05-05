<?php

namespace App\Http\Controllers;


use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    // 学生列表页
    public function index()
    {

        $students = Student::paginate(5);

        return view('student.index', [
            'students' => $students,
        ]);
    }

    // 添加页面
    public function create(Request $request)
    {
        $student = new Student();

        if ($request->isMethod('POST')) {

            // 1. 控制器验证
            /*
            $this->validate($request, [
                'Student.name' => 'required|min:2|max:20',
                'Student.age' => 'required|integer',
                'Student.sex' => 'required|integer',
            ], [
                'required' => ':attribute 为必填项',
                'min' => ':attribute 长度不符合要求',
                'integer' => ':attribute 必须为整数',
            ], [
                'Student.name' => '姓名',
                'Student.age' => '年龄',
                'Student.sex' => '性别',
            ]);
            */

            // 2. Validator类验证
            $validator = \Validator::make($request->input(), [
                'Student.name' => 'required|min:2|max:20',
                'Student.age' => 'required|integer',
                'Student.sex' => 'required|integer',
            ], [
                'required' => ':attribute 为必填项',
                'min' => ':attribute 长度不符合要求',
                'integer' => ':attribute 必须为整数',
            ], [
                'Student.name' => '姓名',
                'Student.age' => '年龄',
                'Student.sex' => '性别',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }


            $data = $request->input('Student');

            if (Student::create($data) ) {
                return redirect('student/index')->with('success', '添加成功!');
            } else {
                return redirect()->back();
            }
        }

        return view('student.create', [
            'student' => $student
        ]);
    }

    // 保存添加
    public function save(Request $request)
    {
        $data = $request->input('Student');

        $student = new Student();
        $student->name = $data['name'];
        $student->age = $data['age'];
        $student->sex = $data['sex'];

        if ($student->save()) {
            return redirect('student/index');
        } else {
            return redirect()->back();
        }

    }



    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        if ($request->isMethod('POST')) {

            $this->validate($request, [
                'Student.name' => 'required|min:2|max:20',
                'Student.age' => 'required|integer',
                'Student.sex' => 'required|integer',
            ], [
                'required' => ':attribute 为必填项',
                'min' => ':attribute 长度不符合要求',
                'integer' => ':attribute 必须为整数',
            ], [
                'Student.name' => '姓名',
                'Student.age' => '年龄',
                'Student.sex' => '性别',
            ]);

            $data = $request->input('Student');
            $student->name = $data['name'];
            $student->age = $data['age'];
            $student->sex = $data['sex'];

            if ($student->save()) {
                return redirect('student/index')->with('success', '修改成功-' . $id);
            }
        }


        return view('student.update', [
            'student' => $student
        ]);
    }



    public function detail($id)
    {
        $student = Student::find($id);

        return view('student.detail', [
            'student' => $student
        ]);
    }


    public function delete($id)
    {

        $student = Student::find($id);

        if ($student->delete()) {
            return redirect('student/index')->with('success', '删除成功-' . $id);
        } else {
            return redirect('student/index')->with('error', '删除失败-' . $id);
        }
    }


}