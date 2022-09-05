@extends('admin.layouts.app')
@section('content')
	<div class="page-inner">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-2 mx-2">
					<a href="{{route('classe')}}" class="btn btn-default"><i class="fas fa-arrow-alt-circle-left fa-2x"></i></a>
				</div>
			</div>
			<div class="col-md-12 py-5">
				<div class="card col-md-6 m-auto">
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
					<div class="card-header bg-primary" style="border-top-left-radius:10px;border-top-right-radius: 10px; ">
						<h6 class="card-title text-white text-center">
							Modification de le Classe
						</h6>
					</div>
					<div class="card-body">
						<form method="POST" action="{{ route('modifieClasse',$data->id) }}">
							@csrf
							<div class="form-group">
								<label>Classe :</label>
								<input type="text" name="classe" class="form-control" value="{{$data->classes}}" required="">
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block"><b>Enregistrer</b></button>
							</div>
						</form>
					</div>				
				</div>
			</div>
		</div>
	</div>

@endsection


	