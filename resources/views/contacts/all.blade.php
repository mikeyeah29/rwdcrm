@extends('../layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">

		<div class="col-12">
            
			<div class="stats mt-5">
				<p>Call Stats</p>

				<div class="stat-bar d-flex">
					<div class="stat-inner stat-bar__green" style="width: {{ $stats['positive'] }}%;">{{ round($stats['positive']) }}%</div>
					<div class="stat-inner stat-bar__orange" style="width: {{ $stats['no_interest'] }}%;">{{ round($stats['no_interest']) }}%</div>
					<div class="stat-inner stat-bar__red" style="width: {{ $stats['negative'] }}%;">{{ round($stats['negative']) }}%</div>
					<div class="stat-inner stat-bar__grey" style="width: {{ $stats['no_answer'] }}%;">{{ round($stats['no_answer']) }}%</div>
				</div>
				<div class="d-flex mb-4 justify-content-center">
					<div class="key d-flex align-middle">
						<span class="key__color stat-bar__green"></span>
						<p class="key__title">Positive</p>
					</div>
					<div class="key d-flex">
						<span class="key__color stat-bar__orange"></span>
						<p class="key__title">No Interest</p>
					</div>
					<div class="key d-flex">
						<span class="key__color stat-bar__red"></span>
						<p class="key__title">Negitive</p>
					</div>
					<div class="key d-flex">
						<span class="key__color stat-bar__grey"></span>
						<p class="key__title">No answer</p>
					</div>
				</div>

				<p>Contacted: {{ $total_contacted }}</p>
			</div>

			<div class="actions-bar d-flex justify-content-between align-items-center">	
				<div class="d-flex">
					<div class="mr-3">
						<label>Show:</lable>
						<select class="form-control">
							<option>All</option>
							<option>Contacted</option>
							<option>Uncontacted</option>
						</select>
					</div>
					<div>
						<label>Industry:</lable>
						<select class="form-control">
							<option>vfdvd</option>
							<option>vfdv</option>
							<option>vdfvfd</option>
						</select>
					</div>
				</div>
				<a class="btn" href="{{ route('contacts/add') }}">Add Contact</a>
			</div>

			<table class="table long-table">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Company</th>
						<th scope="col">Website</th>
						<th scope="col">Phone</th>
						<th scope="col">Email</th>
						<th scope="col">Industry</th>
						<th scope="col">Contacted</th>
						<th scope="col">Actions</th>
					</tr>
				</thead>
				<tbody>


					@foreach($contacts as $index => $contact)

						<?php if(isset($_GET['page'])){ $index = ($index + 1) + (($_GET['page'] - 1) * 30); }else{ $index = $index + 1; } ?>

						<tr class="contact-bg__{{ $contact->response }}">
							<th scope="row">{{ $index }}</th>
							<td>{{ $contact->company }}</td>
							<td><a href="{{ $contact->website }}">{{ $contact->website }}</a></td>
							<td>{{ $contact->number }}</td>
							<td>{{ $contact->email }}</td>
							<td>{{ $contact->industry }}</td>
							<td><input type="checkbox" data-id="{{ $contact->id }}" class="form-control" style="height: auto; width: auto;" {{ $contact->response != 'not_contacted' ? 'checked' : '' }}></td>
							<td class="actions d-flex">
								<a href="contacts/{{ $contact->id }}" class="icon icon-view mr-2"></a>
								<a href="contacts/{{ $contact->id }}/edit" class="icon icon-edit mr-2"></a>
								<form method="POST" action="contacts/{{ $contact->id }}">
									@method('DELETE')
									@csrf
									<button class="icon icon-delete"></button>
								</form>
							</td>
						</tr>

					@endforeach

				</tbody>
			</table>

			{{ $contacts->links() }}

        </div>

    </div>
</div>

<div class="modal-container" id="lb-modal--mark-contacted">
	<div class="mr_modal mr_modal--mark-contacted">

		<form id="respone-form" method="POST" action="">
			@csrf
			<div class="mr_modal__body">
				<h3>What was the response?</h3>
				<select class="form-control" name="response">
					<option value="not_contacted">Not Contacted</option>
					<option value="positive">positive</option>
					<option value="not_interested">not interested</option>
					<option value="negative">negative</option>
					<option value="no_answer">no answer</option>
				</select>
				<button type="submit" class="btn">Submit</button>
			</div>
			
		</form>

	</div>
</div>

@if($errors->any())
	<div class="error-box">
	    <div class="row">
	    	<div class="col-12">
	    		@foreach($errors->all() as $error)

	    			<div class="error-box__msg">{{ $error }}</div>

	    		@endforeach
	    	</div>
	    </div>
	</div>
@endif

@endsection
