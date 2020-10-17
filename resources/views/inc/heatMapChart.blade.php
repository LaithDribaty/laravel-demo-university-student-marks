function drawChart() {
  $("#chart-container1").insertFusionCharts({
    type: "heatmap",
    width: "100%",
    height: "100%",
    dataFormat: "json",
    dataSource: {
      colorrange: {
        gradient: "0",
        color: [
          {
            code: "#e24b1a",
            minvalue: "0",
            maxvalue: "75",
            label: "accepted"
          },
          {
            code: "#f6bc33",
            minvalue: "75",
            maxvalue: "85",
            label: "good"
          },
          {
            code: "#6da81e",
            minvalue: "85",
            maxvalue: "95",
            label: "very good"
          },
          {
            code: "#83eb34",
            minvalue: "95",
            maxvalue: "100",
            label: "excelent"
          },
          {
            code: "#ffffff",
            minvalue: "-1",
            maxvalue: "0",
            label: "failed"
          }
        ]
      },
      dataset: [
        {
          data: [
            @for($i = 1; $i <= 6; $i++)
              @for($j = 1; $j <= 7; $j++)
                  {
                      rowid: "{{$i}}",
                      columnid: "{{$j}}",
                      displayvalue: displayValue2({{$i}} , {{$j}}),
                      colorrangelabel: colorPick({{$i}} , {{$j}})
                  },
              @endfor
            @endfor

          ]
        }
      ],
      columns: {
        column: [
          @for($i = 1; $i <= 7; $i++)
              {
                  id: "{{ $i }}",
                  label: "subject {{ $i }}"
              },
          @endfor
        ]
      },
      rows: {
        row: [
          @for($i = 1; $i <= 6; $i++)
              {
                  id: "{{ $i }}",
                  label: "semester {{ $i }}"
              },
          @endfor
        ]
      },
      chart: {
        theme: "fusion",
        caption: "marks in defferent semesters",
        subcaption: " Across all three years",
        showvalues: "1",
        mapbycategory: "1",
        plottooltext:
          "$rowlabel's mark in $displayvalue / 100 for {{ $row->name}}"
      }
    }
  });
};