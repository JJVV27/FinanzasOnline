<?php 
	include('server/funciones.php');
	$title = 'Acerca de';
	include('includes/head.php'); 
?>
<body>
	<header>
		<?php 
		$index_link = "index.php"; 
		$acercade_link = "#";
		$comofunciona_link = "comofunciona.php";
		$login_link = "login.php";
		include('includes/menu.php'); ?>
	</header>
	<section class="pic-finance fluid-row">

	</section>
	<section class="container acercade-section">
		<div class="center span11">
			<div id="acercade-content">
				<aside id="acercade-menu" class="span3">
					<ul>
						<li id="link-historia" class="link-acercade active-acercade">Historia</li>
						<li id="link-objetivos" class="link-acercade">Objetivos</li>
						<li id="link-mision" class="link-acercade">Misión y Visión</li>
						<li class="img-logo-acercade"></li>
					</ul>
				</aside>
				<article id="historia" class="span8  show article">
					<h2>Finanzas Online, una solución para tiempos de crisis</h2>
					<div class="content-ad">
						<p>La compañía se establece en Julio del 2013 y nace de un proyecto académico desarrollado por Guillermo Fernández. La idea inicial se enfoca en querer solucionar una problemática social. </p>
						<p>Con la caída de los mercados financieros más importantes del mundo en los últimos años, y la pobre situación económica que afecta a la región hispana, se busco crear una aplicación que ayude a la gente en tiempos de crisis. </p>
						<p>Después de un periodo de estudio se decide crear FinanzasOnline.com, una aplicación web que permite a sus usuarios sacar el máximo provecho a sus ingresos económicos. Este emprendimiento web siempre tuvo una mentalidad visionaria para establecerse como una de las mejores aplicaciones del mercado.</p>
					</div>
				</article>
				<article id="objetivo" class="span8  hide article">
					<h2>Objetivo General</h2>
					<div class="content-ad">
						<p>Desarrollar una aplicación financiera, que funcione sobre una arquitectura web,  para ofrecer diferentes servicios que permitan de una manera completa y sencilla llevar un control dinámico de las finanzas personales de un usuario.</p>				
					</div>
					<h2>Objetivos especifícos</h2>
					<div class="content-ad">
						<ul>
							<li>Organizar las finanzas personales de nuestros usuarios, para mejorar su 		calidad de vida.</li>
							<li>Ofrecer información detallada, para que las personas puedan conocer su 		estado financiero actual.</li>
						</ul>
					</div>
				</article>
				<article id="mision" class="span8 hide article">
					<h2>Misión</h2>
					<div class="content-ad">
						<p>Ofrecer un servicio a través de la Web, que permita a cualquier usuario administrar, monitorear, y gestionar sus finanzas de manera práctica y segura. Para contribuir a mejorar la situación económica de nuestros clientes.</p>				
					</div>
					<h2>Visión</h2>
					<div class="content-ad">
						<p>Consolidarnos como una aplicación Web líder en la región hispana, que sea pionera, se mantenga en constante crecimiento, y su desarrollo este a la ar de las últimas tendencias tecnológicas, para innovar y ofrecer el mejor servicio posible para nuestros usuarios.</p>
					</div>
				</article>
			</div>
		</div>
	</section>
	<?php include('includes/footer.html'); ?>
</body>
</html>