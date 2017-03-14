<div class="menuWrapper">
	<div class="menu">
		<ul>
			<li class="<?php if($selectedPage == 'aktuality') echo 'active'; ?>"><a href="/" ><i class="fa fa-fw fa-home"></i> Aktuality</a></li>
			<li class="<?php if($selectedPage == 'onas') echo 'active'; ?>"><a href="onas.php" ><i class="fa fa-fw fa-info"></i> O nás (kontakty)</a></li>
			<li class="haSub <?php if($selectedPage == 'souteze') echo 'active'; ?>"><a href="#"><i class="fa fa-fw fa-trophy"></i> Soutěže +</a>
				<ul class="sub">
					<li><a href="extraliga.php">• Extraliga - naše hráčky</a></li>
					<li><a href="1liga.php">• 1. liga - naše hráčky</a></li>
					<li><a href="mladez.php">• Mládež</a></li>
				</ul>
			</li>
			<li class="<?php if($selectedPage == 'fotogalerie') echo 'active'; ?>"><a href="fotogalerie.php"><i class="fa fa-fw fa-picture-o"></i> Fotogalerie</a></li>
			<li class="<?php if($selectedPage == 'napsalionas') echo 'active'; ?>"><a href="napsalionas.php"><i class="fa fa-fw fa-reply"></i> Napsali o nás</a></li>
			<li class="<?php if($selectedPage == 'treningy') echo 'active'; ?>"><a href="treningy.php"><i class="fa fa-fw fa-futbol-o"></i> Tréninky</a></li>
			<li class="<?php if($selectedPage == 'sponzori') echo 'active'; ?>"><a href="sponzori.php"><i class="fa fa-fw fa-euro"></i> Sponzoři</a></li>
		</ul>
	</div>
</div>