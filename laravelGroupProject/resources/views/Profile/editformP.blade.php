<div class="card m-4 mb-4 bg-dark p-2 text-white" style="width: 15rem;">
    <img src="{{ url('storage/'.$item->image) }}" class="img-fluid card-img-top" style="height: 10rem;" alt="image">
</div>

<div class="mb-3 text-white">
    <label for="username" class="form-label ">Username</label>
    <input type="text" class="form-control bg-secondary border-0 text-white" id="name" aria-describedby="username" name="username" value="{{ $item->username }}">
  </div>

  <div class="mb-3 text-white">
      <label for="email" class="form-label ">Email</label>
      <input type="email" class="form-control bg-secondary border-0 text-white" id="biography" aria-describedby="email"  name="email" value="{{ $item->email }}">
  </div>

  <div class="mb-3 text-white">
      <label for="dob" class="form-label">Date of Birth</label>
      <input type="date" class="form-control bg-secondary border-0 text-white" id="dob" name="dob" value="{{ $item->dob }}">
  </div>

  <div class="mb-3 text-white">
      <label for="phone" class="form-label ">Phone</label>
      <input type="text" class="form-control bg-secondary border-0 text-white " id="phone" aria-describedby="phone" name="phone" value="{{ $item->phone }}">
  </div>

  <div class="mb-3 text-white">
      <label for="image" class="form-label">Image Url</label>
      <input class="form-control bg-secondary border-0 text-white" type="file" id="image" aria-describedby="image" name="image" value="{{ $item->image }}">
  </div>

  <button type="submit" class="btn btn-danger col-5">Update</button>
