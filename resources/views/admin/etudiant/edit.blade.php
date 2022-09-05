@extends('admin.layouts.app')
@section('content')
	<div class="page-inner">
		<div class="row">
			<div class="col-md-12 m-0 p-0">
				<div class="card">
					@if(session()->has('message'))
	                    <div class="alert alert-success text-success text-center">
	                      <button type="button" class="close text-success" data-dismiss="alert">&times;</button>
	                      <b class="text-center">{{session()->get('message')}}</b>
	                    </div>
	                @elseif(session()->has('modifie'))
	                	<div class="alert alert-success text-success text-center">
	                      <button type="button" class="close text-success" data-dismiss="alert">&times;</button>
	                      <b class="text-center">{{session()->get('modifie')}}</b>
	                    </div>
                    @endif
					<div class="card-header d-flex justify-content-between bg-success-gradient" style="border-top-left-radius:10px;border-top-right-radius: 10px; ">
						<h6 class="card-title text-white ml-2 ">
							<i class="fas fa-user-edit"></i>
							<b class="ml-2">Modification des informations d'un étudiant</b>
						</h6>
					</div>
					<div class="card-body">
						<form method="POST" action="{{route('modifieEtudiant',$etudiant->id)}}" enctype="multipart/form-data">
							@csrf
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label>Nom :</label>
										<input type="text" name="nom" value="{{$etudiant->nom}}" class="form-control"  required="">
									</div>
									<div class="form-group">
										<label>Adresse :</label>
										<input type="text" name="adresse" value="{{$etudiant->adresse}}" class="form-control" required="">
									</div>
									<div class="form-group">
										<label>Nom du Père :</label>
										<input type="text" name="pere" value="{{$etudiant->pere}}" class="form-control" required="">
									</div>
									<div class="form-group">
										<label>Année Scolaire :</label>
										<input type="text" name="anneeScolaire" value="{{$etudiant->annee_scolaire}}" class="form-control" required="">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Prénom :</label>
										<input type="text" name="prenom" value="{{$etudiant->prenom}}" class="form-control" required="">
									</div>
									<div class="form-group">
										<label>Nationalité :</label>
										<input type="text" name="nationalite" class="form-control" value="{{$etudiant->nationalite}}" required="">
									</div>
									<div class="form-group">
										<label>Nom de la mère :</label>
										<input type="text" name="mere" value="{{$etudiant->mere}}" class="form-control" required="">
									</div>
									<div class="form-group">
										<label>Réduction :</label>
										<input type="number" name="reduction" value="{{$etudiant->reduction}}" class="form-control"  required="">
									</div>
									
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Matricule :</label>
										<input type="text" name="matricule" value="{{$etudiant->matricule}}" class="form-control" required="">
									</div>
									<div class="form-group">
										<label>Sexe :</label>
										<select class="form-control" name="sexe" class="form-control" required="">
											<option value="Garçon" @if($etudiant->sexe =="Garçon") echo "selected"; @endif>Garçon</option>
											<option value="Fille" @if($etudiant->sexe == "Fille") echo "selected"; @endif>Fille</option>
										</select>
									</div>
									<div class="form-group">
										<label>Contact primaire:</label>
										<input type="number" name="contact1" value="{{$etudiant->contact1}}" class="form-control" required="">
									</div>
									<div class="form-group">
										<label>Maladie Particulière:</label>
										<input type="text" name="maladie" value="{{$etudiant->maladie}}" class="form-control" required="">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Date de Naissance:</label>
										<input type="date" name="dateNais" value="{{$etudiant->date_naissance}}" class="form-control" required="">
									</div>
									<div class="form-group">
										<label>Classe :</label>
										<select class="form-control" name="classe" class="form-control" required="">
											@foreach($classes as $classe)
												@if($classe->id == $etudiant->classe)
												<option value="{{$classe->id}}" selected="">{{$classe->classes}}</option>
												@else
												<option value="{{$classe->id}}">{{$classe->classes}}</option>
												@endif
											@endforeach
										</select>
									</div>
									<div class="form-group">
										<label>Contact Sécondaire:</label>
										<input type="number" name="contact2" value="{{$etudiant->contact2}}" class="form-control" required="">
									</div>
									<div class="form-group">
										<img src="/etudiantPhotos/{{$etudiant->photo}}" class="img-thumbnail" width="120" height="120">
										<label>Nouveau Photo :</label>
										<input type="file" name="photo" required="" class="form-control">
									</div>
									<button class="btn btn-success btn-block mt-2" type="submit">Enregistrer</button>
								</div>
							</div>
						</form>
					</div>				
				</div>
			</div>
		</div>
	</div>

@endsection


	