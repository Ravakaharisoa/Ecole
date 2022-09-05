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
					<div class="card-header d-flex justify-content-between bg-info" style="border-top-left-radius:10px;border-top-right-radius: 10px; ">
						<h6 class="card-title text-white ml-2 ">
							<i class="fas fa-bell"></i>
							<b class="ml-2">Les Classes Disponibles</b>
						</h6>
						<button type="button" class="btn btn-white btn-border" data-toggle="modal"data-target="#newClasse"><i class="fas fa-plus-square mr-2"></i> Ajout Classe</button>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table  class="display table table-striped table-hover datatables">
								<thead class="text-center text-white" style="background: #696969;">
									<tr>
										<th>N°</th>
										<th>NOM DE CLASSE</th>
										<th>ACTIONS</th>
									</tr>
								</thead>
								<tbody class="text-center">
									<?php $i=1; ?>
									@foreach($data as $classe)
									<tr>
										<td>{{$i++}}</td>
										<td>{{$classe->classes}}</td>
										<td>
											<a href="{{route('editClasse',$classe->id)}}"  class="btn btn-info btn-sm ml-2"><i class="fas fa-edit"></i></a>
											<a href="{{route('supprClasses',$classe->id)}}" class="btn btn-danger btn-sm ml-3" onclick="return confirm('Voulez-vous bien la supprimer ?')"><i class="fas fa-trash"></i></a>
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

<div class="modal fade" id="newClasse" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header bg-primary text-white">
				<h1>Ajout Nouvelle Classe</h1>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span class="text-white" aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" action="{{ route('AjoutClasse')}}">
				@csrf
				<div class="modal-body">
					<div class="form-group">
						<label>Classe :</label>
						<input type="text" name="classe" class="form-control" placeholder="Ajouter une classe" required="">
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Ajouter</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection


	