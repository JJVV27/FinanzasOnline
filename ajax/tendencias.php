 <script type="text/javascript">
$(document).ready(function () {
            var theme = getDemoTheme();
            // prepare the data
            var data = generatedata(15);
            var customsortfunc = function (column, direction) {
                var sortdata = new Array();
                if (direction == 'ascending') direction = true;
                if (direction == 'descending') direction = false;
                if (direction != null) {
                    for (i = 0; i < data.length; i++) {
                        sortdata.push(data[i]);
                    }
                }
                else sortdata = data;
                var tmpToString = Object.prototype.toString;
                Object.prototype.toString = (typeof column == "function") ? column : function () { return this[column] };
                if (direction != null) {
                    sortdata.sort(compare);
                    if (!direction) {
                        sortdata.reverse();
                    }
                }
                source.localdata = sortdata;
                $("#jqxgrid").jqxGrid('databind', source, 'sort');
                Object.prototype.toString = tmpToString;
            }
            // custom comparer.
            var compare = function (value1, value2) {
                value1 = String(value1).toLowerCase();
                value2 = String(value2).toLowerCase();
                try {
                    var tmpvalue1 = parseFloat(value1);
                    if (isNaN(tmpvalue1)) {
                        if (value1 < value2) { return -1; }
                        if (value1 > value2) { return 1; }
                    }
                    else {
                        var tmpvalue2 = parseFloat(value2);
                        if (tmpvalue1 < tmpvalue2) { return -1; }
                        if (tmpvalue1 > tmpvalue2) { return 1; }
                    }
                }
                catch (error) {
                    var er = error;
                }
                return 0;
            };
            var source =
            {
                localdata: data,
                sort: customsortfunc,
                datafields:
                [
                    { name: 'firstname', type: 'string' },
                    { name: 'price', type: 'number' }
                ],
                datatype: "array"
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#jqxgrid").jqxGrid(
            {
                width: 260,
                source: dataAdapter,
                theme: theme,
                sortable: true,
                pageable: false,
                autoheight: true,
                ready: function () {
                    $("#jqxgrid").jqxGrid('sortby', 'firstname', 'asc');
                },
                columns: [
                  { text: 'Lugar', datafield: 'firstname', width: '70%' },
                  { text: 'Gasto', datafield: 'price', width: '30%', cellsalign: 'right', cellsformat: 'c2' }
                ]
            });

          $( "#slider" ).slider({
      range: "max",
      min: 1,
      max: 12,
      value: 2,
      slide: function( event, ui ) {
        $( "#amount" ).val( ui.value );
      }
    });
    $( "#amount" ).val( $( "#slider" ).slider( "value" ) );

     // prepare chart data as an array
            var source =
            {
                datatype: "csv",
                datafields: [
                    { name: 'Browser' },
                    { name: 'Share' }
                ],
                url: 'data/mobile_browsers_share_dec2011.txt'
            };
            var dataAdapter = new $.jqx.dataAdapter(source, { async: false, autoBind: true, loadError: function (xhr, status, error) { alert('Error loading "' + source.url + '" : ' + error); } });
            // prepare jqxChart settings
            var settings = {
                title: "",
                description: "",
                enableAnimations: true,
                showLegend: true,
                legendLayout: { left: 380, top: 20, width: 300, height: 200, flow: 'vertical' },
                padding: { left: 5, top: 5, right: 5, bottom: 5 },
                titlePadding: { left: 0, top: 0, right: 0, bottom: 10 },
                source: dataAdapter,
                colorScheme: 'scheme03',
                seriesGroups:
                    [
                        {
                            type: 'pie',
                            showLabels: true,
                            series:
                                [
                                    { 
                                        dataField: 'Share',
                                        displayText: 'Browser',
                                        labelRadius: 120,
                                        initialAngle: 15,
                                        radius: 95,
                                        centerOffset: 0,
                                        formatSettings: { sufix: '%', decimalPlaces: 1 }
                                    }
                                ]
                        }
                    ]
            };
            // setup the chart
            $('#jqxChart').jqxChart(settings);
        });
</script>

<section id="tendencias-top">
	<h3>Tus gastos</h3>
	<div class="data-tendencias-top">
		<span>Total $320</span>
		<span class="right">Julio 2013</span>
	</div>
</section>
<section class="row-fluid">
	<section id="pie-chart" class="span7">
		<div id='host' style="margin: 0 auto; width:100%; height: 400px;">
       		 <div id='jqxChart' style="width: 100%; height: 400px; position: relative; left: 0px;
            top: 0px;">
        </div>
    	</div>
	</section>
	<section id="data-grid-tendencias" class="span4">
	  <div id='jqxWidget' style="font-size: 13px; font-family: Verdana; float: right;">
        <div id="jqxgrid">
        </div>
        <div id="eventslog" style="display: none; margin-top: 30px;">
            <div style="float: left;">
                Event Log:
                <div style="border: none;" id="events">
                </div>
            </div>
            <div style="float: left;">
                Sort Details:
                <div id="sortinfo">
                </div>
            </div>
        </div>
    </div>
	</section>
</section>
<section id="slider-content" class="span12">
	<div id="meses">
		<span class="primer-mes">Enero</span>
		<span class="febrero">Febrero</span>
		<span class="marzo">Marzo</span>
		<span class="abril">Abril</span>
		<span class="mayo">Mayo</span>
		<span class="junio">Junio</span>
		<span class="julio">Julio</span>
		<span class="agosto">Agosto</span>
		<span class="sept">Septiembre</span>
		<span class="oct">Octubre</span>
		<span class="nov">Nov</span>
		<span class="dic">Dic</span>
	</div>
	<div id="slider"></div>
</section>