@extends('admin.layouts.app')
@section('content')
	<div class="page-inner">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-2 mx-2">
					<a href="{{route('droit')}}" class="btn btn-default"><i class="fas fa-arrow-alt-circle-left fa-2x"></i></a>
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
					<div class="card-header" style="border-top-left-radius:10px;background: #696969;border-top-right-radius: 10px; ">
						<h6 class="card-title text-white text-center">
							Modification du Droit
						</h6>
					</div>
					<div class="card-body">
						<form method="POST" action="{{ route('modifieDroit',$data->id) }}">
							@csrf
							<div class="form-group">
								<label>Type de droit</label>
								<input type="text" name="type" class="form-control" value="{{$data->types}}" required="">
							</div>
							<div class="form-group">
								<label class="text-white">montant :</label>
								<input type="number" name="montant" class="form-control" value="{{$data->montant}}" required="">
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-block text-white" style="background: #696969;"><b>Enregistrer</b></button>
							</div>
						</form>
					</div>				
				</div>
			</div>
		</div>
	</div>

@endsection


	