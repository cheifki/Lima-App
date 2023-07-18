
<x-app-layout>
    <h1 class="mb-0">Detail Product</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $product->title }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Price</label>
            <input type="text" name="price" class="form-control" placeholder="Price" value="{{ $product->price }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">product_code</label>
            <input type="text" name="product_code" class="form-control" placeholder="Product Code" value="{{ $product->product_code }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="description" placeholder="Descriptoin" readonly>{{ $product->description }}</textarea>
        </div>
    </div>
    <div class="row">
    <div class="row">
  <div class="col mb-3">
    <label class="form-label">Created At</label>
    <input id="created_at_input" type="text" name="created_at" class="form-control" placeholder="Created At" readonly>
  </div>
  <div class="col mb-3">
    <label class="form-label">Updated At</label>
    <input id="updated_at_input" type="text" name="updated_at" class="form-control" placeholder="Updated At" readonly>
  </div>
</div>

<script>
  // Retrieve the values from the server-side and convert them to Kenyan time
  var createdAtValue = new Date("{{ $product->created_at }}");
  var updatedAtValue = new Date("{{ $product->updated_at }}");
  
  // Set the time zone to Kenya (East Africa Time)
  createdAtValue.setHours(createdAtValue.getHours() + 3); // UTC+3
  updatedAtValue.setHours(updatedAtValue.getHours() + 3); // UTC+3
  
  // Convert the adjusted values to local time
  var createdLocalTime = createdAtValue.toLocaleString("en-US", { timeZone: "Africa/Nairobi" });
  var updatedLocalTime = updatedAtValue.toLocaleString("en-US", { timeZone: "Africa/Nairobi" });
  
  document.getElementById("created_at_input").value = createdLocalTime;
  document.getElementById("updated_at_input").value = updatedLocalTime;
</script>

   



</x-app-layout>