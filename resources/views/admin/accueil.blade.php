@extends('admin.layouts.app')
@section('content')
	<div class="panel-header bg-primary-gradient">
		<div class="page-inner py-5">
			<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
				<div>
					<h4 class="page-title text-white">Accueil</h4>
				</div>
			</div>
		</div>
	</div>
    <div class="page-inner mt--5">
		<div class="row mt--3">
			<div class="col-sm-6 col-lg-3">
				<div class="card p-3">
					<div class="d-flex align-items-center">
						<span class="stamp stamp-md bg-success mr-3 p-2">
							<i class="fa fa-users fa-2x"></i>
						</span>
						<div>
							<h4 class="mb-1"><b><a href="#">{{$inscrit}}</a></b></h4>
							<h5 class="font-weight-bold">Inscrits</h5>
						</div>
					</div>
				</div>
			</div>
            <div class="col-sm-6 col-lg-3">
				<div class="card p-3">
					<div class="d-flex align-items-center">
						<span class="stamp stamp-md bg-warning mr-3 p-1">
							<i class="fas fa-male fa-2x"></i>
						</span>
						<div>
							<h4 class="mb-1"><b><a href="#">{{$garcon}}</a></b></h4>
							<h5 class="font-weight-bold">Garçons</h5>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-lg-3">
				<div class="card p-3">
					<div class="d-flex align-items-center">
						<span class="stamp stamp-md bg-danger mr-3 p-1">
							<i class="fas fa-female fa-2x"></i>
						</span>
						<div>
							<h4 class="mb-1"><b><a href="#">{{$fille}}</a></b></h4>
							<h5 class="font-weight-bold">Filles</h5>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-lg-3">
				<div class="card p-3">
					<div class="d-flex align-items-center">
						<span class="stamp stamp-md bg-secondary mr-3 p-2">
							<i class="fas fa-toolbox fa-2x"></i>
						</span>
						<div>
							<h4 class="mb-1"><b><a href="#">{{$classe}}</a></b></h4>
							<h5 class="font-weight-bold">Classes<h5>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
    <div class="page-inner mt--5">
    	<div class="row row-card-no-pd mt--2">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="card-head-row card-tools-still-right">
							<h4 class="card-title ml-3">
								<i class="far fa-bell text-info"></i>
								<b class="text-info ml-2">10 dernières élèves inscrits</b>
							</h4>
						</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="table-responsive">
								<table class="table table-striped table-hover">
									<thead class="bg-info text-white">
										<tr>
											<th scope="col">MATRICULE</th>
											<th scope="col">NOM</th>
											<th scope="col">PRENOMS</th>
											<th scope="col">DATE DE NAISSANCE</th>
											<th scope="col">SEXE</th>
											<th scope="col">CLASSE</th>
										</tr>
									</thead>
									<tbody>
										@foreach($etudiants as $etudiant)
										<tr>
											<td>{{$etudiant->matricule}}</td>
											<td>{{$etudiant->nom}}</td>
											<td>{{$etudiant->prenom}}</td>
											<td>{{$etudiant->date_naissance}}</td>
											<td>{{$etudiant->sexe}}</td>
											<td>{{$etudiant->classes}}</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>

@endsection


	