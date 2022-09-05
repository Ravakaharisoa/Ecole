@extends('admin.layouts.app')
@section('content')
	<div class="page-inner">
		<div class="row">
			<div class="col-md-12 shadow-lg">
				<h1 class="text-primary page-title font-weight-bold p-3">Détail du Professeur ayant le matricule : <b class="text-dark">{{$professeur->matricule}}</b></h1>
				<hr>
				<div class="row">
					<div class="col-md-12  d-flex">
						<div class="col-md-3 m-3 p-3">
							<img src="/profsPhotos/{{$professeur->photo}}" class="img-thumbnail" width="200" height="200">
						</div>
						<div class="col-md-8 p-2 m-1">
							<ul class="list-group">
								<li class="list-group-item">
									<div class="col-md-6">Nom :</div>
									<div class="col-md-6 font-weight-bold">{{$professeur->nom}}</div>
								</li>
								<li class="list-group-item">
									<div class="col-md-6">Prénom :</div>
									<div class="col-md-6 font-weight-bold">{{$professeur->prenom}}</div>
								</li>
								<li class="list-group-item">
									<div class="col-md-6">Adresse :</div>
									<div class="col-md-6 font-weight-bold">{{$professeur->adresse}}</div>
								</li>
								<li class="list-group-item">
									<div class="col-md-6">Date de Naissance :</div>
									<div class="col-md-6 font-weight-bold">{{$professeur->date_naissance}}</div>
								</li>
								<li class="list-group-item">
									<div class="col-md-6">Carte d'identité Nationale : </div>
									<div class="col-md-6 font-weight-bold">{{$professeur->cin}}</div>
								</li>
								<li class="list-group-item">
									<div class="col-md-6">Nationalité : </div>
									<div class="col-md-6 font-weight-bold">{{$professeur->nationalite}}</div>
								</li>
								<li class="list-group-item">
									<div class="col-md-6">Sexe : </div>
									<div class="col-md-6 font-weight-bold">{{$professeur->sexe}}</div>
								</li>
								<li class="list-group-item">
									<div class="col-md-6">Contact Primaire :</div>
									<div class="col-md-6 font-weight-bold">{{$professeur->contact1}}</div>
								</li>
								<li class="list-group-item">
									<div class="col-md-6">Contact Sécondaire :</div>
									<div class="col-md-6 font-weight-bold">{{$professeur->contact2}}</div>
								</li>
								<li class="list-group-item">
									<div class="col-md-6">Matière :</div>
									@foreach($matieres as $matiere)
									@if($professeur->Id_matiere == $matiere->id)
									<div class="col-md-6 font-weight-bold">{{$matiere->matieres}}</div>
									@endif
									@endforeach
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection