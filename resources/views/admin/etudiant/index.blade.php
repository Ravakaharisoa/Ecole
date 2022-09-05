@extends('admin.layouts.app')
@section('content')
	<div class="page-inner">
		<div class="row">
			<div class="col-md-12 m-0 p-0">
				<div class="card">
					@if(session()->has('success'))

                    <div class="alert alert-success text-success text-center">
                      <button type="button" class="close text-success" data-dismiss="alert">&times;</button>
                      <b class="text-center">{{session()->get('success')}}</b>
                    </div>
                    @elseif(session()->has('erreur'))
                    	<div class="alert alert-warning text-warning text-center">
	                      <button type="button" class="close text-warning" data-dismiss="alert">&times;</button>
	                      <b class="text-center">{{session()->get('erreur')}}</b>
	                    </div>
	                @elseif(session()->has('delete'))
	                	<div class="alert alert-danger text-danger text-center">
	                      <button type="button" class="close text-danger" data-dismiss="alert">&times;</button>
	                      <b class="text-center">{{session()->get('delete')}}</b>
	                    </div>
                    @endif
					<div class="card-header d-flex justify-content-between bg-success-gradient" style="border-top-left-radius:10px;border-top-right-radius: 10px; ">
						<h6 class="card-title text-white ml-2 ">
							<i class="fas fa-user-plus"></i>
							<b class="ml-2">Nouvelle Inscription d'étudiant</b>
						</h6>
					</div>
					<div class="card-body">
						<form method="POST" action="{{route('inscrire')}}" enctype="multipart/form-data">
							@csrf
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label>Nom :</label>
										<input type="text" name="nom" class="form-control"  required="">
									</div>
									<div class="form-group">
										<label>Adresse :</label>
										<input type="text" name="adresse" class="form-control" required="">
									</div>
									<div class="form-group">
										<label>Nom du Père :</label>
										<input type="text" name="pere" class="form-control" required="">
									</div>
									<div class="form-group">
										<label>Année Scolaire :</label>
										<input type="text" name="anneeScolaire" class="form-control" required="">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Prénom :</label>
										<input type="text" name="prenom" class="form-control" required="">
									</div>
									<div class="form-group">
										<label>Nationalité :</label>
										<input type="text" name="nationalite" class="form-control"  required="">
									</div>
									<div class="form-group">
										<label>Nom de la mère :</label>
										<input type="text" name="mere" class="form-control" required="">
									</div>
									<div class="form-group">
										<label>Réduction :</label>
										<input type="number" name="reduction" class="form-control"  required="">
									</div>
									
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Matricule :</label>
										<input type="text" name="matricule" class="form-control" required="">
									</div>
									<div class="form-group">
										<label>Sexe :</label>
										<select class="form-control" name="sexe" class="form-control" required="">
											<option selected="" disabled="">Choisir un sexe</option>
											<option value="Garçon">Garçon</option>
											<option value="Fille">Fille</option>
										</select>
									</div>
									<div class="form-group">
										<label>Contact primaire:</label>
										<input type="number" name="contact1" class="form-control" required="">
									</div>
									<div class="form-group">
										<label>Maladie Particulière:</label>
										<input type="text" name="maladie" class="form-control" required="">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Date de Naissance:</label>
										<input type="date" name="dateNais" class="form-control" required="">
									</div>
									<div class="form-group">
										<label>Classe :</label>
										<select class="form-control" name="classe" class="form-control" required="">
											<option selected="" disabled="">Sélectionnez une classe</option>
											@foreach($classes as $classe)
											<option value="{{$classe->id}}">{{$classe->classes}}</option>
											@endforeach
										</select>
									</div>
									<div class="form-group">
										<label>Contact Sécondaire:</label>
										<input type="number" name="contact2" class="form-control" required="">
									</div>
									<div class="form-group">
										<label>Photo :</label>
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


	