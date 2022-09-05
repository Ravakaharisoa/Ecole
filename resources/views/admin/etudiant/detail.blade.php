@extends('admin.layouts.app')
@section('content')
	<div class="page-inner">
		<div class="row">
			<div class="col-md-12 shadow-lg">
				<h1 class="text-success font-weight-bold my-2" style="font-size: 27px;">Détail d'un étudiant ayant le matricule : <b class="text-dark">{{$etudiant->matricule}}</b></h1>
				<hr>
				<div class="row col-md-12 p-3">
					<div class="col-md-6">
						<h2 class="font-weight-bold" style="font-size: 23px;">INFORMATIONS GENERALES</h2>
						<p>Nom : <b>{{$etudiant->nom}}</b></p>
						<p>Prénoms : <b>{{$etudiant->prenom}}</b></p>
						<p>Sexe : <b>{{$etudiant->sexe}}</b></p>
						<p>Date de naissance : <b>{{$etudiant->date_naissance}}</b></p>
						@foreach($classes as $classe)
							@if($classe->id == $etudiant->classe)
							<p>Classe : <b>{{$classe->classes}}</b></p>
							@endif
						@endforeach
						<p>Nationalité : <b>{{$etudiant->nationalite}}</b></p>
						<p>Adresse : <b>{{$etudiant->adresse}}</b></p>
						<p>Maladie Particulière : <b>{{$etudiant->maladie}}</b></p>
						<br>
						<hr>
						<p>Nom du père : <b>{{$etudiant->pere}}</b></p>
						<p>Nom de la mère : <b>{{$etudiant->mere}}</b></p>
						<p>Contact Primaire : <b>{{$etudiant->contact1}}</b></p>
						<p>Contact Secondaire : <b>{{$etudiant->contact2}}</b></p>
						<hr>
					</div>
					<div class="col-md-6">
						<p class="p-3 m-2">
							<img src="/etudiantPhotos/{{$etudiant->photo}}" width="150" height="150" class="img-thumbnail">
						</p>
						<p>Année Scolaire : <b>{{$etudiant->annee_scolaire}}</b></p><br>
						<h2 class="font-weight-bold" style="font-size: 23px;">Paiement de la scolarité</h2>
						<hr>
						<p>Scolarité à payer :</p>
						<p>Scolarité Payée : <b>{{$etudiant->reduction}}</b></p>
						<p>Reste à Payer :</p>
						<hr><br>
						<p>Absence :</p>
						<hr>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection