@extends('layout')

@section('content')
@include('partials.notify')

{{-- Cards --}}
<div class="container-dashboard">
    <div class="content-cards-amounts">
        <div class="card-amount">
            <div class="img-card-amounts">
                <img src="/images/card-in.png" class="img-card-amount">
            </div>
            <div class="texts-card">
                <div class= "title-card">
                    <b>Entradas</b>
                </div>
                <div class= "text-card">
                    {{$entradas}}
                </div>
            </div>
        </div>
        <div class="card-amount">
            <div class="img-card-amounts">
                <img src="../images/card-out.png" class="img-card-amount">
            </div>
            <div class="texts-card">
                <div class= "title-card">
                    <b>Saídas</b>
                </div>
                <div class= "text-card">
                    {{$saidas}}
                </div>
            </div>
        </div>
        <div class="card-amount">
            <div class="img-card-amounts">
                <img src="/images/card-invest.png" class="img-card-amount">
            </div>
            <div class="texts-card">
                <div class= "title-card">
                    <b>Investimento</b>
                </div>
                <div class= "text-card">
                    {{$investimentos}}
                </div>
            </div>
        </div>
        <div class="card-amount">
            <div class="img-card-amounts">
                <img src="/images/card-total.png" class="img-card-amount">
            </div>
            <div class="texts-card">
                <div class= "title-card">
                    <b>Total</b>
                </div>
                <div class= "text-card">
                    {{$total}}
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Gráficos --}}

{{-- boxes --}}

<div class="charts">
    <div id="chartdiv1" class="chartdiv1"></div>
    <div id="chartdiv2" class="chartdiv2"></div>
    <div id="chartdiv3" class="chartdiv3"></div>


    <script>
        //Chart1-Goal:

        // Create root element
        // https://www.amcharts.com/docs/v5/getting-started/#Root_element
        var root = am5.Root.new("chartdiv1");
        root._logo.dispose();

        // Set themes
        // https://www.amcharts.com/docs/v5/concepts/themes/
        root.setThemes([
        // am5themes_Animated.new(root)
        am5themes_Dark.new(root)
        ]);

        // Create chart
        // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
        var chart = root.container.children.push(
        am5percent.PieChart.new(root, {
            startAngle: 160, endAngle: 380
        })
        );

        // Create series
        // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series

        var series0 = chart.series.push(
        am5percent.PieSeries.new(root, {
            valueField: "reais",
            categoryField: "name",
            startAngle: 180,
            endAngle: 360,
            radius: am5.percent(70),
            innerRadius: am5.percent(65)
        })
        );

        var colorSet = am5.ColorSet.new(root, {
        colors: [series0.get("colors").getIndex(0)],
        passOptions: {
            lightness: -0.05,
            hue: 0
        }
        });

        series0.set("colors", colorSet);

        series0.ticks.template.set("forceHidden", true);
        series0.labels.template.set("forceHidden", true);

        var series1 = chart.series.push(
        am5percent.PieSeries.new(root, {
            startAngle: 180,
            endAngle: 360,
            valueField: "reais",
            innerRadius: am5.percent(80),
            categoryField: "name"
        })
        );

        series1.ticks.template.set("forceHidden", true);
        series1.labels.template.set("forceHidden", true);

        var label = chart.seriesContainer.children.push(
        am5.Label.new(root, {
            textAlign: "center",
            centerY: am5.p100,
            centerX: am5.p50,
            text: "[fontSize:18px]Objetivo[/]:\n[bold fontSize:30px]{{$goal}}[/]"
        })
        );

        var data = [
        {
            name: "Investimento",
            reais: {{$investimentos}},
            reais: {{$investimentos}}
        },
        {
            name: "Objetivo",
            reais: {{$goal}},
            reais: {{$goal}}
        },
        ];

        // Set data
        // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
        series0.data.setAll(data);
        series1.data.setAll(data);


        //Chart2-Pie:
        var root = am5.Root.new("chartdiv2");
        root._logo.dispose();

        // Set themes
        // https://www.amcharts.com/docs/v5/concepts/themes/
        root.setThemes([
        // am5themes_Animated.new(root)
        am5themes_Dark.new(root)
        ]);


        // Create chart
        // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
        var chart = root.container.children.push(am5percent.PieChart.new(root, {
        layout: root.verticalLayout
        }));


        // Create series
        // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
        var series = chart.series.push(am5percent.PieSeries.new(root, {
        valueField: "value",
        categoryField: "category"
        }));


        // Set data
        // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
        series.data.setAll([
        { value: {{$entradas}}, category: "Entradas" },
        { value: {{$saidas}}, category: "Saídas" },
        { value: {{$investimentos}}, category: "Investimentos" },
        ]);


        // Create legend
        // https://www.amcharts.com/docs/v5/charts/percent-charts/legend-percent-series/
        var legend = chart.children.push(am5.Legend.new(root, {
        centerX: am5.percent(50),
        x: am5.percent(50),
        marginTop: 15,
        marginBottom: 15
        }));

        legend.data.setAll(series.dataItems);


        // Play initial series animation
        // https://www.amcharts.com/docs/v5/concepts/animations/#Animation_of_series
        series.appear(1000, 100);

        //Chart 3

        // Create root element
        var root = am5.Root.new("chartdiv3");
        root._logo.dispose();

        // Set themes
        // https://www.amcharts.com/docs/v5/concepts/themes/
        root.setThemes([
        // am5themes_Animated.new(root)
        am5themes_Dark.new(root)
        ]);

        // Create chart
        // https://www.amcharts.com/docs/v5/charts/xy-chart/
        var chart = root.container.children.push(am5xy.XYChart.new(root, {
        panX: false,
        panY: false,
        wheelX: "panX",
        wheelY: "zoomX",
        layout: root.verticalLayout
        }));

        // Add scrollbar
        // https://www.amcharts.com/docs/v5/charts/xy-chart/scrollbars/
        chart.set("scrollbarX", am5.Scrollbar.new(root, {
        orientation: "horizontal"
        }));

        var data = [{
        "month": "08",
        "entradas": {{$entradas}},
        "saidas":{{$saidas}},
        "investimentos":{{$investimentos}},
        }, {
        "month": "09",
        "entradas": {{$entradas}},
        "saidas":{{$saidas}},
        "investimentos":{{$investimentos}},
        }]

        // Create axes
        // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
        var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
        categoryField: "month",
        renderer: am5xy.AxisRendererX.new(root, {}),
        tooltip: am5.Tooltip.new(root, {})
        }));

        xAxis.data.setAll(data);

        var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
        min: 0,
        max: 100,
        numberFormat: "#'%'",
        strictMinMax: true,
        calculateTotals: true,
        renderer: am5xy.AxisRendererY.new(root, {})
        }));


        // Add legend
        // https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
        var legend = chart.children.push(am5.Legend.new(root, {
        centerX: am5.p50,
        x: am5.p50
        }));


        // Add series
        // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
        function makeSeries(name, fieldName) {
        var series = chart.series.push(am5xy.ColumnSeries.new(root, {
            name: name,
            stacked: true,
            xAxis: xAxis,
            yAxis: yAxis,
            valueYField: fieldName,
            valueYShow: "valueYTotalPercent",
            categoryXField: "month"
        }));

        series.columns.template.setAll({
            tooltipText: "{name}, {categoryX}:{valueYTotalPercent.formatNumber('#.#')}%",
            tooltipY: am5.percent(10)
        });
        series.data.setAll(data);

        // Make stuff animate on load
        // https://www.amcharts.com/docs/v5/concepts/animations/
        series.appear();

        series.bullets.push(function () {
            return am5.Bullet.new(root, {
            sprite: am5.Label.new(root, {
                text: "{valueYTotalPercent.formatNumber('#.#')}%",
                fill: root.interfaceColors.get("alternativeText"),
                centerY: am5.p50,
                centerX: am5.p50,
                populateText: true
            })
            });
        });

        legend.data.push(series);
        }

        makeSeries("Entradas", "entradas");
        makeSeries("Saidas", "saidas");
        makeSeries("Investimentos", "investimentos");

        // Make stuff animate on load
        // https://www.amcharts.com/docs/v5/concepts/animations/
        chart.appear(1000, 100);

    </script>
</div>


@endsection
