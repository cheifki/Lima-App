
<x-app-layout>
    <h1 class="mb-0">Detail User</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $user->name }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Email</label>
            <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Usertype</label>
            <input type="text" name="usertype" class="form-control" placeholder="Usertype" value="{{ $user->usertype }}" readonly>
        </div>
    </div>
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
  var createdAtValue = new Date("{{ $user->created_at }}");
  var updatedAtValue = new Date("{{ $user->updated_at }}");
  
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