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
					<div class="card-header d-flex justify-content-between bg-info-gradient" style="border-top-left-radius:10px;border-top-right-radius: 10px; ">
						<h6 class="card-title text-white ml-2 ">
							<i class="fas fa-plus-circle"></i>
							<b class="ml-2">Ajout des notes pour chaque étudiant</b>
						</h6>
					</div>
					<div class="card-body">
						<form method="POST" action="{{route('ajoutNote')}}" enctype="multipart/form-data">
							@csrf
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Nom d'étudiant :</label>
										<select class="form-control" name="etudiant" required="">
											<option disabled="" selected="">Sélectionnez un étudiant</option>
											@foreach($etudiants as $etudiant)
											<option value="{{$etudiant->id}}">{{$etudiant->matricule}} | {{$etudiant->nom}} {{$etudiant->prenom}}</option>
											@endforeach
										</select>
									</div>
									
									<div class="form-group">
										<label>Examen :</label>
										<select class="form-control" name="examen" required="">
											<option disabled="" selected="">Sélectionnez un examen</option>
											@foreach($exam as $examen)
											<option value="{{$examen->id}}">{{$examen->type_examen}} | {{$examen->saisons}}</option>
											@endforeach
										</select>
									</div>
									<div class="form-group">
										<label>Coéfficient :</label>
										<input type="number" name="coeff" class="form-control" required="">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Matière :</label>
										<select class="form-control" name="matiere" required="">
											<option disabled="" selected="">Sélectionnez une matière</option>
											@foreach($matieres as $matiere)
											<option value="{{$matiere->id}}">{{$matiere->matieres}}</option>
											@endforeach
										</select>
									</div>
									<div class="form-group">
										<label>Notes :</label>
										<input type="number" name="note" class="form-control" required="">
									</div>
									<div class="form-group">
										<br>
										<button type="submit" class="btn btn-success btn-block">Ajouter</button>
									</div>
									
								</div>
								
							</div>
						</form>
					</div>				
				</div>
			</div>
		</div>
	</div>

@endsection


	