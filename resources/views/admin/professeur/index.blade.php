@extends('admin.layouts.app')
@section('content')
	<div class="page-inner">
		<div class="row">
			<div class="col-md-12">
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
					<div class="card-header d-flex justify-content-between bg-primary-gradient" style="border-top-left-radius:10px;border-top-right-radius: 10px; ">
						<h6 class="card-title text-white ml-2 ">
							<i class="fas fa-user-plus"></i>
							<b class="ml-2">Ajout Nouveau Professeur</b>
						</h6>
					</div>
					<div class="card-body">
						<form method="POST" action="{{route('ajoutProfs')}}" enctype="multipart/form-data">
							@csrf
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>Nom :</label>
										<input type="text" name="nom" class="form-control"  required="">
									</div>
									<div class="form-group">
										<label>Nationalité :</label>
										<input type="text" name="nationalite" class="form-control"  required="">
									</div>
									<div class="form-group">
										<label>Sexe :</label>
										<select class="form-control" name="sexe" class="form-control" required="">
											<option selected="" disabled="">Choisir un sexe</option>
											<option value="Homme">Homme</option>
											<option value="Femme">Femme</option>
										</select>
									</div>
									<div class="form-group">
										<label>Contact Sécondaire:</label>
										<input type="number" name="contact2" class="form-control" required="">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Prénom :</label>
										<input type="text" name="prenom" class="form-control" required="">
									</div>
									<div class="form-group">
										<label>Adresse :</label>
										<input type="text" name="adresse" class="form-control" required="">
									</div>
									<div class="form-group">
										<label>CIN :</label>
										<input type="number" name="cin" class="form-control"  required="">
									</div>
									<div class="form-group">
										<label>Matière :</label>
										<select class="form-control" name="matiere" class="form-control" required="">
											@foreach($matieres as $matiere)
											<option value="{{$matiere->id}}">{{$matiere->matieres}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Matricule :</label>
										<input type="text" name="matricule" class="form-control" required="">
									</div>
									<div class="form-group">
										<label>Date de Naissance:</label>
										<input type="date" name="dateNais" class="form-control" required="">
									</div>
									<div class="form-group">
										<label>Contact primaire:</label>
										<input type="number" name="contact1" class="form-control" required="">
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


	