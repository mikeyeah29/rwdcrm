@extends('../layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

		<div class="col-12">
            
			<h1>Edit Contact</h1>

			<form action="{{ route('contacts') }}/{{ $contact->id }}" method="POST">
				@csrf()

				<div class="row">
					<div class="col-12 col-md-6">
						<div class="form-group">
							<label>Company</label>
							<input type="text" class="form-control {{ $errors->has('company') ? 'border border-danger' : '' }}" name="company" placeholder="Enter company" value="{{ $contact->company }}">
						</div>
					</div>
					<div class="col-12 col-md-6">
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" name="name" placeholder="Enter name" value="{{ $contact->name }}">
						</div>
					</div>
					<div class="col-12 col-md-6">
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" name="email" placeholder="Enter email" value="{{ $contact->email }}">
						</div>
					</div>
					<div class="col-12 col-md-6">
						<div class="form-group">
							<label>Number</label>
							<input type="text" class="form-control" name="number" placeholder="Enter number" value="{{ $contact->number }}">
						</div>
					</div>
					<div class="col-12 col-md-6">
						<div class="form-group">
							<label>Website</label>
							<input type="text" class="form-control" name="website" placeholder="Enter website" value="{{ $contact->website }}">
						</div>
					</div>
					<div class="col-12 col-md-6">
						<div class="form-group">
							<label>Industry</label>
							<select class="form-control" name="industry">
								<option value="Architect" {{ $contact->industry == 'Architect' ? 'selected' : '' }}>Architect</option>
								<option value="Cake Makers" {{ $contact->industry == 'Cake Makers' ? 'selected' : '' }}>Cake Makers</option>
								<option value="Car Dealership" {{ $contact->industry == 'Car Dealership' ? 'selected' : '' }}>Car Dealership</option>
								<option value="Care Home" {{ $contact->industry == 'Care Home' ? 'selected' : '' }}>Care Home</option>
								<option value="Decorator" {{ $contact->industry == 'Decorator' ? 'selected' : '' }}>Decorator</option>
								<option value="Dance School" {{ $contact->industry == 'Dance School' ? 'selected' : '' }}>Dance School</option>
								<option value="Driving School" {{ $contact->industry == 'Driving School' ? 'selected' : '' }}>Driving School</option>
								<option value="Estate Agent" {{ $contact->industry == 'Estate Agent' ? 'selected' : '' }}>Estate Agent</option>
								<option value="Marketing Agency" {{ $contact->industry == 'Marketing Agency' ? 'selected' : '' }}>Marketing Agency</option>
								<option value="Holiday Park" {{ $contact->industry == 'Holiday Park' ? 'selected' : '' }}>Holiday Park</option>
								<option value="Mechanic" {{ $contact->industry == 'Mechanic' ? 'selected' : '' }}>Mechanic</option>
								<option value="Musician" {{ $contact->industry == 'Musician' ? 'selected' : '' }}>Musician</option>					
								<option value="Retail" {{ $contact->industry == 'Retail' ? 'selected' : '' }}>Retail</option>
								<option value="Photography" {{ $contact->industry == 'Photography' ? 'selected' : '' }}>Photography</option>
								<option value="Take-a-way" {{ $contact->industry == 'Take-a-way' ? 'selected' : '' }}>Take-a-way</option>
							</select>
						</div>
					</div>
					<div class="col-12 col-md-6">
						<div class="form-group">
							<label>Notes</label>
							<textarea class="form-control" name="notes">{{ $contact->notes }}</textarea>
						</div>
					</div>	
				</div>
				<button class="btn" type="submit">Submit</button>

			</form>

		</div>

    </div>

    @if($errors->any())
	    <div class="row">
	    	<div class="col-12">
	    		@foreach($errors->all() as $error)

	    			<div class="error-box__msg">{{ $error }}</div>

	    		@endforeach
	    	</div>
	    </div>
    @endif
</div>
@endsection
