<!doctype html>
<html lang="en">
  <head>
    <title>Book Appointment</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>

    <style>
        body 
      {
      background-image: url("https://dt2sdf0db8zob.cloudfront.net/wp-content/uploads/2023/07/BEST-CREDIT-CARD-PROCESSOR-850x446.png");
      /* background-position: center center; */
      background-repeat: no-repeat;
    background-size: cover;
      }

      .card 
      {
        background-color: white;
        /* opacity: 0.9; */
      }
        
    </style>
  </head>
  <body>
      <div class="container">
        <div class="row mt-5">
            <div class="col-md-6 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center text-success">
                            Stripe Secure Payment Gateway
                        </h3>
                    </div>

                    <div class="card-body">
                    <form id="payment-form">
            <label for="">Name</label>
           
             <input type="text" value="{{ $data['name'] }}"  id="name" name="name" class="form-control" required>
             <br>
             <label for="">Email</label>
           
            <input type="email" value="{{ $data['email'] }}" id="email" name="email" class="form-control" required>
            <br>
            <label for="">Amount</label>
            <input type="text" value="&#8377; {{ $data['amount'] }}"  id="amount" name="amount" class="form-control" required>
             
             <div id="card-element" style="padding:14px;color:black; font-weight:bold;">

             </div>

             <button id="submit" class="btn btn-success paynow">Pay Now</button>

             <div id="card-errors" style="color: red;"></div>
             <div id="card-thank" style="color: green;"></div>
             <div id="card-message" style="color: green;"></div>
             <div id="card-success" style="color: green;font-weight:bolder"></div>
        </form>
        <a href="{{url('seeker/contact/data')}}" class="btn btn-danger float-right btn-sm">See Appointments</a>

                    </div>
                </div>
            </div>
        </div>
      </div>


    <script type="text/javascript">
        
        $('#card-success').text('');
        $('#card-errors').text('');
        var stripe = Stripe('pk_test_51OVdssJ0ApPSL3ZvXprvYjMWxV8TMfrB4mCGDtzxojPu5LNaWGKl3pw43Exq0rhdOuDIzGtiYz0hHZI0xguyt8hs00KtmV9jDR');
        var elements = stripe.elements();
        $('#submit').prop('disabled', true);
        // Set up Stripe.js and Elements to use in checkout form
        var style = {
          base: {
            color: "#32325d",
          }
        };

        var card = elements.create("card", { style: style });
        card.mount("#card-element");


        card.addEventListener('change', ({error}) => {
          const displayError = document.getElementById('card-errors');
          if (error) {
            displayError.textContent = error.message;
            $('#submit').prop('disabled', true);

          } else {
            displayError.textContent = '';
            $('#submit').prop('disabled', false);

          }
        });

        var form = document.getElementById('payment-form');
        
        form.addEventListener('submit', function(ev) {
        $('.loading').css('display','block');

          ev.preventDefault();
          //cardnumber,exp-date,cvc
          stripe.confirmCardPayment('{{ $data["client_secret"] }}', {
            payment_method: {
              card: card,
              billing_details: {
                name: '{{ $data["name"] }}',
                email: '{{ $data["email"] }}'
              }
            },
            setup_future_usage: 'off_session'
          }).then(function(result) {
            $('.loading').css('display','none');
           
            if (result.error) {
            
              $('#card-errors').text(result.error.message);
            
            } else {
                if (result.paymentIntent.status === 'succeeded') {
    $('#card-success').text("Payment successfully completed.");
    // window.location.href = "seeker/contact/data";

    // AJAX request to handle payment success
    $.ajax({
        type: 'POST',
        url: '{{ route("payment.success") }}',
        data: {
            id: {{ $data['id'] }},
            name: '{{ $data["name"] }}',
            email: '{{ $data["email"] }}',
            phone: '{{ $data["phone"] }}',
            address: '{{ $data["address"] }}',
            message: '{{ $data["message"] }}',
            _token: '{{ csrf_token() }}'
        },
      
    });
}

              return false;
            }
          });
        });
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  </body>
</html>