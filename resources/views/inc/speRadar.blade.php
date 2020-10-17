$("#chart-container3").insertFusionCharts({
  type: "radar",
  width: "100%",
  height: "100%",
  dataFormat: "json",
  
  dataSource: {
    chart: {
      caption: "average for both students",
      subcaption: "For three specifics",
      theme: "fusion",
      numbersuffix: "%",
      "xAxisMaxValue": "60",
      "xAxisMinValue": "100"
    },
    categories: [
      {
        category: [
          {
            label: "AI"
          },
          {
            label: "Network"
          },
          {
            label: "Software"
          }
        ]
      }
    ],
    dataset: [
      {
        seriesname: "{{ $row1->name }}",
        plottooltext: "{{ $row1->name }} have got in <b>$label </b> <b>$datavalue</b>",
        data: [
          {
            value: getAI(row1)
          },
          {
            value: getNetwork(row1)
          },
          {
            value: getSoftware(row1)
          }
        ]
      },
      {
        seriesname: "{{ $row2->name }}",
        plottooltext: "{{ $row2->name }} have got in <b>$label </b>  <b>$datavalue</b>",
        data: [
          {
            value: getAI(row2)
          },
          {
            value: getNetwork(row2)
          },
          {
            value: getSoftware(row2)
          }
        ]
      }
    ]
  }
});