<!-- Styles-->
<style>
	#chartdiv3 {
  width: 100%;
  height: 500px;
}
#chartdiv2 {
  width: 100%;
  height: 400px;
}
#chartdiv1 {
  width: 100%;
  height: 400px;
}
</style>

<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>

<!-- Chart code grafica 1 -->
<script>
am5.ready(function() {

// Create root element
// https://www.amcharts.com/docs/v5/getting-started/#Root_element
var root1 = am5.Root.new("chartdiv1");

// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
root1.setThemes([
  am5themes_Animated.new(root1)
]);

// Create chart
// https://www.amcharts.com/docs/v5/charts/xy-chart/
var chart1 = root1.container.children.push(am5xy.XYChart.new(root1, {
  panX: true,
  panY: true,
  wheelX: "panX",
  wheelY: "zoomX",
  pinchZoomX: true,
  paddingLeft:0,
  paddingRight:1
}));

// Add cursor
// https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
var cursor1 = chart1.set("cursor", am5xy.XYCursor.new(root1, {}));
cursor1.lineY.set("visible", false);


// Create axes
// https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
var xRenderer1 = am5xy.AxisRendererX.new(root1, { 
  minGridDistance: 30, 
  minorGridEnabled: true
});

xRenderer1.labels.template.setAll({
  rotation: -90,
  centerY: am5.p50,
  centerX: am5.p100,
  paddingRight: 15
});

xRenderer1.grid.template.setAll({
  location: 1
})

var xAxis1 = chart1.xAxes.push(am5xy.CategoryAxis.new(root1, {
  maxDeviation: 0.3,
  categoryField: "curso",
  renderer: xRenderer1,
  tooltip: am5.Tooltip.new(root1, {})
}));

var yRenderer1 = am5xy.AxisRendererY.new(root1, {
  strokeOpacity: 0.1
})

var yAxis1 = chart1.yAxes.push(am5xy.ValueAxis.new(root1, {
  maxDeviation: 0.3,
  renderer: yRenderer1
}));

// Create series
// https://www.amcharts.com/docs/v5/charts/xy-chart/series/
var series1 = chart1.series.push(am5xy.ColumnSeries.new(root1, {
  name: "Series 1",
  xAxis: xAxis1,
  yAxis: yAxis1,
  valueYField: "value",
  sequencedInterpolation: true,
  categoryXField: "curso",
  tooltip: am5.Tooltip.new(root1, {
    labelText: "{valueY}"
  })
}));

series1.columns.template.setAll({ cornerRadiusTL: 5, cornerRadiusTR: 5, strokeOpacity: 0 });
series1.columns.template.adapters.add("fill", function (fill, target) {
  return chart1.get("colors").getIndex(series1.columns.indexOf(target));
});

series1.columns.template.adapters.add("stroke", function (stroke, target) {
  return chart1.get("colors").getIndex(series1.columns.indexOf(target));
});


// Set data
var data1 = [
	<?php 
	$selGrafic1 = $conn->query("SELECT * FROM course_tbl ");
    if($selGrafic1->rowCount() > 0){
        while ($selGrafic1row = $selGrafic1->fetch(PDO::FETCH_ASSOC)) {
			$selsumalu1 = $conn->query("SELECT COUNT(*) AS total FROM examinee_tbl WHERE exmne_course = ".$selGrafic1row['cou_id'].";")->fetch(PDO::FETCH_ASSOC);
			$valueg = "{curso: \"".$selGrafic1row['cou_name']."\",
			value: ".$selsumalu1['total']."
			},";
			echo ($valueg);
		}
	} 
	?>
	];

xAxis1.data.setAll(data1);
series1.data.setAll(data1);


// Make stuff animate on load
// https://www.amcharts.com/docs/v5/concepts/animations/
series1.appear(1000);
chart1.appear(1000, 100);
	
}); // end am5.ready()
</script>

<!-- Chart code grafica 2 -->
<script>
am5.ready(function() {

// Create root element
// https://www.amcharts.com/docs/v5/getting-started/#Root_element
var root = am5.Root.new("chartdiv2");

// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
root.setThemes([
  am5themes_Animated.new(root)
]);

// Create chart
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
var chart = root.container.children.push(
  am5percent.PieChart.new(root, {
    endAngle: 270
  })
);

// Create series
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
var series = chart.series.push(
  am5percent.PieSeries.new(root, {
    valueField: "value",
    categoryField: "category",
    endAngle: 270
  })
);

series.states.create("hidden", {
  endAngle: -90
});

// Set data
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
series.data.setAll([
	<?php 
	$selGrafic2 = $conn->query("SELECT * FROM actividad ");
    if($selGrafic2->rowCount() > 0){
        while ($selGrafic2row = $selGrafic2->fetch(PDO::FETCH_ASSOC)) {
			$selsumalu2 = $conn->query("SELECT SUM(tiempo_total) AS tiempo FROM tip WHERE actividad_id = ".$selGrafic2row['id'].";")->fetch(PDO::FETCH_ASSOC);
			$valueg2 = "{category: \"".$selGrafic2row['nombre']."\",
			value: 0".$selsumalu2['tiempo']."
			},";
			echo ($valueg2);
		}
	} 
	?>
	]);

series.appear(1000, 100);

}); // end am5.ready()
</script>

<!-- Chart code grafica 3 -->
<script>
am5.ready(function() {


// Create root element
// https://www.amcharts.com/docs/v5/getting-started/#Root_element
var root3 = am5.Root.new("chartdiv3");


var myTheme3 = am5.Theme.new(root3);

myTheme3.rule("Grid", ["base"]).setAll({
  strokeOpacity: 0.1
});


// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
root3.setThemes([
  am5themes_Animated.new(root3),
  myTheme3
]);


// Create chart
// https://www.amcharts.com/docs/v5/charts/xy-chart/
var chart3 = root3.container.children.push(am5xy.XYChart.new(root3, {
  panX: false,
  panY: false,
  wheelX: "panY",
  wheelY: "zoomY",
  paddingLeft: 0,
  layout: root3.verticalLayout
}));

// Add scrollbar
// https://www.amcharts.com/docs/v5/charts/xy-chart/scrollbars/
chart3.set("scrollbarY", am5.Scrollbar.new(root3, {
  orientation: "vertical"
}));

var data3 = [
	<?php 
	$selGrafic3 = $conn->query("SELECT * FROM course_tbl ");
    if($selGrafic3->rowCount() > 0){
        while ($selGrafic3row = $selGrafic3->fetch(PDO::FETCH_ASSOC)) {
			$valueg3 = "{curso: \"".$selGrafic3row['cou_name']."\",";
			
			$selGrafic = $conn->query("SELECT acti_tipes, COUNT(*) AS total FROM topic_cou WHERE cou_id = ".$selGrafic3row['cou_id']." GROUP BY acti_tipes;");
    		if($selGrafic->rowCount() > 0){
        		while ($selGraficrow = $selGrafic->fetch(PDO::FETCH_ASSOC)) {
					$valueg3 .= " \"".$selGraficrow['acti_tipes']."\": ".$selGraficrow['total'].",";
				}
			}
			$valueg3 .= "},";
			echo ($valueg3);
			
		}
	} 
	?>
	]


// Create axes
// https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
var yRenderer3 = am5xy.AxisRendererY.new(root3, {});
var yAxis3 = chart3.yAxes.push(am5xy.CategoryAxis.new(root3, {
  categoryField: "curso",
  renderer: yRenderer3,
  tooltip: am5.Tooltip.new(root3, {})
}));

yRenderer3.grid.template.setAll({
  location: 1
})

yAxis3.data.setAll(data3);

var xAxis3 = chart3.xAxes.push(am5xy.ValueAxis.new(root3, {
  min: 0,
  maxPrecision: 0,
  renderer: am5xy.AxisRendererX.new(root3, {
    minGridDistance: 40,
    strokeOpacity: 0.1
  })
}));

// Add legend
// https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
var legend3 = chart3.children.push(am5.Legend.new(root3, {
  centerX: am5.p50,
  x: am5.p50
}));


// Add series
// https://www.amcharts.com/docs/v5/charts/xy-chart/series/
function makeSeries3(name, fieldName) {
  var series3 = chart3.series.push(am5xy.ColumnSeries.new(root3, {
    name: name,
    stacked: true,
    xAxis: xAxis3,
    yAxis: yAxis3,
    baseAxis: yAxis3,
    valueXField: fieldName,
    categoryYField: "curso"
  }));

  series3.columns.template.setAll({
    tooltipText: "{name}, {categoryY}: {valueX}",
    tooltipY: am5.percent(90)
  });
  series3.data.setAll(data3);

  // Make stuff animate on load
  // https://www.amcharts.com/docs/v5/concepts/animations/
  series3.appear();

  series3.bullets.push(function () {
    return am5.Bullet.new(root3, {
      sprite: am5.Label.new(root3, {
        text: "{valueX}",
        fill: root3.interfaceColors.get("alternativeText"),
        centerY: am5.p50,
        centerX: am5.p50,
        populateText: true
      })
    });
  });

  legend3.data.push(series3);
}
	

<?php 
$makeS3 = $conn->query("SELECT * FROM acti_tipes ");
if($makeS3->rowCount() > 0){
	while ($makeS3row = $makeS3->fetch(PDO::FETCH_ASSOC)) {
?>
makeSeries3("<?=$makeS3row['tipo']?>","<?=$makeS3row['idacti_tipes']?>");	
<?php
	}
}
?>

// Make stuff animate on load
// https://www.amcharts.com/docs/v5/concepts/animations/
chart3.appear(1000, 100);

}); // end am5.ready()
</script>