@include('template.header')
<div class="container">
    <div class='row'>
        <div class='col-md-4'></div>
        <div class='col-md-4'>
          <script src='https://js.stripe.com/v2/' type='text/javascript'></script>
          <form accept-charset="UTF-8" action="pay" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ $stripe_public_key }}" id="payment-form" method="post">
            <div class='form-row'>
              <div class='col-xs-12 form-group required'>
                <label class='control-label'>Name on Card</label>
                <input class='form-control' type='text' id="holder_name">
              </div>
            </div>
            <div class='form-row'>
              <div class='col-xs-12 form-group required'>
                <label class='control-label'>Amount</label>
                <input class='form-control' type='number' id="amount" name="amount">
              </div>
            </div>
            @csrf
            <div class='form-row'>
              <div class='col-xs-12 form-group card required'>
                <label class='control-label'>Card Number</label>
                <input autocomplete='off' name="card" id="card" class='form-control card-number' type='text' value="4242424242424242">
              </div>
            </div>
            <input name="stripeToken" id="stripetoken" type="hidden" />
            <div class='form-row'>
              <div class='col-xs-4 form-group cvc required'>
                <label class='control-label'>CVC</label>
                <input autocomplete='off' name="cvc" id="cvc" class='form-control card-cvc' placeholder='ex. 311' type='text' value="111">
              </div>
              <div class='col-xs-4 form-group expiration required'>
                <label class='control-label'>Month</label>
                <input class='form-control card-expiry-month' name="month" id="month" placeholder='MM' type='text' value="06">
              </div>
              <div class='col-xs-4 form-group expiration required'>
                <label class='control-label'>Year</label>
                <input class='form-control card-expiry-year' name="year" id="year" placeholder='YYYY' type='text' value="2020">
              </div>
            </div>
            <div class='form-row'>
              <div class='col-md-12 form-group'>
                <button class='form-control btn btn-primary submit-button' type='submit'>Pay »</button>
              </div>
            </div>
          </form>
        </div>
        <div class='col-md-4'></div>
    </div>
</div>
@include('template.footer')
<script>
    $("form").on("submit", (e) => {
        var holder = $("#holder_name").val();
        var number = $("#card").val();
        var cvc = $("#cvc").val();
        var exp_month = $("#month").val();
        var exp_year = $("#year").val();

        e.preventDefault();
        Stripe.setPublishableKey("pk_test_U2HlRjNkL5HuppNObiDEJo1100jCqhrrbJ");
        Stripe.createToken({
            number,
            cvc,
            exp_month,
            exp_year
        }, (status,response) => {
            if(!response.error) {
                document.getElementById("stripetoken").value = response.id;
                $("form").get(0).submit();
            }
        });
    });
</script>