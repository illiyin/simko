<script>

jQuery('#idagency').change(function() {
	get_graph();
	if (jQuery(this).val() == 'all' || jQuery(this).val() == null) {
		jQuery('.chart-detail').parents('.box-home').show();
	}
	else {
		jQuery('.chart-detail').parents('.box-home').hide();
	}
});
jQuery('#month').change(function() {
	get_graph();
});
jQuery('#year').change(function() {
	get_graph();
});

jQuery('.chart-sent').click(function() {
	show_modal('sent');
});
jQuery('.chart-not-yet').click(function() {
	show_modal('not-yet');
});

jQuery('.chart-sent-duk').click(function() {
	show_modal('sent-duk');
});
jQuery('.chart-not-yet-duk').click(function() {
	show_modal('not-yet-duk');
});

jQuery('#chart_type').change(function() {
	if (jQuery(this).val() == 'bar') {
		jQuery('.pie-chart').hide();
		jQuery('.bar-chart').show();	
	}
	else {
		jQuery('.pie-chart').show();
		jQuery('.bar-chart').hide();
	}
	get_graph();
});

jQuery('.pie-chart').hide();
get_graph();

function get_graph() {
	jQuery.ajax({
		url: app_url+'home/graph',
		data: {
			id: jQuery('#idagency').val(),
			month: jQuery('#month').val(),
			year: jQuery('#year').val()
		},
		dataType: 'JSON',
		type: 'POST',
		success: function(response) {
			generate(response);
			jQuery('.chart-count-sent').text(response.sent);
			jQuery('.chart-count-not-yet').text(response.not_yet);
			jQuery('.chart-count-sent-duk').text(response.sent_duk);
			jQuery('.chart-count-not-yet-duk').text(response.not_yet_duk);
			var sent_data = response.sent_data;
			var not_yet_data = response.not_yet_data;
			var sent_data_duk = response.sent_duk_data;
			var not_yet_data_duk = response.not_yet_duk_data;

			var sent_content = jQuery('.modal-sent-content');
			sent_content.html('');
			if (sent_data.length == 0) {
				sent_content.html("<?php echo azlang('No data');?>");
			}
			jQuery(sent_data).each(function(adata, bdata) {
				sent_content.append("<div class='list-content'>"+(adata + 1)+". "+bdata+"</div>");
			});


			var not_yet_content = jQuery('.modal-not-yet-content');
			not_yet_content.html('');
			if (not_yet_data.length == 0) {
				not_yet_content.html("<?php echo azlang('No data');?>");
			}
			jQuery(not_yet_data).each(function(adata, bdata) {
				not_yet_content.append("<div class='list-content'>"+(adata + 1)+". "+bdata+"</div>");
			});

			jQuery('.box-home-duk').html(response.txtduk);
			jQuery('.box-home-employment').html(response.txtemployment);

			var sent_content_duk = jQuery('.modal-sent-content-duk');
			sent_content_duk.html('');

			if (sent_data_duk.length == 0) {
				sent_content_duk.html("<?php echo azlang('No data');?>");
			}
			jQuery(sent_data_duk).each(function(adata, bdata) {
				sent_content_duk.append("<div class='list-content'>"+(adata + 1)+". "+bdata+"</div>");
			});

			var not_yet_content_duk = jQuery('.modal-not-yet-content-duk');
			not_yet_content_duk.html('');
			if (not_yet_data_duk.length == 0) {
				not_yet_content_duk.html("<?php echo azlang('No data');?>");
			}
			jQuery(not_yet_data_duk).each(function(adata, bdata) {
				not_yet_content_duk.append("<div class='list-content'>"+(adata + 1)+". "+bdata+"</div>");
			});
		},
		error: function(response) {
			console.log(response);
		}
	});
}

function generate(response) {
	jQuery("#pieChart").remove();
	jQuery(".pie-chart").append('<canvas id="pieChart" style="height:250px"></canvas>');
    var pieChartCanvas = jQuery("#pieChart").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas);
    var PieData = [
      {
        value: response.official,
        color: "#CC3333",
        highlight: "#CC3333",
        label: "<?php echo azlang('OFFICIAL');?>"
      },
      {
        value: response.jfu,
        color: "#FFFF66",
        highlight: "#FFFF66",
        label: "<?php echo azlang('JFU');?>"
      },
      {
        value: response.jft,
        color: "#b1b0ad",
        highlight: "#b1b0ad",
        label: "<?php echo azlang('JFT');?>"
      },
      {
        value: response.tkk,
        color: "#2196f3",
        highlight: "#2196f3",
        label: "<?php echo azlang('TKK');?>"
      },
    ];

    var pieOptionsx = {
    	tooltipTemplate: "<%= value %>",
	    onAnimationComplete: function()
	    {
	        this.showTooltip(this.segments, true);
	    },
	    tooltipEvents: [],
	    showTooltips: true
	};
    var pieOptions = {
		segmentShowStroke: true,
		segmentStrokeColor: "#fff",
		segmentStrokeWidth: 2,
		percentageInnerCutout: 50, // This is 0 for Pie charts
		animationSteps: 100,
		animationEasing: "easeOutBounce",
		animateRotate: true,
		animateScale: false,
		responsive: true,
		maintainAspectRatio: true,
		legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>",
		tooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
		onAnimationComplete: function() {
			this.showTooltip(this.segments, true);
		},
	    tooltipEvents: [],
	    showTooltips: true
    };
    pieChart.Doughnut(PieData, pieOptions);



	$("#barChart").remove();
	$(".bar-chart").append('<canvas id="barChart" style="height:350px"></canvas>');

	var areaChartData = {
	  labels: ["<?php echo azlang('Official');?>", "JFU", "JFT", "TKK"],
	  datasets: [
	    {
	      fillColor: [
	      	"#cc3333",
	      	"#ffff66",
	      	"#b1b0ad",
	      	"#2196f3"
	      ],
	      strokeColor: "rgba(210, 214, 222, 1)",
	      pointColor: "rgba(210, 214, 222, 1)",
	      pointStrokeColor: "#c1c7d1",
	      pointHighlightFill: "#fff",
	      pointHighlightStroke: "rgba(220,220,220,1)",
	      data: [response.official, response.jfu, response.jft, response.tkk]
	    }
	  ],
	};


	var barChartCanvas = $("#barChart").get(0).getContext("2d");
	var barChart = new Chart(barChartCanvas);
	var barChartData = areaChartData;

	var barChartOptions = {
		animation: true,
	    responsive : true,
	    tooltipTemplate: "<%= value %>",
	    tooltipFillColor: "rgba(0,0,0,0)",
	    tooltipFontColor: "#444",
	    tooltipEvents: [],
	    tooltipCaretSize: 0,
	    onAnimationComplete: function()
	    {
	        this.showTooltip(this.datasets[0].bars, true);
	    }
	};

	barChartOptions.datasetFill = false;
	barChart.Bar(barChartData, barChartOptions);
}
