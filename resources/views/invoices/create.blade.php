@extends('layouts.app') 
@section('content')
<div class="container">

  <form role="form" method="POST" action="{{route('invoices.update',['id'=>$user->id])}}">

    {{ csrf_field() }} {{ method_field('PATCH') }}
    <div class="d-flex flex-column mb-3">
      <div class="input-group input-group-sm mb-1">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">Title</span>
        </div>
        <input required type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="invoice_title"
          value="{{ old('invoice_title') }}">
      </div>

      <div class="input-group mb-1">
        <div class="input-group-prepend">
          <span class="input-group-text">Description</span>
        </div>
        <textarea required class="form-control" aria-label="With textarea" name="invoice_description" value="{{ old('invoice_description') }}"></textarea>
      </div>


      <div class="input-group input-group-sm mb-1">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">Invoice number</span>
        </div>
        <input required type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="invoice_number"
          value="{{ old('invoice_number') }}">
      </div>

    </div>

    <div class="d-flex mb-3">
      <div>
        Language
        <select class="custom-select" name="" id=""><option>English</option></select>
      </div>

      <div>
        Currency
        <select class="custom-select" name="" id=""><option>Pounds</option></select>
      </div>

    </div>

    <div class="d-flex flex-column mb-3">

      From
      <div>

        <div class="input-group input-group-sm mb-1">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">Name</span>
          </div>
          <input required disabled type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{ $user->name }}">
        </div>

        <div class="input-group input-group-sm mb-1">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">Street</span>
          </div>
          <input required disabled type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{ $user->street }}">
        </div>

        <div class="input-group input-group-sm mb-1">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">City</span>
          </div>
          <input required disabled type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{ $user->city }}">
        </div>

        <div class="input-group input-group-sm mb-1">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">Postcode</span>
          </div>
          <input required disabled type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{ $user->postcode }}">
        </div>

        <div class="input-group input-group-sm mb-1">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">Country</span>
          </div>
          <input required disabled type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{ $user->country }}">
        </div>

      </div>

      <div>
        To @if($clients->count()>0)
        <select name="client_id" class="custom-select mb-1">
      <option value="">selected</option>
          @foreach ($clients as $client)
        <option  class="option-client" data-client='{{ $client }}' value="{{$client->id}}" >{{$client->name}}</option>
    				@endforeach
            </select> @endif

        <div class="input-group input-group-sm mb-1">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">Name</span>
          </div>
          <input required type="text" class="form-control input-name" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="name"
            value="{{ old('name') }}">
        </div>

        <div class="input-group input-group-sm mb-1">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">Street</span>
          </div>
          <input required type="text" class="form-control input-street" aria-label="Small" aria-describedby="inputGroup-sizing-sm"
            name="street" value="{{ old('street') }}">
        </div>

        <div class="input-group input-group-sm mb-1">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">City</span>
          </div>
          <input required type="text" class="form-control input-city" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="city"
            value="{{ old('city') }}">
        </div>

        <div class="input-group input-group-sm mb-1">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">Postcode</span>
          </div>
          <input required type="text" class="form-control input-postcode" aria-label="Small" aria-describedby="inputGroup-sizing-sm"
            name="postcode" value="{{ old('postcode') }}">
        </div>

        <div class="input-group input-group-sm mb-1">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">Country</span>
          </div>
          <input required type="text" class="form-control input-country" aria-label="Small" aria-describedby="inputGroup-sizing-sm"
            name="country" value="{{ old('country') }}">
        </div>

      </div>

    </div>

    <div class="d-flex flex-column mb-3">

      <div class="input-group input-group-sm mb-1">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">date</span>
        </div>
        <input required type="date" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="date" value="{{ old('date') }}">
      </div>

      <div class="input-group input-group-sm mb-1">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">Invoice date</span>
        </div>
        <input required type="date" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="invoice_date"
          value="{{ old('invoice_date') }}">
      </div>

      <div class="input-group input-group-sm mb-1">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">Purchase order number</span>
        </div>
        <input required type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="purchase_order_number"
          value="{{ old('purchase_order_number') }}">
      </div>

    </div>

    <div class="d-flex flex-column mb-3">

      Items

      <div class="input-group mb-1">
        <div class="input-group-prepend">
          <span class="input-group-text">Name & description</span>
        </div>
        <textarea required class="form-control" aria-label="With textarea" name="name_description" value="{{ old('name_description') }}"></textarea>
      </div>


      <div class="input-group input-group-sm mb-1">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">Quantity</span>
        </div>
        <input required type="number" class="form-control input-quantity" aria-label="Small" aria-describedby="inputGroup-sizing-sm"
          name="quantity" value="{{ old('quantity') }}">
      </div>


      <div class="input-group input-group-sm mb-1">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">£</span>
        </div>
        <input required type="number" min="0" step="0.01" class="form-control input-price" aria-label="Small" aria-describedby="inputGroup-sizing-sm"
          name="unit" value="{{ old('unit') }}">
      </div>



      <div class="input-group input-group-sm mb-1">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">Total</span>
        </div>
        <input required type="text" class="form-control input-total" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="total"
          value="{{ old('total') }}">
      </div>

    </div>


    <div class="d-flex flex-column mb-3">
      Invoice note
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">Invoice note</span>
        </div>
        <textarea required class="form-control" aria-label="With textarea" name="invoice_note" value="{{ old('invoice_note') }}"></textarea>
      </div>
    </div>

    <div class="d-flex justify-content-end">
      <button type="submit" class="btn btn-success">Create invoice</button>
    </div>

  </form>

</div>
@endsection
 
@section('scripts')
<script>
  $(document).ready(function(){

$("input").change(function(){
 $('.input-total').val($('.input-quantity').val() * $('.input-price').val());
});

    $("select").change(function(){ 
      
const client = $('.option-client').data('client');

  $('.input-name').val(client.name);
  $('.input-street').val(client.street);
  $('.input-city').val(client.city);
  $('.input-postcode').val(client.postcode);
  $('.input-country').val(client.country);
    
  }); 
});

</script>
@endsection