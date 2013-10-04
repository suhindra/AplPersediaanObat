<!-- Flot charts --> 
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>asset/js/plugins/flot/jquery.flot.js"></script> 
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>asset/js/plugins/flot/jquery.flot.resize.js"></script> 

<!-- Custom made scripts for this template --> 
<script src="<?php echo base_url();?>asset/js/scripts.js" type="text/javascript"></script> 
<script type="text/javascript">

    // Assign our dataset data to a variable
 
var data = <?php echo json_encode($dataset1); ?>;

var dataset = [
    { data: data, label : 'Stok'}
];

var ticks = <?php echo json_encode($dataset2); ?>;


var options = {
    series: {
        lines: {
                    show: true
                },
    },
    lines: {
        align: "center",
        barWidth: 0.5
    },
    xaxis: {
        
        axisLabelUseCanvas: true,
        axisLabelFontSizePixels: 12,
        axisLabelFontFamily: 'Verdana, Arial',
        axisLabelPadding: 10,
        ticks: ticks
        
    },
    yaxis: {
        
        axisLabelUseCanvas: true,
        axisLabelFontSizePixels: 12,
        axisLabelFontFamily: 'Verdana, Arial',
        axisLabelPadding: 3,
        tickFormatter: function (v, axis) {
            return v ;
        }
    },
    legend: {
        noColumns: 1,
        labelBoxBorderColor: "#000000",
        
    },
    grid: {
	autoHighlight: true,
        hoverable: true,
        borderWidth: 2,        
        
    }
};

$(document).ready(function () {
    $.plot($("#placeholder"), dataset, options);    
    $("#placeholder").UseTooltip();
});




function gd(year, month, day) {
    return new Date(year, month, day).getTime();
}

var previousPoint = null, previousLabel = null;

$.fn.UseTooltip = function () {
    $(this).bind("plothover", function (event, pos, item) {
        if (item) {
            if ((previousLabel != item.series.label) || (previousPoint != item.dataIndex)) {
                previousPoint = item.dataIndex;
                previousLabel = item.series.label;
                $("#tooltip").remove();

                var x = item.datapoint[0];
                var y = item.datapoint[1];

                var color = item.series.color;

                //console.log(item.series.xaxis.ticks[x].label);                
                
                showTooltip(item.pageX,
                        item.pageY,
                        color,
                        "<strong>" + item.series.label + "</strong><br>" + item.series.xaxis.ticks[x].label + " : <strong>" + y );                
            }
        } else {
            $("#tooltip").remove();
            previousPoint = null;
        }
    });
};

function showTooltip(x, y, color, contents) {
    $('<div id="tooltip">' + contents + '</div>').css({
        position: 'absolute',
        display: 'none',
        top: y - 55,
        left: x - 40,
        border: '2px solid ' + color,
        padding: '3px',
        'font-size': '9px',
        'border-radius': '5px',
        'background-color': '#fff',
        'font-family': 'Verdana, Arial, Helvetica, Tahoma, sans-serif',
        opacity: 0.9
    }).appendTo("body").fadeIn(200);
}


</script>
</body>
</html>
