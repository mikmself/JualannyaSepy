@extends('dashboard.main.master')
@section('title','Edit Data Product')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Forms</h5>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('product-update', $product->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" autocomplete="false" required value="{{ $product->name }}">
                        </div>
                        <div id="preview-container" style="margin-top: 20px;">
                            <h3>Image Preview</h3>
                            <img id="preview-image" src="{{$product->getFirstMediaUrl('product_image', 'thumb')}}" alt="{{$product->name}}}}" alt="Preview" style="max-width: 100%;max-height: 200px;">
                        </div>
                        <div class="mb-3">
                            <label for="product_image" class="form-label">Product Image</label>
                            <input type="file" name="product_image" class="form-control" autocomplete="false" id="product_image" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" name="description" class="form-control" autocomplete="false" required value="{{ $product->description }}">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" name="price" class="form-control" autocomplete="false" required value="{{ $product->price }}">
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="text" name="quantity" class="form-control" autocomplete="false" required value="{{ $product->quantity }}">
                        </div>
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category ID</label>
                            <select name="category_id" class="form-control"  required>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{$category->id == $product->category_id ? "selected" : ""}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('product-index') }}" class="btn btn-secondary">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('product_image').addEventListener('change', function() {
            previewImage(this);
        });

        function previewImage(input) {
            let previewContainer = document.getElementById('preview-container');
            let previewImage = document.getElementById('preview-image');

            if (input.files && input.files[0]) {
                let reader = new FileReader();

                reader.onload = function (e) {
                    previewImage.src = e.target.result;
                };

                reader.readAsDataURL(input.files[0]);

                previewContainer.style.display = 'block';
            } else {
                previewContainer.style.display = 'none';
            }
        }
    </script>
@endsection
