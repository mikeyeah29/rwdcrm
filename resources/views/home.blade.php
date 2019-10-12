@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="stats">
                        <div class="stat">
                            <p>Positive Response Rate: <span>30%</span></p>
                            <p>Netural Response Rate: <span>40%</span></p>
                            <p>Negitive Response Rate: <span>30%</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            
            <form>
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <input type="text" name="q_name" placeholder="Name...">
                    </div>
                    <div class="col-12 col-sm-6">
                        <input type="text" name="q_email" placeholder="Email...">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <select type="text" name="q_package">
                            <option value="">- select website level -</option>
                            <option value="Basic">Basic</option>
                            <option value="Standard">Standard</option>
                            <option value="Bespoke">Bespoke</option>
                        </select>
                        <textarea placeholder="Message..." name="q_msg"></textarea>
                        <div class="btn btn--full txt-center" id="send_form">Submit</div>
                    </div>
                </div>
            </form>

        </div>

    </div>
</div>

<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

<script type="text/javascript">
    
    jQuery(document).ready(function($){

        function sendForm(cb){
            $.ajax({
                url: 'api/contacts',
                method: 'post',
                type: 'json',
                data: {
                    api_token: '3938380123',
                    name: $('[name="q_name"]').val(),
                    email: $('[name="q_email"]').val(),
                    package: $('[name="q_package"]').val(),
                    industry: 'musician',
                    message: $('[name="q_msg"]').val()
                },
                success: function(data){
                    console.log(data);
                },
                error: function(a, b, c){
                    console.log(a,b,c);
                }
            });
            // $.ajax({
            //  url: 'http://crm.rwdstaging.co.uk/api/yeah',
            //  method: 'get',
            //  type: 'json',
            //  data: {
            //      api_token: '3938380123'
            //  },
            //  success: function(data){
            //      console.log(data);
            //  },
            //  error: function(a, b, c){
            //      console.log(a,b,c);
            //  }
            // });
        }

        $('#send_form').on('click', function(){
            $(this).addClass('is-loading');
            sendForm();
            // sendForm(function(){

            // });
        });

    });

</script>

@endsection
