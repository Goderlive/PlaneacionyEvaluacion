<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

</head>

<body>
    

    <div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
        <div id="column-chart"></div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <script>
        const options = {
            colors: ["#1A56DB", "#FDBA8C"],
            series: [{
                    name: "Organic",
                    color: "#FF0000",
                    data: [{
                            x: "Ene",
                            y: 231
                        },
                        {
                            x: "Feb",
                            y: 122
                        },
                        {
                            x: "Mar",
                            y: 63
                        },
                        {
                            x: "Abr",
                            y: 421
                        },
                        {
                            x: "May",
                            y: 122
                        },
                        {
                            x: "Jun",
                            y: 323
                        },
                        {
                            x: "Jul",
                            y: 111
                        },
                    ],
                },
                {
                    name: "Social media",
                    color: "#0000FF",
                    data: [{
                            x: "Mon",
                            y: 232
                        },
                        {
                            x: "Tue",
                            y: 113
                        },
                        {
                            x: "Wed",
                            y: 341
                        },
                        {
                            x: "Thu",
                            y: 224
                        },
                        {
                            x: "Fri",
                            y: 522
                        },
                        {
                            x: "Sat",
                            y: 411
                        },
                        {
                            x: "Sun",
                            y: 243
                        },
                    ],
                },
            ],
            chart: {
                type: "bar",
                height: "320px",
                fontFamily: "Inter, sans-serif",
                toolbar: {
                    show: false,
                },
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: "70%",
                    borderRadiusApplication: "end",
                    borderRadius: 8,
                },
            },
            tooltip: {
                shared: true,
                intersect: false,
                style: {
                    fontFamily: "Inter, sans-serif",
                },
            },
            states: {
                hover: {
                    filter: {
                        type: "darken",
                        value: 1,
                    },
                },
            },
            stroke: {
                show: true,
                width: 0,
                colors: ["transparent"],
            },
            grid: {
                show: false,
                strokeDashArray: 4,
                padding: {
                    left: 2,
                    right: 2,
                    top: -14
                },
            },
            dataLabels: {
                enabled: false,
            },
            legend: {
                show: false,
            },
            xaxis: {
                floating: false,
                labels: {
                    show: true,
                    style: {
                        fontFamily: "Inter, sans-serif",
                        cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                    }
                },
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
            },
            yaxis: {
                show: false,
            },
            fill: {
                opacity: 1,
            },
        }

        if (document.getElementById("column-chart") && typeof ApexCharts !== 'undefined') {
            const chart = new ApexCharts(document.getElementById("column-chart"), options);
            chart.render();
        }
    </script>

</body>

</html>