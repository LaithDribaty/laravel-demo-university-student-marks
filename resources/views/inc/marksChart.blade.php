$("#chart-container1").insertFusionCharts({
    type: "mscolumn2d",
    width: "100%",
    height: "100%",
    dataFormat: "json",
    dataSource: {
        chart: {
            caption: "Marks Distributes",
            subcaption: "60-100",
            xaxisname: "marks",
            yaxisname: "Total number of times to get the mark",
            formatnumberscale: "1",
            plottooltext:
            "<b>$dataValue</b> times <b>$seriesName</b> got $label",
            theme: "fusion",
            drawcrossline: "1"
        },
        categories: [
            {
            category: [
                @for($i=60;$i<=100;$i++)
                    {
                    label: "{{ $i }}"
                    } ,
                @endfor
            ]
            }
        ],
        dataset: [
            {
            seriesname: "{{ $row1->name }}",
            data: [
                @for($i=60;$i<=100;$i++)
                    {
                    value: getMarkFreq( row1 , {{ $i }})
                    } ,
                @endfor
            ]
            },
            {
            seriesname: "{{ $row2->name }}",
            data: [
                @for($i=60;$i<=100;$i++)
                    {
                    value: getMarkFreq( row2 , {{ $i }})
                    } ,
                @endfor
            ]
        },
        ]
    }
});