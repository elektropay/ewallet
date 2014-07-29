/*
	flot-example.js
*/

$(document).ready(init);

function init() {
	// example 1 - basic line graphs
	$.plot(
		$("#flot-example-1"),
		[
			{
				label: "Series 1",
				data: [ [0, 0], [1, 1], [2, 1], [3, 2] ],
				lines: {show: true},
				points: {show: true}
			},
			{
				label: "Series 2",
				data: [ [0, 3], [1, 5], [2, 8], [3, 13] ],
				lines: {show: true},
				points: {show: true}	
			}
		]
	);
	
	// example 2 - basic bar graph
	$.plot(
		$("#flot-example-2"),
		[
			{
				label: "Total Things Per Year",
				data: [ [2011, 450], [2012, 550], [2013, 320], [2014, 700] ],
				bars: {
					show: true,
					barWidth: 0.5,
					align: "center"
				}	
			}
		],
		{
			xaxis: {
				ticks: [
					[2011, "2011"],
					[2012, "2012"],
					[2013, "2013"],
					[2014, "2014"]
				]
			}	
		}
	);
	
	// example 3 - basic pie chart
	$.plot(
		$("#flot-example-3"),
		[
			{
				label: "This",
				data: 44	
			},
			{
				label: "That",
				data: 75
			},
			{
				label: "The Other Thing",
				data: 22
			}
		],
		{
			series: {
				pie: {
					show: true,
					label: {
						show: true
					}
				}
			}
		} 
	);
}
