@extends('layouts')


@section('header')
    @parent
    header
@stop


@section('sidebar')
    sidebar
@stop

@section('content')
    content

    {{--<!-- 1. 模板中输出PHP变量 -->--}}
    {{--<p>{{ $name }}</p>--}}

    {{--<!-- 2. 模板中调用PHP代码 -->--}}
    {{--<p>{{ time() }}</p>--}}
    {{--<p>{{ date('Y-m-d H:i:s', time()) }}</p>--}}

    {{--<p>{{ in_array($name, $arr) ? 'true': 'false' }}</p>--}}
    {{--<p>{{ var_dump($arr) }}</p>--}}

    {{--<p>{{ isset($name) ? $name : 'default' }}</p>--}}
    {{--<p>{{ $name1 or 'default' }}</p>--}}

    {{--<!-- 3. 原样输出 -->--}}
    {{--<p>@{{ $name }}</p>--}}

     {{--4. 模板中的注释 --}}


     {{--5. 引入子视图 include --}}
    {{--@include('student.common1', ['message' => '我是错误信息'])--}}


    <br>
    @if ($name == 'sean')
        I'm sean
    @elseif($name == 'imooc')
        I'm imooc
    @else
        Who am I?
    @endif

    <br>
    @if (in_array($name, $arr))
        true
    @else
        false
    @endif

    <br>
    @unless($name != 'sean')
        I'm sean
    @endunless

    <br>
    {{--@for ($i=0; $i < 10; $i++)--}}
        {{--<p>{{ $i }}</p>--}}
    {{--@endfor--}}

    <br>
    {{--@foreach($students as $student)--}}
        {{--<p>{{ $student->name }}</p>--}}
    {{--@endforeach--}}


    {{--@forelse($students as $student)--}}
        {{--<p>{{ $student->name }}</p>--}}
    {{--@empty--}}
        {{--<p>null</p>--}}
    {{--@endforelse--}}




    <a href="{{ url('url') }}">url()</a>
    <br>
    <a href="{{ action('StudentController@urlTest') }}">action()</a>
    <br>
    <a href="{{ route('url') }}">route()</a>










@stop