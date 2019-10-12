@extends('../layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

		<div class="col-12">
            
			<h1>Add Contact</h1>

			<form action="{{ route('contacts') }}" method="POST">
				@csrf()

				<div class="row">
					<div class="col-12 col-md-6">
						<div class="form-group">
							<label>Company</label>
							<input type="text" class="form-control {{ $errors->has('company') ? 'border border-danger' : '' }}" name="company" placeholder="Enter company" value="{{ old('company') }}">
						</div>
					</div>
					<div class="col-12 col-md-6">
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" name="name" placeholder="Enter name" value="{{ old('name') }}">
						</div>
					</div>
					<div class="col-12 col-md-6">
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" name="email" placeholder="Enter email" value="{{ old('email') }}">
						</div>
					</div>
					<div class="col-12 col-md-6">
						<div class="form-group">
							<label>Number</label>
							<input type="text" class="form-control" name="number" placeholder="Enter number" value="{{ old('number') }}">
						</div>
					</div>
					<div class="col-12 col-md-6">
						<div class="form-group">
							<label>Website</label>
							<input type="text" class="form-control" name="website" placeholder="Enter website" value="{{ old('website') }}">
						</div>
					</div>
					<div class="col-12 col-md-6">
						<div class="form-group">
							<label>Industry</label>
							<select class="form-control" name="industry">
								<option value="Architect">Architect</option>
								<option value="Cake Makers">Cake Makers</option>
								<option value="Car Dealership">Car Dealership</option>
								<option value="Care Home">Care Home</option>
								<option value="Decorator">Decorator</option>
								<option value="Dance School">Dance School</option>
								<option value="Driving School">Driving School</option>
								<option value="Estate Agent">Estate Agent</option>
								<option value="Holiday Park">Holiday Park</option>
								<option value="Mechanic">Mechanic</option>
								<option value="Musician">Musician</option>
								<option value="Marketing Agency">Marketing Agency</option>
								<option value="Retail">Retail</option>
								<option value="Photography">Photography</option>
								<option value="Take-a-way">Take-a-way</option>
							</select>
						</div>
					</div>
					<div class="col-12 col-md-6">
						<div class="form-group">
							<label>Notes</label>
							<textarea class="form-control" name="notes">{{ old('notes') }}</textarea>
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
