@extends('layouts.app') 
@section('content')
<div class="container">

  <button class="btn btn-success mb-3" onclick="window.location = '{{ route('invoices.create') }}'">Create Invoice</button>

  <div class="d-flex">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Date</th>
          <th scope="col">Due</th>
          <th scope="col">Details</th>
          <th scope="col">Client</th>
          <th scope="col">Total</th>
          <th scope="col">Status</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($invoices as $invoice)
        <tr style="cursor:pointer">

          <td>{{ $invoice->date}}</td>
          <td>{{ $invoice->days}}</td>
          <td>{{ $invoice->description}}</td>
          <td>{{ $invoice->client->name }}</td>
          <td>£{{ $invoice->total}}</td>
          <td>{{ $invoice['invoice_paid']?'paid':'unpaid'}}</td>
          <td class="d-flex">
            <button type="button" class="btn btn-primary mr-2" onclick="window.location = '{{ route('invoices.show',['id'=>$invoice->id]) }}'">View</button>
            <form role="form" method="POST" action="{{route('invoices.destroy',['id'=>$invoice->id])}}">
              {{ csrf_field() }} {{ method_field('DELETE') }}
              <button class="btn btn-danger">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection