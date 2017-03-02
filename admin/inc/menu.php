<header id="head">
	<div class="left">
		<a href="/">
			<h1>Medi<span class="colored">Care</span></h1>
		</a>
	</div>

	<div class="right">
		<div class="menu">
			<a <?php if($selectedPage == 'index') echo 'class="selected"'; ?> href="/admin"><i class="fa fa-home" aria-hidden="true"></i> Administrace</a>
			<a <?php if($selectedPage == 'profile') echo 'class="selected"'; ?> href="profile.php"><i class="fa fa-user" aria-hidden="true"></i> Profil (ID: <?php echo $ID ?>)</a>
			<a <?php if($selectedPage == 'logout') echo 'class="selected"'; ?> href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Odhlásit</a>
		</div>
	</div>
</header>