$(document).ready(function(){
	sparkline_charts();
	charts();
});

/* ---------- Sparkline Charts ---------- */

function sparkline_charts() {
	
	//generate random number for charts
	randNum = function(){
		//return Math.floor(Math.random()*101);
		return (Math.floor( Math.random()* (1+40-20) ) ) + 20;
	}

	var chartColours = ['#2FABE9', '#FA5833', '#b9e672', '#bbdce3', '#9a3b1b', '#5a8022', '#2c7282'];

	//sparklines (making loop with random data for all 7 sparkline)
	i=1;
	for (i=1; i<9; i++) {
	 	var data = [[1, 3+randNum()], [2, 5+randNum()], [3, 8+randNum()], [4, 11+randNum()],[5, 14+randNum()],[6, 17+randNum()],[7, 20+randNum()], [8, 15+randNum()], [9, 18+randNum()], [10, 22+randNum()]];
	 	placeholder = '.sparkLineStats' + i;
		$(placeholder).sparkline(data, { 
			width: 100,//Width of the chart - Defaults to 'auto' - May be any valid css width - 1.5em, 20px, etc (using a number without a unit specifier won't do what you want) - This option does nothing for bar and tristate chars (see barWidth)
			height: 30,//Height of the chart - Defaults to 'auto' (line height of the containing tag)
			lineColor: '#2FABE9',//Used by line and discrete charts to specify the colour of the line drawn as a CSS values string
			fillColor: '#f2f7f9',//Specify the colour used to fill the area under the graph as a CSS value. Set to false to disable fill
			spotColor: '#467e8c',//The CSS colour of the final value marker. Set to false or an empty string to hide it
			maxSpotColor: '#b9e672',//The CSS colour of the marker displayed for the maximum value. Set to false or an empty string to hide it
			minSpotColor: '#FA5833',//The CSS colour of the marker displayed for the mimum value. Set to false or an empty string to hide it
			spotRadius: 2,//Radius of all spot markers, In pixels (default: 1.5) - Integer
			lineWidth: 1//In pixels (default: 1) - Integer
		});
	}
	
}

/* ---------- Charts ---------- */

function charts() {
	
	function randNum(){
		return (Math.floor( Math.random()* (1+40-20) ) ) + 20;
	}
	
	/* ---------- Chart with points ---------- */
	if($("#stats-chart").length)
	{
		var pageviews = [[1, 5+randNum()], [2, 10+randNum()], [3, 15+randNum()], [4, 20+randNum()],[5, 25+randNum()],[6, 30+randNum()],[7, 35+randNum()],[8, 40+randNum()],[9, 45+randNum()],[10, 50+randNum()],[11, 55+randNum()],[12, 60+randNum()],[13, 65+randNum()],[14, 70+randNum()],[15, 75+randNum()],[16, 80+randNum()],[17, 85+randNum()],[18, 90+randNum()],[19, 85+randNum()],[20, 80+randNum()],[21, 75+randNum()],[22, 80+randNum()],[23, 75+randNum()],[24, 70+randNum()],[25, 65+randNum()],[26, 75+randNum()],[27,80+randNum()],[28, 85+randNum()],[29, 90+randNum()], [30, 95+randNum()]];
		var visitors = [[1, randNum()-10], [2, randNum()-10], [3, randNum()-10], [4, randNum()],[5, randNum()],[6, 4+randNum()],[7, 5+randNum()],[8, 6+randNum()],[9, 6+randNum()],[10, 8+randNum()],[11, 9+randNum()],[12, 10+randNum()],[13,11+randNum()],[14, 12+randNum()],[15, 13+randNum()],[16, 14+randNum()],[17, 15+randNum()],[18, 15+randNum()],[19, 16+randNum()],[20, 17+randNum()],[21, 18+randNum()],[22, 19+randNum()],[23, 20+randNum()],[24, 21+randNum()],[25, 14+randNum()],[26, 24+randNum()],[27,25+randNum()],[28, 26+randNum()],[29, 27+randNum()], [30, 31+randNum()]];

		var plot = $.plot($("#stats-chart"),
			   [ { data: pageviews, label: "pageviews"}, { data: visitors, label: "visitors" } ], {
				   series: {
					   lines: { show: true,
								lineWidth: 3,
								fill: true, fillColor: { colors: [ { opacity: 0.08 }, { opacity: 0.01 } ] }
							 },
					   points: { show: true },
					   shadowSize: 2
				   },
				   grid: { hoverable: true, 
						   clickable: true, 
						   tickColor: "#eee",
						   borderWidth: 0,
						 },
				   colors: ["#FA5833", "#2FABE9"],
					xaxis: {ticks:11, tickDecimals: 0},
					yaxis: {ticks:11, tickDecimals: 0},
				 });

		function showTooltip(x, y, contents) {
			$('<div id="tooltip">' + contents + '</div>').css( {
				position: 'absolute',
				display: 'none',
				top: y + 5,
				left: x + 5,
				border: '1px solid #fdd',
				padding: '2px',
				'background-color': '#dfeffc',
				opacity: 0.80
			}).appendTo("body").fadeIn(200);
		}

		var previousPoint = null;
		$("#stats-chart").bind("plothover", function (event, pos, item) {
			$("#x").text(pos.x.toFixed(2));
			$("#y").text(pos.y.toFixed(2));

				if (item) {
					if (previousPoint != item.dataIndex) {
						previousPoint = item.dataIndex;

						$("#tooltip").remove();
						var x = item.datapoint[0].toFixed(2),
							y = item.datapoint[1].toFixed(2);

						showTooltip(item.pageX, item.pageY,
									item.series.label + " of " + x + " = " + y);
					}
				}
				else {
					$("#tooltip").remove();
					previousPoint = null;
				}
		});
		


		$("#sincos").bind("plotclick", function (event, pos, item) {
			if (item) {
				$("#clickdata").text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
				plot.highlight(item.series, item.datapoint);
			}
		});
	}
	
	
	
	/* ---------- Chart with points ---------- */
	if($("#sincos").length)
	{
		var sin = [], cos = [];

		for (var i = 0; i < 14; i += 0.5) {
			sin.push([i, Math.sin(i)/i]);
			cos.push([i, Math.cos(i)]);
		}

		var plot = $.plot($("#sincos"),
			   [ { data: sin, label: "sin(x)/x"}, { data: cos, label: "cos(x)" } ], {
				   series: {
					   lines: { show: true,
								lineWidth: 2,
							 },
					   points: { show: true },
					   shadowSize: 2
				   },
				   grid: { hoverable: true, 
						   clickable: true, 
						   tickColor: "#dddddd",
						   borderWidth: 0 
						 },
				   yaxis: { min: -1.2, max: 1.2 },
				   colors: ["#FA5833", "#2FABE9"]
				 });

		function showTooltip(x, y, contents) {
			$('<div id="tooltip">' + contents + '</div>').css( {
				position: 'absolute',
				display: 'none',
				top: y + 5,
				left: x + 5,
				border: '1px solid #fdd',
				padding: '2px',
				'background-color': '#dfeffc',
				opacity: 0.80
			}).appendTo("body").fadeIn(200);
		}

		var previousPoint = null;
		$("#sincos").bind("plothover", function (event, pos, item) {
			$("#x").text(pos.x.toFixed(2));
			$("#y").text(pos.y.toFixed(2));

				if (item) {
					if (previousPoint != item.dataIndex) {
						previousPoint = item.dataIndex;

						$("#tooltip").remove();
						var x = item.datapoint[0].toFixed(2),
							y = item.datapoint[1].toFixed(2);

						showTooltip(item.pageX, item.pageY,
									item.series.label + " of " + x + " = " + y);
					}
				}
				else {
					$("#tooltip").remove();
					previousPoint = null;
				}
		});
		


		$("#sincos").bind("plotclick", function (event, pos, item) {
			if (item) {
				$("#clickdata").text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
				plot.highlight(item.series, item.datapoint);
			}
		});
	}
	
	/* ---------- Flot chart ---------- */
	if($("#flotchart").length)
	{
		var d1 = [];
		for (var i = 0; i < Math.PI * 2; i += 0.25)
			d1.push([i, Math.sin(i)]);
		
		var d2 = [];
		for (var i = 0; i < Math.PI * 2; i += 0.25)
			d2.push([i, Math.cos(i)]);

		var d3 = [];
		for (var i = 0; i < Math.PI * 2; i += 0.1)
			d3.push([i, Math.tan(i)]);
		
		$.plot($("#flotchart"), [
			{ label: "sin(x)",  data: d1},
			{ label: "cos(x)",  data: d2},
			{ label: "tan(x)",  data: d3}
		], {
			series: {
				lines: { show: true },
				points: { show: true }
			},
			xaxis: {
				ticks: [0, [Math.PI/2, "\u03c0/2"], [Math.PI, "\u03c0"], [Math.PI * 3/2, "3\u03c0/2"], [Math.PI * 2, "2\u03c0"]]
			},
			yaxis: {
				ticks: 10,
				min: -2,
				max: 2
			},
			grid: {	tickColor: "#dddddd",
					borderWidth: 0 
			},
			colors: ["#FA5833", "#2FABE9", "#FABB3D"]
		});
	}
	
	/* ---------- Stack chart ---------- */
	if($("#stackchart").length)
	{
		var d1 = [];
		for (var i = 0; i <= 10; i += 1)
		d1.push([i, parseInt(Math.random() * 30)]);

		var d2 = [];
		for (var i = 0; i <= 10; i += 1)
			d2.push([i, parseInt(Math.random() * 30)]);

		var d3 = [];
		for (var i = 0; i <= 10; i += 1)
			d3.push([i, parseInt(Math.random() * 30)]);

		var stack = 0, bars = true, lines = false, steps = false;

		function plotWithOptions() {
			$.plot($("#stackchart"), [ d1, d2, d3 ], {
				series: {
					stack: stack,
					lines: { show: lines, fill: true, steps: steps },
					bars: { show: bars, barWidth: 0.6 },
				},
				colors: ["#FA5833", "#2FABE9", "#FABB3D"]
			});
		}

		plotWithOptions();

		$(".stackControls input").click(function (e) {
			e.preventDefault();
			stack = $(this).val() == "With stacking" ? true : null;
			plotWithOptions();
		});
		$(".graphControls input").click(function (e) {
			e.preventDefault();
			bars = $(this).val().indexOf("Bars") != -1;
			lines = $(this).val().indexOf("Lines") != -1;
			steps = $(this).val().indexOf("steps") != -1;
			plotWithOptions();
		});
	}

	/* ---------- Pie chart ---------- */
	var data = [
	{ label: "Internet Explorer",  data: 12},
	{ label: "Mobile",  data: 27},
	{ label: "Safari",  data: 85},
	{ label: "Opera",  data: 64},
	{ label: "Firefox",  data: 90},
	{ label: "Chrome",  data: 112}
	];
	
	if($("#piechart").length)
	{
		$.plot($("#piechart"), data,
		{
			series: {
					pie: {
							show: true
					}
			},
			grid: {
					hoverable: true,
					clickable: true
			},
			legend: {
				show: false
			},
			colors: ["#FA5833", "#2FABE9", "#FABB3D", "#78CD51"]
		});
		
		function pieHover(event, pos, obj)
		{
			if (!obj)
					return;
			percent = parseFloat(obj.series.percent).toFixed(2);
			$("#hover").html('<span style="font-weight: bold; color: '+obj.series.color+'">'+obj.series.label+' ('+percent+'%)</span>');
		}
		$("#piechart").bind("plothover", pieHover);
	}
	
	/* ---------- Donut chart ---------- */
	if($("#donutchart").length)
	{
		$.plot($("#donutchart"), data,
		{
				series: {
						pie: {
								innerRadius: 0.5,
								show: true
						}
				},
				legend: {
					show: false
				},
				colors: ["#FA5833", "#2FABE9", "#FABB3D", "#78CD51"]
		});
	}




	 // we use an inline data source in the example, usually data would
	// be fetched from a server
	var data = [], totalPoints = 300;
	function getRandomData() {
		if (data.length > 0)
			data = data.slice(1);

		// do a random walk
		while (data.length < totalPoints) {
			var prev = data.length > 0 ? data[data.length - 1] : 50;
			var y = prev + Math.random() * 10 - 5;
			if (y < 0)
				y = 0;
			if (y > 100)
				y = 100;
			data.push(y);
		}

		// zip the generated y values with the x values
		var res = [];
		for (var i = 0; i < data.length; ++i)
			res.push([i, data[i]])
		return res;
	}

	// setup control widget
	var updateInterval = 30;
	$("#updateInterval").val(updateInterval).change(function () {
		var v = $(this).val();
		if (v && !isNaN(+v)) {
			updateInterval = +v;
			if (updateInterval < 1)
				updateInterval = 1;
			if (updateInterval > 2000)
				updateInterval = 2000;
			$(this).val("" + updateInterval);
		}
	});

	/* ---------- Realtime chart ---------- */
	if($("#serverload").length)
	{	
		var options = {
			series: { shadowSize: 1 },
			lines: { show: true, lineWidth: 0.4, fill: true, fillColor: { colors: [ { opacity: 0.1 }, { opacity: 1 } ] }},
			yaxis: { min: 0, max: 100, tickFormatter: function (v) { return v + "%"; }},
			xaxis: { show: false },
			colors: ["#FA5833"],
			grid: {	tickColor: "#dddddd",
					borderWidth: 0, 
			},
		};
		var plot = $.plot($("#serverload"), [ getRandomData() ], options);
		function update() {
			plot.setData([ getRandomData() ]);
			// since the axes don't change, we don't need to call plot.setupGrid()
			plot.draw();
			
			setTimeout(update, updateInterval);
		}

		update();
	}
	
	if($("#realtimechart").length)
	{
		var options = {
			series: { shadowSize: 1 },
			lines: { fill: true, fillColor: { colors: [ { opacity: 1 }, { opacity: 0.1 } ] }},
			yaxis: { min: 0, max: 100 },
			xaxis: { show: false },
			colors: ["#F4A506"],
			grid: {	tickColor: "#dddddd",
					borderWidth: 0 
			},
		};
		var plot = $.plot($("#realtimechart"), [ getRandomData() ], options);
		function update() {
			plot.setData([ getRandomData() ]);
			// since the axes don't change, we don't need to call plot.setupGrid()
			plot.draw();
			
			setTimeout(update, updateInterval);
		}

		update();
	}
}