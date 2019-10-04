@include('template.header')
<div class="jumbotron">
	Edit Product
</div>
<div class="row">
	<div class="col-lg-4"></div>
	<div class="col-lg-4">
		<form action="{{ url('/product') }}" method="post" name="product" id="product">
		    <div class="card">
		        <div class="card-header">
		            Edit product
		        </div>
		        <div class="card-body">
		            <div class="form-group">
		                <label class="form-label">Name</label>
		                <input type="text" name="name" placeholder="Enter the Product Name" value="{{ $products->name }}" class="form-control" />
		                @error('name')
		                    <div class="alert alert-danger">{{ $message }}</div>
		                @enderror
		            </div>
		            <div class="form-group">
		                <label class="form-label">Price</label>
		                <input type="number" name="price" placeholder="Enter the product price" value="{{ $products->price }}" class="form-control" />
		                @error('price')
		                    <div class="alert alert-danger">{{ $message }}</div>
		                @enderror
		            </div>
		            <div class="form-group">
		                <label class="form-label">Quantity</label>
		                <input type="number" name="quantity" placeholder="Enter the Quantity" value="{{ $products->quantity }}" class="form-control" />
		                @error('quantity')
		                    <div class="alert alert-danger">{{ $message }}</div>
		                @enderror
		            </div>
		            <div class="form-group">
		                <label class="form-label">Category</label>
		                <select name="category" value="" class="form-control">
		                	<option value="">Select a Category</option>
		                	@foreach($categories as $key => $value)
		                		<option value="{{ $value['id'] }}" <?php echo ($products->category_id == $value['id'])? "selected" : ""?> >{{$value['name']}}</option>	
		                	@endforeach
		                </select>
		                @error('category')
		                    <div class="alert alert-danger">{{ $message }}</div>
		                @enderror
		            </div>
		        </div>
		        <div class="card-footer">
		            @csrf
		            <input type="reset" class="btn btn-warning" name="reset" value="Reset" />
		            <input type="submit" class="btn btn-primary" name="Submit" value="Submit" />
		        </div>
		    </div>
		</form>
	</div>
	<div class="col-lg-4"></div>
</div>
@include('template.footer')
<script type="text/javascript">
	$(document).ready(function(){
		
	});
</script>