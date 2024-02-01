@extends('frontend.main.master')
@section('title','Product')
@section('content')
<table class="table mt-5 bg-dark text-white rounded">
    <h1>Order</h1>
    <thead class="thead-dark">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Product Image</th>
        <th scope="col">Product Name</th>
        <th scope="col">Shipping</th>
        <th scope="col">Total Price</th>
        <th scope="col">Status</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <th scope="row">{{$order->id}}</th>
            <th scope="row">{{auth()->user()->name}}</th>
            <td><img src="{{$order->product->getFirstMediaUrl('product_image', 'thumb')}}" alt="{{$order->product->name}} Image" width="200px"></td>
            <td>{{$order->product->name}}</td>
            <td>{{$order->shipping->name}}</td>
            <td>{{$order->product->price}}</td>
            <td>{{$order->status}}</td>
            <td>
                @if($order->status == "unpaid")
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#payModal{{$order->id}}">
                        Pay!
                    </button>
                @endif
            </td>
        </tr>
        <div class="modal fade" id="payModal{{$order->id}}" tabindex="-1" aria-labelledby="modalLabel{{$order->id}}" aria-hidden="true">
            <div class="modal-dialog">
                <form class="row g-3" action="{{route('pay')}}" method="post" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel{{$order->id}}">Pay Rp : {{$order->price}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>
                                Pembayara product <b>{{$order->product->name}}</b> dan ongkir sebesar <b>Rp.{{$order->price}},00</b> atas nama <b>{{auth()->user()->name}}</b>
                            </p>
                                @csrf
                                <input type="hidden" name="order_id" value="{{$order->id}}">
                                <div id="preview-container" style="display: none;margin-top: 20px;">
                                    <h3>Image Preview</h3>
                                    <img id="preview-image" src="#" alt="Preview" style="max-width: 100%;max-height: 200px;">
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="formFile" class="form-label">Bukti Pembayaran</label>
                                    <input class="form-control" type="file" id="formFile" name="proof_of_payment">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
    </tbody>
</table>
<script>
    const fileInput = document.getElementById('formFile');
    const previewContainer = document.getElementById('preview-image');

    fileInput.addEventListener('change', (event) => {
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = (event) => {
            const img = document.createElement('img');
            img.src = event.target.result;
            previewContainer.appendChild(img);
        };

        reader.readAsDataURL(file);
    });
</script>
@endsection
