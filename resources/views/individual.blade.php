@extends('layouts.app')

@section('header')
    <!-- jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- FusionCharts -->
    <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
    <!-- jQuery-FusionCharts -->
    <script type="text/javascript" src="https://rawgit.com/fusioncharts/fusioncharts-jquery-plugin/develop/dist/fusioncharts.jqueryplugin.min.js"></script>
    <!-- Fusion Theme -->
    <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@endsection

@section('content')

    <table class="table">
        <tbody>                
            <tr>
                <td>
                    Name :
                </td>
                <!-- here is first column -->
                <td style="text-align:center">
                    {{ $row->name }}
                </td>

            </tr>
            
            <tr>
                <td>
                    average
                </td>

                <!-- here is first column -->
                <td id="avg1" style="text-align:center;color:green;">

                </td>
            </tr>

            <tr>
                <td>
                    highest mark
                </td>

                <!-- here is first column -->
                <td id="hight1" style="text-align:center;color:green;">

                </td>
            </tr>

            <tr>
                <td>
                    lowest mark
                </td>

                <!-- here is first column -->
                <td id="lowest1" style="text-align:center;color:green;">

                </td>
            </tr>

            <tr>
                <td>
                    Math avg
                </td>

                <!-- here is first column -->
                <td id="math1" style="text-align:center;color:green;">

                </td>
            </tr>

            <tr>
                <td>
                    Programming avg
                </td>

                <!-- here is first column -->
                <td id="prog1" style="text-align:center;color:green;">

                </td>
            </tr>

            <tr>
                <td>
                    Software avg
                </td>

                <!-- here is first column -->
                <td id="Software1" style="text-align:center;color:green;">

                </td>
            </tr>

            <tr>
                <td>
                    Networks avg
                </td>

                <!-- here is first column -->
                <td id="Network1" style="text-align:center;color:green;">

                </td>
            </tr>

            <tr>
                <td>
                    AI avg
                </td>

                <!-- here is first column -->
                <td id="AI1" style="text-align:center;color:green;">

                </td>

            </tr>

            <tr>
                <td>
                    number of subjects above <input type="text" id="text" style="width:30px;" onkeyup="changeContentOfNumOfMarks(row , row , 'subjNum1' , 'subjNum1')">
                </td>

                <!-- here is first column -->
                <td id="subjNum1" style="text-align:center;color:green;">

                </td>

            </tr>

            <tr>
                <td>
                    <label for="subjects">Select subject</label>
                    <select name="subjects" id="speed" onchange="changeSubject(event , row , row , 'subj1' , 'subj1')">
                        @foreach($subjects as $nx)
                            <option>{{ $nx->subject }}</option>
                        @endforeach
                    </select>
                </td>

                <!-- here is first column -->
                <td id="subj1" style="text-align:center;color:green;">

                </td>

            </tr>

        </tbody>
    </table>

    <div id="chart-container1" style="height:500px;"></div>

    <p>
        <label for="amount">marks until :</label>
        <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;" onchange="drawChart()">
    </p>
    <div id="slider-range-max"></div>
    <br><br><br><br><br>

@endsection

@section('java')

    $( function() {
    $( "#slider-range-max" ).slider({
        range: "max",
        min: 1,
        max: 8,
        value: 8,
        slide: function( event, ui ) {
        $( "#amount" ).val( ui.value );
        }
    });

    $( "#amount" ).val( $( "#slider-range-max" ).slider( "value" ) );
    } );

    var row = JSON.parse('<?php echo json_encode($row) ?>');
    var rowDates = JSON.parse('<?php echo json_encode($rowDates) ?>');

    // getting the avg for both
    changeColorAndContent(getAvg(row) , getAvg(row) , 'avg1' , 'avg1');

    // getting the maximum marks for both 
    changeColorAndContent(getMax(row) , getMax(row) , 'hight1' , 'hight1');
    
    // getting the minimum marks for both 
    changeColorAndContent(getMin(row) , getMin(row) , 'lowest1' , 'lowest1');

    // getting math Avg
    changeColorAndContent(getMath(row) , getMath(row) , 'math1' , 'math1');

    // getting Programming avg
    changeColorAndContent(getProg(row) , getProg(row) , 'prog1' , 'prog1');

    // getting Software avg
    changeColorAndContent(getSoftware(row) , getSoftware(row) , 'Software1' , 'Software1');

    // getting Network avg
    changeColorAndContent(getNetwork(row) , getNetwork(row) , 'Network1' , 'Network1');

    // getting AI avg
    changeColorAndContent(getAI(row) , getAI(row) , 'AI1' , 'AI1');


    // includeing function that is used above
    @include('inc.javascriptFunctions')
    
    var arr = [] , names = [] , arrDates = [];
    for(i in row)
    if( i!="id" && i!="name"){
        if(row[i] != null) {
            arr.push( row[i] );
            names.push( i );
        } else {
            arr.push( 0 );
            names.push( i );
        }
    }

    for(i in rowDates)
    if( i!="id" && i!="name"){
        if(rowDates[i] != null) {
            arrDates.push( rowDates[i] );
        } else {
            arrDates.push( 8 );
        }
    }
    
    function checkValues( i , j ) {
        var cur_date = parseInt(document.getElementById('amount').value);
        if(i==1) {
            if(arrDates[j-1] <= cur_date)
                return true;
            else
                return false;
        } else {
            if(arrDates[(i-1)*6+j] <= cur_date)
                return true;
            else
                return false;
        }
    }

    function displayValue1( i , j ) {
        if(i==1)
            return arr[j-1];
        else
            return arr[(i-1)*6 + j];
    }
    
    function displayValue2( i , j ) {
        if(j==7 && i!=1) {
            return 0;
        } else if(checkValues(i , j)) {
            if(i==1)
                return names[j-1] + " " + arr[j-1];
            else
                return names[(i-1)*6+j] + " " + arr[(i-1)*6+j];
        } else {
            if(i==1)
                return names[j-1] + " " + 0;
            else
                return names[(i-1)*6+j] + " " + 0;
        }
    }

    function colorPick( i , j ) {
        if(j==7 && i!=1) {
            return "failed";
        } else if(checkValues(i , j)) {
            var value = displayValue1( i , j );
            if(value < 60)
                return "failed";
            else if(value < 75)
                return "accepted";
            else if(value < 85)
                return "good";
            else if(value < 95)
                return "very good";
            else
                return "excelent";
        } else {
            return "failed";
        }

    }

    function changeFromNumToText(){
        var val = parseInt(document.getElementById('amount').value);
        var ele = document.getElementById('amount');
        if(val == 1) {
            ele.value = "2018-2017 semester-1";
        } else if(val == 2) {
            ele.value = "2018-2017 semester-2";
        } else if(val == 3) {
            ele.value = "2019-2018 semester-1";
        } else if(val == 4) {
            ele.value = "2019-2018 semester-2";
        } else if(val == 5) {
            ele.value = "2019-2018 semester-3 complement";
        } else if(val == 6) {
            ele.value = "2020-2019 semester-1";
        } else {
            ele.value = "2020-2019 semester-2";
        }
    }

    @include('inc.heatMapChart')
    
    $( "#slider-range-max" ).mouseup(function() {
        drawChart();
        changeFromNumToText();
    });

    $( document ).ready(function() {
        drawChart();
        changeFromNumToText();
    });

@endsection
