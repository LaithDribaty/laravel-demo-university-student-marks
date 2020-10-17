@extends('layouts.app')

@section('css')
   
    .green-border-focus .form-control:focus {
        border: 1px solid #8bc34a;
        box-shadow: 0 0 0 0.2rem rgba(139, 195, 74, .25);
    }
@endsection

@section('content')

    @include('inc.messages')
    <table style="margin : auto;">
        <tr>
            <td>
                <a href="" class="btn btn-primary" onclick="change()" id="2"> submit </a>
            </td>   
            <td>
                <span class="form-group green-border-focus">
                    <input type="text" placeholder="first id" class="form-control" id="1">
                </span>
            </td>
        </tr>
    </table>
@endsection

@section('java')
    function change(){
        var id = document.getElementById('1').value;
        document.getElementById('2').href = "/MARKS5/public/findme/" + id;
    }
@endsection