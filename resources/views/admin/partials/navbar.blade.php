<div class="main-header">
	<div class="logo-header" data-background-color="blue2">
		<a href="{{ route('Accueil') }}" class="logo text-center">
			<b class="text-white" style="font-size: 23px;">GeSchool</b>
		</a>
		<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon">
				<i class="icon-menu"></i>
			</span>
		</button>
		<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
		<div class="nav-toggle">
			<button class="btn btn-toggle toggle-sidebar">
				<i class="icon-menu"></i>
			</button>
		</div>
	</div>

	<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue">
		<div class="container-fluid">
			<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
            	<li class="nav-item">
              		<x-app-layout>
    
				    </x-app-layout>
			   </li>
			</ul>
		</div>
	</nav>
</div>