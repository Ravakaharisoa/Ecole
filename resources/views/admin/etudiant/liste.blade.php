@extends('admin.layouts.app')
@section('content')
	<div class="page-inner">
		<div class="row">
			<div class="col-md-12 p-0 m-0">
				<div class="card">
					@if(session()->has('delete'))
	                	<div class="alert alert-danger text-danger text-center animated bounceInDown">
	                      <button type="button" class="close text-danger" data-dismiss="alert">&times;</button>
	                      <b class="text-center">{{session()->get('delete')}}</b>
	                    </div>
                    @endif
					<div class="card-header d-flex justify-content-between bg-success-gradient" style="border-top-left-radius:10px;border-top-right-radius: 10px;">
						<h6 class="card-title ml-2 text-white">
							<i class="fas fa-user"></i>
							<b class="ml-2">Liste des étudiants</b>
						</h6>
					</div>
					<div class="card-body m-0 p-0">
						<div class="table-responsive mt-1 m-0 p-0">
							<table  class="display table table-striped table-hover datatables">
								<thead class="text-center text-white" style="background: #696969;">
									<tr>
										<th>N°</th>
										<th>PHOTO</th>
										<th>MATRICULE</th>
										<th>NOM</th>
										<th>PRENOM</th>
										<th>CLASSE</th>
										<th>REDUCTION</th>
										<th>ACTIONS</th>
									</tr>
								</thead>
								<tbody class="text-center">
									@foreach($data as $etudiant)
									<tr>
										<td>{{$i++}}</td>
										<td><img src="etudiantPhotos/{{$etudiant->photo}}" class="img-thumbnail" width="80" height="80"></td>
										<td>{{$etudiant->matricule}}</td>
										<td>{{$etudiant->nom}}</td>
										<td>{{$etudiant->prenom}}</td>							
										<td>{{$etudiant->classes}}</td>
										<td>{{$etudiant->reduction}}</td>
										<td>
											<a href="{{route('editEtudiant',$etudiant->id)}}" class="text-success"><i class="fas fa-edit"></i></a>
											<a href="{{route('supprimerEtudiant',$etudiant->id)}}" class="text-danger ml-1" onclick="return confirm('Voulez-vous bien la supprimer ?')"><i class="fas fa-trash"></i></a>
											<a href="{{route('detailEtudiant',$etudiant->id)}}" class="text-info ml-1"><i class="fas fa-info-circle"></i></a>
										</td>
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

@endsection


