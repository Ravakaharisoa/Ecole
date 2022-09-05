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
					<div class="card-header d-flex justify-content-between bg-success-gradient" style="border-top-left-radius:10px;border-top-right-radius: 10px; ">
						<h6 class="card-title text-white ml-2 ">
							<i class="fas fa-bell"></i>
							<b class="ml-2">Les Saisons Disponibles dans cet école</b>
						</h6>
						<button type="button" class="btn btn-white btn-border" data-toggle="modal"data-target="#newSaison"><i class="fas fa-plus-square mr-2"></i> Ajout Saison</button>
					</div>
					<div class="card-body">
						<div class="col-md-8 m-auto">
							<ul class="list-group">
								@foreach($data as $saison)
				                <li class="list-group-item">
				                	<div class="col-md-2">{{$i++}}</div>
				                	<div class="col-md-7">
				                		<b>{{$saison->saisons}}</b>
				                	</div>
				                	<div class="col-md-3">
				                		<a href="{{route('editSaison',$saison->id)}}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
				                		<a href="{{route('supprimeSaison',$saison->id)}}" class="btn btn-sm btn-danger ml-2" onclick="return confirm('Voulez-vous bien la supprimer ?')"><i class="fas fa-trash-alt"></i></a>
				                	</div>
				                </li>
				                @endforeach
				           </ul>
						</div>
					</div>				
				</div>
			</div>
		</div>
	</div>

<div class="modal fade" id="newSaison" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header bg-success-gradient text-white">
				<h1>Ajout Nouvelle Saison</h1>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span class="text-white" aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" action="{{route('ajoutSaison')}}">
				@csrf
				<div class="modal-body">
					<div class="form-group">
						<label>Saison</label>
						<input type="text" name="saison" class="form-control" placeholder="Ajouter une saison" required="">
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit"  class="btn btn-success">Ajouter</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
	