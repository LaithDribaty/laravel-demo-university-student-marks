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
@endsection

@section('css')
    
    .purple-border .form-control:focus {
        border: 1px solid #ba68c8;
        box-shadow: 0 0 0 0.2rem rgba(186, 104, 200, .25);
    }

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
                <span class="form-group purple-border">
                    <input type="text" placeholder="first id" class="form-control" id="1">
                </span>
            </td>
            <td>
                <a href="" class="btn btn-primary" id='3' onclick="change()" > submit </a>
            </td>
            <td>
                <span class="form-group green-border-focus">
                    <input type="text" placeholder="second id" class="form-control" id="2">
                </span>
            </td>
        </tr>
    </table>
    @isset($row1)
        <div class="container" style="padding-top:50px;">

        <table class="table">
            <tbody>                
                <tr>
                    <td>

                    </td>
                    <!-- here is first column -->
                    <td style="text-align:center">
                        {{ $row1->name }}
                    </td>

                    <!-- here is second column -->
                    <td style="text-align:center">
                        {{ $row2->name }}
                    </td>
                </tr>
                
                <tr>
                    <td>
                        average
                    </td>

                    <!-- here is first column -->
                    <td id="avg1" style="text-align:center;color:green;">

                    </td>

                    <!-- here is second column -->
                    <td id="avg2" style="text-align:center;color:green;">

                    </td>
                </tr>

                <tr>
                    <td>
                        highest mark
                    </td>

                    <!-- here is first column -->
                    <td id="hight1" style="text-align:center;color:green;">

                    </td>

                    <!-- here is second column -->
                    <td id="hight2" style="text-align:center;color:green;">

                    </td>
                </tr>

                <tr>
                    <td>
                        lowest mark
                    </td>

                    <!-- here is first column -->
                    <td id="lowest1" style="text-align:center;color:green;">

                    </td>

                    <!-- here is second column -->
                    <td id="lowest2" style="text-align:center;color:green;">

                    </td>
                </tr>

                <tr>
                    <td>
                        Math avg
                    </td>

                    <!-- here is first column -->
                    <td id="math1" style="text-align:center;color:green;">

                    </td>

                    <!-- here is second column -->
                    <td id="math2" style="text-align:center;color:green;">

                    </td>
                </tr>

                <tr>
                    <td>
                        Programming avg
                    </td>

                    <!-- here is first column -->
                    <td id="prog1" style="text-align:center;color:green;">

                    </td>

                    <!-- here is second column -->
                    <td id="prog2" style="text-align:center;color:green;">

                    </td>
                </tr>

                <tr>
                    <td>
                        Software avg
                    </td>

                    <!-- here is first column -->
                    <td id="Software1" style="text-align:center;color:green;">

                    </td>

                    <!-- here is second column -->
                    <td id="Software2" style="text-align:center;color:green;">

                    </td>
                </tr>

                <tr>
                    <td>
                        Networks avg
                    </td>

                    <!-- here is first column -->
                    <td id="Network1" style="text-align:center;color:green;">

                    </td>

                    <!-- here is second column -->
                    <td id="Network2" style="text-align:center;color:green;">

                    </td>
                </tr>

                <tr>
                    <td>
                        AI avg
                    </td>

                    <!-- here is first column -->
                    <td id="AI1" style="text-align:center;color:green;">

                    </td>

                    <!-- here is second column -->
                    <td id="AI2" style="text-align:center;color:green;">

                    </td>
                </tr>

                <tr>
                    <td>
                        number of subjects above <input type="text" id="text" style="width:30px;" onkeyup="changeContentOfNumOfMarks( row1 , row2 , 'subjNum1' , 'subjNum2')">
                    </td>

                    <!-- here is first column -->
                    <td id="subjNum1" style="text-align:center;color:green;">

                    </td>

                    <!-- here is second column -->
                    <td id="subjNum2" style="text-align:center;color:green;">

                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="subjects">Select subject</label>
                        <select name="subjects" id="speed" onchange="changeSubject(event , row1 , row2 , 'subj1' , 'subj2')">
                            @foreach($subjects as $nx)
                                <option>{{ $nx->subject }}</option>
                            @endforeach
                        </select>
                    </td>

                    <!-- here is first column -->
                    <td id="subj1" style="text-align:center;color:green;">

                    </td>

                    <!-- here is second column -->
                    <td id="subj2" style="text-align:center;color:green;">

                    </td>
                </tr>

            </tbody>
        </table>
        
        <div id="chart-container1" style="height:500px;"></div>
        <br>
        <div id="chart-container2" style="height:500px;"></div>
        <br>
        <div id="chart-container3" style="height:500px;"></div>

        </div>
    @endisset    
@endsection

@section('java')
    @isset($row1)
        var row1 = JSON.parse('<?php echo json_encode($row1) ?>');
        var row2 = JSON.parse('<?php echo json_encode($row2) ?>');
        
        // getting the avg for both
        changeColorAndContent(getAvg(row1) , getAvg(row2) , 'avg1' , 'avg2');

        // getting the maximum marks for both 
        changeColorAndContent(getMax(row1) , getMax(row2) , 'hight1' , 'hight2');
        
        // getting the minimum marks for both 
        changeColorAndContent(getMin(row1) , getMin(row2) , 'lowest1' , 'lowest2');

        // getting math Avg
        changeColorAndContent(getMath(row1) , getMath(row2) , 'math1' , 'math2');

        // getting Programming avg
        changeColorAndContent(getProg(row1) , getProg(row2) , 'prog1' , 'prog2');

        // getting Software avg
        changeColorAndContent(getSoftware(row1) , getSoftware(row2) , 'Software1' , 'Software2');

        // getting Network avg
        changeColorAndContent(getNetwork(row1) , getNetwork(row2) , 'Network1' , 'Network2');

        // getting AI avg
        changeColorAndContent(getAI(row1) , getAI(row2) , 'AI1' , 'AI2');


        // includeing function that is used above
        @include('inc.javascriptFunctions')

        // chart for marks
        @include('inc.marksChart')

        // chart for average
        @include('inc.avgChart')

        // radar for the three specific
        @include('inc.speRadar') 

    @endisset 

    function change() {
        var id1 = document.getElementById('1').value;
        var id2 = document.getElementById('2').value;
        document.getElementById('3').href = "/MARKS5/public/compare/" + id1 + "/" + id2;
    }
@endsection
