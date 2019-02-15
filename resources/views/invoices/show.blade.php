@extends('layouts.app') 
@section('content')
<div class="container">

  {{-- ROW 1 title description invoice number --}}

  <form role="form" method="POST">

    {{ csrf_field() }} {{ method_field('PATCH') }}
    <div class="d-flex flex-column mb-3">
      <div class="input-group input-group-sm mb-1">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">Title</span>
        </div>
        <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{ $invoice->title }}">
      </div>

      <div class="input-group mb-1">
        <div class="input-group-prepend">
          <span class="input-group-text">Description</span>
        </div>
        <textarea class="form-control" aria-label="With textarea" value="{{ $invoice->description }}">{{ $invoice->description }}</textarea>
      </div>


      <div class="input-group input-group-sm mb-1">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">Invoice number</span>
        </div>
        <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{ $invoice['invoice_number'] }}">
      </div>

    </div>

    <div class="d-flex mb-3">
      <div>
        Language
        <select class="custom-select" name="" id=""><option>English</option></select>
      </div>

      <div>
        Currency
        <select class="custom-select" name="" id=""><option>United States Doller</option></select>
      </div>

    </div>

    <div class="d-flex flex-column mb-3">

      From
      <div>

        <div class="input-group input-group-sm mb-1">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">Name</span>
          </div>
          <input disabled type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{ $invoice->user->name }}">
        </div>

        <div class="input-group input-group-sm mb-1">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">Street</span>
          </div>
          <input disabled type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{ $invoice->user->street }}">
        </div>

        <div class="input-group input-group-sm mb-1">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">City</span>
          </div>
          <input disabled type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{ $invoice->user->city }}">
        </div>

        <div class="input-group input-group-sm mb-1">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">Postcode</span>
          </div>
          <input disabled type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{ $invoice->user->postcode }}">
        </div>

        <div class="input-group input-group-sm mb-1">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">Country</span>
          </div>
          <input disabled type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{ $invoice->user->country }}">
        </div>

      </div>

      <div>
        To

        <div class="input-group input-group-sm mb-1">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">Name</span>
          </div>
          <input type="text" class="form-control input-name" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{ $invoice->client->name }}">
        </div>

        <div class="input-group input-group-sm mb-1">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">Street</span>
          </div>
          <input type="text" class="form-control input-street" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{ $invoice->client->street }}">
        </div>

        <div class="input-group input-group-sm mb-1">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">City</span>
          </div>
          <input type="text" class="form-control input-city" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{ $invoice->client->city }}">
        </div>

        <div class="input-group input-group-sm mb-1">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">Postcode</span>
          </div>
          <input type="text" class="form-control input-postcode" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{ $invoice->client->postcode }}">
        </div>

        <div class="input-group input-group-sm mb-1">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">Country</span>
          </div>
          <input type="text" class="form-control input-country" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="country"
            value="{{ $invoice->client->country }}">
        </div>

      </div>

    </div>

    <div class="d-flex flex-column mb-3">

      <div class="input-group input-group-sm mb-1">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">date</span>
        </div>
        <input type="date" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{ $invoice->date }}">
      </div>

      <div class="input-group input-group-sm mb-1">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">Invoice date</span>
        </div>
        <input type="date" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{ $invoice['invoice_date'] }}">
      </div>

      <div class="input-group input-group-sm mb-1">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">Purchase order number</span>
        </div>
        <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{ $invoice['purchase_order_number'] }}">
      </div>

    </div>

    <div class="d-flex flex-column mb-3">

      Items

      <div class="input-group mb-1">
        <div class="input-group-prepend">
          <span class="input-group-text">Name & description</span>
        </div>
        <textarea class="form-control" aria-label="With textarea" value="{{ $invoice->item['name_description'] }}">{{ $invoice->item['name_description'] }}</textarea>
      </div>


      <div class="input-group input-group-sm mb-1">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">Quantity</span>
        </div>
        <input type="text" class="form-control input-quantity" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{ $invoice->item->quantity }}">
      </div>


      <div class="input-group input-group-sm mb-1">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">Price</span>
        </div>
        <input type="text" class="form-control input-price" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{ $invoice->item->unit }}">
      </div>



      <div class="input-group input-group-sm mb-1">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">Total</span>
        </div>
        <input type="text" class="form-control input-total" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{ $invoice->total }}">
      </div>

    </div>


    <div class="d-flex flex-column mb-3">
      Invoice note
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">Invoice note</span>
        </div>
        <textarea class="form-control" aria-label="With textarea" value="{{ $invoice['invoice_note'] }}">{{ $invoice['invoice_note'] }}</textarea>
      </div>
    </div>
  </form>

</div>
@endsection