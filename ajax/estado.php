<section id="estado-general" class="span4">
	<div id="acordeon-estado">
		<h3>Tu cuenta <div class="icon-app"></div><span class="editar-info-general">Editar</span></h3>
		<div>
			<span class="horizontal-alineado pad strong">Patrimonio</span><span class="horizontal-alineado pad derecha strong">$67,290</span>
		</div>
		<h3>Total ingreso fijo</h3>
		<div>
			<span class="horizontal-alineado pad strong">Sueldo</span><span class="horizontal-alineado pad derecha strong">$3,500</span>
		</div>
		<h3>Total egresos fijos</h3>
		<div>
			<p><span class="horizontal-alineado">Pago luz</span> <span class="horizontal-alineado  primer-egreso derecha">$15</span></p>
			<p><span class="horizontal-alineado">Pago Agua</span> <span class="horizontal-alineado  derecha">$12</span></p>
			<p><span class="horizontal-alineado">Pago Cable</span> <span class="horizontal-alineado  derecha">$22</span></p>
			<p><span class="horizontal-alineado">Pago Alquiler</span> <span class="horizontal-alineado  derecha">$280</span></p>
			<p><span class="horizontal-alineado">Pago Telefono</span> <span class="horizontal-alineado  derecha">$19</span></p>
			<p><span class="horizontal-alineado">Pago internet</span> <span class="horizontal-alineado  derecha">$29</span></p>
			<p><span class="horizontal-alineado">Pago presupuestos</span> <span class="horizontal-alineado  derecha">$290</span></p>
			<p class="total"><span class="horizontal-alineado strong">Total</span> <span class="horizontal-alineado derecha strong">$667</span></p>
			<div id="agregar-ie" class="btn-group">
				<button class="btn"></span>Nuevo ingreso</button>
				<button class="btn"></span>Nuevo egreso</button>
			</div>
		</div>
		<h3>Salud financiera</h3>
		<div>
			<span class="horizontal-alineado pad">Ingresos vs Egresos</span> <span class="horizontal-alineado derecha pad strong">$2833</span>
			<div id="barra-sf" class="progress">
				<div id="ingresos-barra" class="bar bar-success"></div>
				<div id="egresos-barra" class="bar bar-danger"></div>
			</div>
		</div>
	</div>
</section>
<section  id="col-derecha-estado" class="span7">
	<div class="acordeon-estado-derecha">
		<h3>Alertas <div class="icon-app icon-alerta-app"></div><span class="editar-info-general editar-alertas-general">Configuracion alertas</span></h3>
		<div>
			<div class="alert alert-error">
				 <button type="button" class="close" data-dismiss="alert">&times;</button>
					<h4>Pago expirado!</h4> <span>El pago de su factura de luz ha expirado</span>
			</div>
			<div class="alert alert-block">
				 <button type="button" class="close" data-dismiss="alert">&times;</button>
					<h4>Cerca de fecha limite!</h4> <span>El pago de su factura de luz ha expirado</span>
			</div>
			<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
				 <h4>Pago completado!</h4> <span>El pago de su factura de luz ha expirado</span>
			</div>
		</div>
	</div>
	<div class="acordeon-estado-derecha">
		<h3>Mis presupuestos</h3>
		<div id="presupuestos">
			<div id="presupuestos-content">
				<div class="presupuesto"> 
					<h4>Compras</h4>
					<div  class="barra-presupuesto progress">
						<div id="presupuesto-uno-barra" class="bar bar-warning"></div>
					</div>
					<span class="monto-presupuesto">$60</span>
					<span class="close-presupuesto"></span>
				</div>
				<div class="presupuesto"> 
					<h4>Comida</h4>
					<div  class="barra-presupuesto progress">
						<div id="presupuesto-dos-barra" class="bar bar-danger"></div>
					</div>
					<span class="monto-presupuesto">$140</span>
					<span class="close-presupuesto"></span>
				</div>
				<div class="presupuesto"> 
					<h4>Entretenimiento</h4>
					<div  class="barra-presupuesto progress">
						<div id="presupuesto-tres-barra" class="bar bar-success"></div>
					</div>
					<span class="monto-presupuesto">$90</span>
					<span class="close-presupuesto"></span>
				</div>
			</div>
				<div id="agregar-presupuesto" class="btn-group">
					<button class="btn">Nuevo presupuesto</button>
					<button class="btn">Tendencias de gastos</button>
				</div>
		</div>
	</div>
</section>
