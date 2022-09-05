@extends('admin.layouts.app')
@section('content')
	<div class="page-inner">
		<div class="row">
			<div class="col-md-12">
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
					<div class="card-header d-flex justify-content-between bg-primary-gradient" style="border-top-left-radius:10px;border-top-right-radius: 10px; ">
						<h6 class="card-title text-white ml-2 ">
							<i class="fas fa-user-edit"></i>
							<b class="ml-2">Modification des informations du Professeur</b>
						</h6>
					</div>
					<div class="card-body">
						<form method="POST" action="{{route('modifieProfes',$professeur->id)}}" enctype="multipart/form-data">
							@csrf
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>Nom :</label>
										<input type="text" name="nom" class="form-control" value="{{$professeur->nom}}"  required="">
									</div>
									<div class="form-group">
										<label>Nationalité :</label>
										<input type="text" name="nationalite" class="form-control" value="{{$professeur->nationalite}}"  required="">
									</div>
									<div class="form-group">
										<label>Sexe :</label>
										<select class="form-control" name="sexe" class="form-control" required="">
											@if($professeur->sexe=="Homme")
											<option value="Homme" selected="">Homme</option>
											@elseif($professeur->sexe=="Femme")
											<option value="Femme" selected="">Femme</option>
											@endif
										</select>
									</div>
									<div class="form-group">
										<label>Contact Sécondaire:</label>
										<input type="number" name="contact2" value="{{$professeur->contact2}}" class="form-control" required="">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Prénom :</label>
										<input type="text" name="prenom" class="form-control" value="{{$professeur->prenom}}" required="">
									</div>
									<div class="form-group">
										<label>Adresse :</label>
										<input type="text" name="adresse" value="{{$professeur->adresse}}" class="form-control" required="">
									</div>
									<div class="form-group">
										<label>CIN :</label>
										<input type="number" name="cin" value="{{$professeur->cin}}" class="form-control"  required="">
									</div>
									<div class="form-group">
										<label>Matière :</label>
										<select class="form-control" name="matiere" class="form-control" required="">
											@foreach($matieres as $matiere)
												@if($professeur->Id_matiere == $matiere->id)
												<option value="{{$matiere->id}}" selected="">{{$matiere->matieres}}</option>
												@else
												<option value="{{$matiere->id}}">{{$matiere->matieres}}</option>
												@endif
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Matricule :</label>
										<input type="text" name="matricule" value="{{$professeur->matricule}}" class="form-control" required="">
									</div>
									<div class="form-group">
										<label>Date de Naissance:</label>
										<input type="date" name="dateNais" value="{{$professeur->date_naissance}}" class="form-control" required="">
									</div>
									<div class="form-group">
										<label>Contact primaire:</label>
										<input type="number" name="contact1" class="form-control" value="{{$professeur->contact1}}" required="">
									</div>
									<div class="form-group">
										<label>Ancien Photo :</label>
										<img src="/profsPhotos/{{$professeur->photo}}" class="img-thumbnail" width="120" height="120">
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


	