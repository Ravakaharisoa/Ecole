@extends('admin.layouts.app')
@section('content')
	<div class="panel-header bg-success-gradient">
		<div class="page-inner py-3">
			<div class="">
				@if(session()->has('success'))
                    <div class="alert alert-success text-success text-center animated bounceInDown">
                      <button type="button" class="close text-success" data-dismiss="alert">&times;</button>
                      <b class="text-center">{{session()->get('success')}}</b>
                    </div>
                    @elseif(session()->has('erreur'))
                    	<div class="alert alert-warning text-warning text-center animated bounceInDown">
	                      <button type="button" class="close text-warning" data-dismiss="alert">&times;</button>
	                      <b class="text-center">{{session()->get('erreur')}}</b>
	                    </div>
	                @elseif(session()->has('delete'))
	                	<div class="alert alert-danger text-danger text-center animated bounceInDown">
	                      <button type="button" class="close text-danger" data-dismiss="alert">&times;</button>
	                      <b class="text-center">{{session()->get('delete')}}</b>
	                    </div>
                    @endif
				<div class="text-white">
					<h1 class="page-title text-white">Ajout Nouveau Examen</h1>
					<form method="POST" action="{{route('AjoutExamen')}}">
						@csrf
						<div class="row col-md-12">
							<div class="form-group col-md-4">
								<label class="text-white">Type d'examen' :</label>
								<input class="form-control" type="text" name="type" placeholder="Ajouter un type d'examen" required="">
							</div>
							<div class="form-group col-md-4">
								<label class="text-white">Saison d'examen :</label>
								<select class="form-control" name="Saison" required="">
									<option  disabled="" selected>Choisissez une saison d'examen</option>
									@foreach($saison as $saisons)
									<option value="{{$saisons->id}}">{{$saisons->saisons}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group col-md-4"><br>
								<button type="submit" class="btn btn-white btn-border btn-block mt-2"><i class="fas fa-plus-square mr-2"></i><b>Ajouter</b></button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="page-inner">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between" style="border-top-left-radius:10px;border-top-right-radius: 10px;color: #696969;">
						<h6 class="card-title ml-2 ">
							<i class="fas fa-bell"></i>
							<b class="ml-2">Les droits Disponibles</b>
						</h6>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table  class="display table table-striped table-hover datatables">
								<thead class="text-center text-white" style="background: #696969;">
									<tr>
										<th>N°</th>
										<th>TYPE D'EXAMEN</th>
										<th>SAISON D'EXAMEN</th>
										<th>ACTIONS</th>
									</tr>
								</thead>
								<tbody class="text-center">

									<?php $indice =1; ?>
									@foreach($examen as $examens)
									<tr>
										<td>{{$indice++}}</td>
										<td>{{$examens->type_examen}}</td>
										<td>{{$examens->saisons}}</td>
										<td>
											<a href="{{route('editExamen',$examens->id)}}" class="btn btn-success btn-sm ml-2"><i class="fas fa-edit"></i></a>
											<a href="{{route('supprimerExam',$examens->id) }}" class="btn btn-danger btn-sm ml-3" onclick="return confirm('Voulez-vous bien la supprimer ?')"><i class="fas fa-trash"></i></a>
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


	