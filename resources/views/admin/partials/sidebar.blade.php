<div class="sidebar sidebar-style-2" data-background-color="dark2">			
	<div class="sidebar-wrapper scrollbar scrollbar-inner">
		<div class="sidebar-content">
			<div class="user">
				<div class="info text-center">
					{{ Auth::user()->name }}
					<br>
					{{ Auth::user()->email }}
				</div>
			</div>
			<ul class="nav nav-primary">
				<li class="nav-item active">
					<a  href="{{route('Accueil')}}" id="accueil">
						<i class="fas fa-home"></i>
						<p>Accueil</p>
					</a>
				</li>
				<hr>
				<li class="nav-item">
					<a data-toggle="collapse" href="#etudiant">
						<i class="fas fa-user-graduate"></i>
						<p>Etudiants</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="etudiant">
						<ul class="nav nav-collapse">
							<li>
								<a href="{{route('inscription')}}">
									<span class="sub-item">Nouvelle Inscription</span>
								</a>
							</li>
							<li>
								<a href="{{route('listeEtudiant')}}">
									<span class="sub-item">Liste des élèves</span>
								</a>
							</li>
							
						</ul>
					</div>
				</li>
				<li class="nav-item">
					<a data-toggle="collapse" href="#notes">
						<i class="fab fa-neos"></i>
						<p>Notes</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="notes">
						<ul class="nav nav-collapse">
							<li>
								<a href="{{route('notes')}}">
									<span class="sub-item">Ajout Notes</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="nav-item">
					<a data-toggle="collapse" href="#matiere">
						<i class="fab fa-medium"></i>
						<p>Matières</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="matiere">
						<ul class="nav nav-collapse">
							<li>
								<a href="{{ route('matiere') }}">
									<span class="sub-item">Matières existantes</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="nav-item">
					<a data-toggle="collapse" href="#classe">
						<i class="fas fa-briefcase"></i>
						<p>Classes</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="classe">
						<ul class="nav nav-collapse">
							<li>
								<a href="{{route('classe')}}">
									<span class="sub-item">Classes existantes</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="nav-item">
					<a data-toggle="collapse" href="#exam">
						<i class="fab fa-etsy"></i>
						<p>Examen</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="exam">
						<ul class="nav nav-collapse">
							<li>
								<a href="{{route('examen')}}">
									<span class="sub-item">Examen existants</span>
								</a>
							</li>
							<li>
								<a href="{{route('saison')}}">
									<span class="sub-item">Saison d'examen</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="nav-item">
					<a data-toggle="collapse" href="#payement">
						<i class="fas fa-dollar-sign"></i>
						<p>Scolarité</p>
						<span class="caret"></span>
					</a>
              		<div class="collapse" id="payement">
						<ul class="nav nav-collapse">
							<li>
								<a href="{{route('droit')}}">
									<span class="sub-item">Droits de Scolaire</span>
								</a>
							</li>
                  			<li>
								<a href="{{route('payement')}}">
									<span class="sub-item">Payement de Scolarité</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
            	<li class="nav-item">
					<a data-toggle="collapse" href="#prof">
						<i class="fas fa-user"></i>
						<p>Professeur</p>
						<span class="caret"></span>
					</a>
              		<div class="collapse" id="prof">
						<ul class="nav nav-collapse">
							<li>
								<a href="{{route('professeur')}}">
									<span class="sub-item">Nouveau Professeur</span>
								</a>
							</li>
                  			<li>
								<a href="{{route('listeProfesseur')}}">
									<span class="sub-item">Liste de Professeurs</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
			</ul>
		</div>
	</div>
</div>