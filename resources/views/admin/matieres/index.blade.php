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
					<div class="card-header d-flex justify-content-between" style="background: #696969;border-top-left-radius:10px;border-top-right-radius: 10px; ">
						<h6 class="card-title text-white ml-2 ">
							<i class="fas fa-bell"></i>
							<b class="ml-2">Les Modules Disponibles</b>
						</h6>
						<button type="button" class="btn btn-white btn-border" data-toggle="modal"data-target="#newMatiere"><i class="fas fa-plus-square mr-2"></i> Ajout Matière</button>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table  class="display table table-striped table-hover datatables">
								<thead class="text-center bg-info text-white">
									<tr>
										<th>N°</th>
										<th>NOM DU MODULE</th>
										<th>ACTIONS</th>
									</tr>
								</thead>
								<tbody>
									<?php $i =1; ?>
									@foreach($data as $matiere)
									<tr>
										<td>{{$i++}}</td>
										<td>{{$matiere->matieres}}</td>
										<td class="text-center">
											<a href="{{route('editMatiere',$matiere->id)}}" id="editMat" class="btn btn-primary btn-sm ml-2"><i class="fas fa-edit"></i></a>
											<a href="{{ route('supprimeMatiere',$matiere->id)}}" class="btn btn-danger btn-sm ml-3" onclick="return confirm('Voulez-vous bien la supprimer ?')"><i class="fas fa-trash"></i></a>
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

<div class="modal fade" id="newMatiere" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header bg-info text-white">
				<h1>Ajout Nouvelle Matière</h1>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span class="text-white" aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" action="{{ route('AjoutMatiere') }}">
				@csrf
				<div class="modal-body">
					<div class="form-group">
						<label>Matière</label>
						<input type="text" name="matiere" class="form-control" placeholder="Ajouter une matière" required="">
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" id="addMat" class="btn btn-info">Ajouter</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection


	