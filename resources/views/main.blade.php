@extends('layouts.app')


@section('content')
    <center>
        <div> 
            Sort by counting failed one as 60
            <input type="radio" name="sort" value="1" onclick="sort()" checked> 
            
            <br>
            
            Sort regardless failed subjects
            <input type="radio" name="sort" value="2" onclick="sort()"> 
            
            <br>
            
            Sort by seperating students
            <input type="radio" name="sort" value="3" onclick="sort()"> 
        </div>
    </center>
    <!--  add here the buttons to press  -->
    <table class="table table-striped">
        <thead class="">
            <tr>
                <th scope="col">#</th>
                <th scope="col"> id </th>
                <th scope="col"> Name </th>
                <th scope="col"> Average </th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 0; ?>
            @foreach($table as $nx)            
                <tr id="{{$i + 1}}">
                    <th scope="row">{{$i + 1}}</th> 
                    <td id = "ids{{ $i }}">  </td>
                    <td id = "name{{ $i }}">  </td>
                    <td id = "avg{{ $i++ }}">  </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('java')
    var obj = JSON.parse('<?php echo json_encode($table) ?>');
    var arr = [] , arrWithFailed = [];
    for(var i = 0;i < 320; ++i) {
        var sum = 0 , sumWithFailed = 0 , num = 0 , numWithFailed = 0 , failed = 0;
        for(colName in obj[i])
        if(colName != "name" && colName != "id" && obj[i][colName] != null) { // add this if you want (obj[i][colName] >= 60)
            sum += obj[i][colName];
            sumWithFailed += obj[i][colName];
            num++; numWithFailed++;
        } else if(obj[i][colName] == null || ((colName!="name" && colName!="id") && obj[i][colName] < 60)) {
            failed++;
            sumWithFailed += 60;
            numWithFailed++;
        } 

        if(num != 0) {
            arrWithFailed.push({ name : obj[i]["name"] , avg : sumWithFailed / numWithFailed , fails : failed , id:obj[i]["id"]});
            arr.push({ name : obj[i]["name"] , avg : sum / num , fails : failed , id:obj[i]["id"]});
        } else {
            arrWithFailed.push({ name : obj[i]["name"] , avg : sumWithFailed / numWithFailed , fails : failed , id:obj[i]["id"]});
            arr.push({ name : obj[i]["name"] , avg : 0 , fails : failed , id:obj[i]["id"]});
        }
    }
    
    function sort() {
        
        var is = document.getElementsByName('sort');
        var val;
        for(i = 0; i < is.length; i++) {
            if(is[i].checked) {
                val = is[i].value;
                break;
            }
        }

        if(val == 3) {
            arr.sort(function(a , b){
                if(b.fails > a.fails) return -1;
                if(b.fails < a.fails) return 1;
                return b.avg - a.avg;
            });
            var cur = 0;
            for(var i = 0;i < 320; ++i) {
                if(cur < arr[i]["fails"]){
                    cur = arr[i]["fails"];
                    document.getElementById(i+1).style.borderTop = "3px solid black";
                }
                document.getElementById('name'+i).textContent = arr[i]["name"];
                document.getElementById('avg'+i).textContent =  parseFloat(arr[i]["avg"]).toFixed(2);
                document.getElementById('ids'+i).textContent = arr[i]["id"];
            }
        } else if(val == 1) {
            arrWithFailed.sort(function(a , b){
                return b.avg - a.avg;
            });

            for(var i = 0;i < 320; ++i) {
                document.getElementById(i+1).style.borderTop = "solid 1px white";
                document.getElementById('name'+i).textContent = arrWithFailed[i]["name"]; 
                document.getElementById('avg'+i).textContent = parseFloat(arrWithFailed[i]["avg"]).toFixed(2);
                document.getElementById('ids'+i).textContent = arrWithFailed[i]["id"];
            } 
        } else {
            arr.sort(function(a , b) {
                return b.avg - a.avg;
            });

            for(var i = 0;i < 320; ++i) {
                document.getElementById(i+1).style.borderTop = "solid 1px white";
                document.getElementById('name'+i).textContent = arr[i]["name"];
                document.getElementById('avg'+i).textContent = parseFloat(arr[i]["avg"]).toFixed(2);
                document.getElementById('ids'+i).textContent = arr[i]["id"];
            }
        }
    }

    sort();

@endsection