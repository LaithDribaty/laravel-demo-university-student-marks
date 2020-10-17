$("#chart-container2").insertFusionCharts({
    type: "msspline",
    width: "100%",
    height: "100%",
    dataFormat: "json",
    dataSource: {
    chart: {
        caption: "average across semesters",
        yaxisname: "AVG",
        subcaption: "three years",
        numdivlines: "4",
        showvalues: "0",
        legenditemfontsize: "15",
        legenditemfontbold: "1",
        plottooltext: "<b>$dataValue</b> was for $seriesName in $label",
        theme: "fusion",
    },
    categories: [
        {
        category: [
            {
            label: "Semester 1"
            },
            {
            label: "Semester 2"
            },
            {
            label: "Semester 3"
            },
            {
            label: "Semester 4"
            },
            {
            label: "Semester 5"
            },
            {
            label: "Semester 6"
            }
        ]
        }
    ],
    dataset: [
        {
        seriesname: "{{$row1->name}}",
        data: [
            {
            value: calcAvgForSemesters(row1 , 1)
            },
            {
            value: calcAvgForSemesters(row1 , 2)
            },
            {
            value: calcAvgForSemesters(row1 , 3)
            },
            {
            value: calcAvgForSemesters(row1 , 4)
            },
            {
            value: calcAvgForSemesters(row1 , 5)
            },
            {
            value: calcAvgForSemesters(row1 , 6)
            }
        ]
        },
        {
        seriesname: "{{$row2->name}}",
        data: [
            {
            value: calcAvgForSemesters(row2 , 1)
            },
            {
            value: calcAvgForSemesters(row2 , 2)
            },
            {
            value: calcAvgForSemesters(row2 , 3)
            },
            {
            value: calcAvgForSemesters(row2 , 4)
            },
            {
            value: calcAvgForSemesters(row2 , 5)
            },
            {
            value: calcAvgForSemesters(row2 , 6)
            }
        ]
        }
    ]
    }
});