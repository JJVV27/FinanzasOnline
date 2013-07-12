<div id="menu" class="row-fluid">
	<div class="container">
		<div class="center span11">
			<figure class="span4" id="logo">
				<a href="general.php"><img src="img/logo.png" alt="Finanzas Online Logo" /></a>
			</figure>
			<nav id="menu-app" class="span8">
				<ul>
					<li><a href=<?php echo '"'.$general_link.'"'?> class="link">General</a></li>
					<li><a href=<?php echo '"'.$perfil_link.'"'?> class="link">Perfil</a></li>
					<li class="btn-cs">
						<form action="logout.php" method="post">
							<button id="btn-cs"><span>Cerrar Sesión</span></button>
						</form>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</div>