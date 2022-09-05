@extends('admin.layouts.app')
@section('content')
	<div class="panel-header bg-primary-gradient">
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
					<h1 class="page-title text-white">Ajout Nouveau Payement</h1>
					<form method="POST" action="{{route('nouveauPay')}}">
						@csrf
						<div class="row col-md-12">
							<div class="form-group col-md-3">
								<label class="text-white">Nom d'Etudiant :</label>
								<select class="form-control" name="etudiant" required="">
									<option disabled="" selected="">Sélectionnez un étudiant</option>
									@foreach($etudiants as $etudiant)
									<option value="{{$etudiant->id}}">{{$etudiant->matricule}} | {{$etudiant->nom}} {{$etudiant->prenom}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group col-md-3">
								<label class="text-white">Type du Droit :</label>
								<select class="form-control" name="typeDroit" required="">
									<option selected="" disabled="">Choisissez un droit</option>
									@foreach($droits as $droit)
									<option value="{{$droit->id}}">{{$droit->types}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group col-md-3">
								<label class="text-white">Date de Payement :</label>
								<input type="date" name="datePay" class="form-control" required="">
							</div>
							<div class="form-group col-md-3"><br>
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
			<div class="card col-md-12">
				<div class="card-header d-flex justify-content-between" style="border-top-left-radius:10px;border-top-right-radius: 10px; ">
					<h6 class="card-title text-info ml-2 ">
						<i class="fas fa-bell"></i>
						<b class="ml-2">Les droits Disponibles</b>
					</h6>
				</div>
				<div class="card-body m-0 p-0">
					<div class="table-responsive">
						<table  class="display table table-striped table-hover datatables">
							<thead class="text-center text-white" style="background: #696969;">
								<tr>
									<th>N°</th>
									<th>NOM D'ELEVES</th>
									<th>CLASSE</th>
									<th>TYPE DE PAYEMENT</th>
									<th>MONTANT</th>
									<th>DATE DE PAYEMENT</th>
								</tr>
							</thead>
							<tbody>
								@foreach($payement as $pay)
								<tr>
									<td>{{$indice++}}</td>
									<td>{{$pay->nom}} {{$pay->prenom}}</td>
									<td>{{$pay->classes}}</td>
									<td>{{$pay->types}}</td>
									<td>{{$pay->montant}}</td>
									<td>{{$pay->date_pay}}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>				
			</div>
		</div>
	</div>

@endsection


	