@extends('layouts.app')

@section('content')
    <form action="./subjects/specified" method="GET">
        <table class="table">
            <tbody>
                
                <?php $i = 0;$semester = 1;?>
                @foreach($subjects as $nx)
                    
                    @if($i==0 || $i==7 || $i==13 || $i==19 || $i==25 || $i==31)
                        <tr>
                            <th class="btn btn-primary" scope="row" onclick="toggleAll( {{$i}} )">select all semester {{ $semester++ }}</th>
                        </tr>
                    @endif
                    <tr>
                        <th scope="row">{{ $nx->subject }}</th>
                        <td><input type="checkbox" name="{{ $nx->subject }}" id="{{$i}}"></td>
                    </tr>
                    <?php $i++ ?>
                @endforeach

                <tr>
                    <input type="submit" class="btn btn-primary">
                </tr>
            </tbody>
        </table>
    </form>
@endsection

@section('java')
    function toggleAll( i ) {
    
        for(var j = 0 ; j<6 ; j++ ) {
            var cur = document.getElementById(i+j);
            cur.checked = 1 - cur.checked;
        }

        if(i==0) {
            var cur = document.getElementById(i+6);
            cur.checked = 1 - cur.checked;   
        }
    }
@endsection