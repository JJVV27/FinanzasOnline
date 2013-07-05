<script type="text/javascript">
  $(function() {
    $( "#from" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 1,
      onClose: function( selectedDate ) {
        $( "#to" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#to" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 1,
      onClose: function( selectedDate ) {
        $( "#from" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
  });

  $(document).ready(function () {
            var theme = getDemoTheme();
            // prepare the data
            var data = generatedata(20);
            var source =
            {
                localdata: data,
                datatype: "array",
                datafields:
                [
                    { name: 'firstname', type: 'string' },
                    { name: 'lastname', type: 'string' },
                    { name: 'productname', type: 'string' },
                    { name: 'price', type: 'number' }
                ],
                updaterow: function (rowid, rowdata, commit) {
                    // synchronize with the server - send update command
                    // call commit with parameter true if the synchronization with the server is successful 
                    // and with parameter false if the synchronization failder.
                    commit(true);
                }
            };
            // initialize the input fields.
            $("#firstName").jqxInput({ theme: theme });
            $("#lastName").jqxInput({ theme: theme });
            $("#product").jqxInput({ theme: theme });
        
            $("#firstName").width(150);
            $("#firstName").height(23);
            $("#lastName").width(150);
            $("#lastName").height(23);
            $("#product").width(150);
            $("#product").height(23);
            $("#price").jqxNumberInput({symbol: '$', width: 150, height: 23, theme: theme, spinButtons: true });
            var dataAdapter = new $.jqx.dataAdapter(source);
            var editrow = -1;
            // initialize jqxGrid
            $("#jqxgrid").jqxGrid(
            {
                width: '100%',
                source: dataAdapter,
                theme: theme,
                pageable: false,
                autoheight: true,
                columns: [
                  { text: 'Fecha', datafield: 'firstname', width: '15%' },
                  { text: 'Descripción', datafield: 'lastname', width: '50%' },
                  { text: 'Categoría', datafield: 'productname', width: '10%' },
                  { text: 'Monto', datafield: 'price', width: '10%', cellsalign: 'right', cellsformat: 'c2' },
                  { text: 'Editar', datafield: 'Edit', width: '15%', columntype: 'button', cellsrenderer: function () {
                     return "Editar";
                  }, buttonclick: function (row) {
                     // open the popup window when the user clicks a button.
                     editrow = row;
                     var offset = $("#jqxgrid").offset();
                     $("#popupWindow").jqxWindow({ position: { x: parseInt(offset.left) + 60, y: parseInt(offset.top) + 60 } });
                     // get the clicked row's data and initialize the input fields.
                     var dataRecord = $("#jqxgrid").jqxGrid('getrowdata', editrow);
                     $("#firstName").val(dataRecord.firstname);
                     $("#lastName").val(dataRecord.lastname);
                     $("#product").val(dataRecord.productname);
                     $("#price").jqxNumberInput({ decimal: dataRecord.price });
                     // show the popup window.
                     $("#popupWindow").jqxWindow('open');
                 }
                 }
                ]
            });
            // initialize the popup window and buttons.
            $("#popupWindow").jqxWindow({
                width: 250, resizable: false, theme: theme, isModal: true, autoOpen: false, cancelButton: $("#Cancel"), modalOpacity: 0.01           
            });
            $("#popupWindow").on('open', function () {
                $("#firstName").jqxInput('selectAll');
            });
         
            $("#Cancel").jqxButton({ theme: theme });
            $("#Save").jqxButton({ theme: theme });
            // update the edited row when the user clicks the 'Save' button.
            $("#Save").click(function () {
                if (editrow >= 0) {
                    var row = { firstname: $("#firstName").val(), lastname: $("#lastName").val(), productname: $("#product").val(),
                        price: parseFloat($("#price").jqxNumberInput('decimal'))
                    };
                    var rowID = $('#jqxgrid').jqxGrid('getrowid', editrow);
                    $('#jqxgrid').jqxGrid('updaterow', rowID, row);
                    $("#popupWindow").jqxWindow('hide');
                }
            });
        });

</script>
<section id="transacciones" class="span7">
	<div id="transacciones-top">
		<!--<div id="total-cash" class="top-tr">
			<span class="total-tr strong">Total Cash</span>
			<span class="total-tr green strong">$4,280</span>
		</div>
		<div id="total-pagar" class="top-tr">
			<span class="total-tr strong">Total a pagar</span>
			<span class="total-tr red strong">$235</span>
		</div>-->
		<div id="datepicker">
			<label for="from">Desde</label>
			<input type="text" id="from" name="from" />
			<label class="space-dp" for="to">Hasta</label>
			<input type="text" id="to" name="to" />
			<a class="btn" href="#">Filtrar</a>
		</div>
		<div id="mostrando-tr" class="top-tr">
			<span class="mst">Mostrando <span class="strong">15</span> transacciones</span>
		</div>
	</div>
</section>
<section id="right-info-tr" class="span4">
	<div id="search-data">
		<input type="text" />
		<a class="btn" href="#">Buscar</a>
	</div>
	<div id="agregar-tr">
		<a class="btn" href="#"><i class="icon-plus"></i> Agregar transacción</a>
	</div>
</section>
<section id="data-grid" class="span12">
	<div id="jqxWidget">
        <div id="jqxgrid"></div>
        <div style="margin-top: 30px;">
            <div id="cellbegineditevent"></div>
            <div style="margin-top: 10px;" id="cellendeditevent"></div>
       </div>
       <div id="popupWindow">
            <div>Editar</div>
            <div style="overflow: hidden;">
                <table>
                    <tr>
                        <td align="right">Fecha:</td>
                        <td align="left"><input id="firstName" /></td>
                    </tr>
                    <tr>
                        <td align="right">Descripción:</td>
                        <td align="left"><input id="lastName" /></td>
                    </tr>
                    <tr>
                        <td align="right">Categoría:</td>
                        <td align="left"><input id="product" /></td>
                    </tr>
                    <tr>
                        <td align="right">Monto:</td>
                        <td align="left"><div id="price"></div></td>
                    </tr>
                    <tr>
                        <td align="right"></td>
                        <td style="padding-top: 10px;" align="right"><input style="margin-right: 5px;" type="button" id="Save" value="Grabar" /><input id="Cancel" type="button" value="Cancelar" /></td>
                    </tr>
                </table>
            </div>
       </div>
       </div>
</section>
<section id="no-soporte">
	<h4>No hay soporte para esta resolución</h4>
	<p>Por favor utilice la version web.</p>
</section>
