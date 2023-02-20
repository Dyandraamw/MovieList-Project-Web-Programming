<div class="mb-3 text-white">
    <label for="name" class="form-label ">Name</label>
    <input type="text" class="form-control bg-secondary border-0 text-white" id="name" aria-describedby="name" name="name" value="{{ $item->name }}">
  </div>

  <div class="mb-3 text-white">
      <label for="gender" class="form-label ">Gender</label>
      <select class="form-select bg-secondary border-0 text-white" aria-label="Select Gender" id="gender" name="gender">
          <option selected value="{{ $item->gender }}" >{{ $item->gender }}</option>
          <option value="Female">Female</option>
          <option value="Male">Male</option>
      </select>
  </div>

  <div class="mb-3 text-white">
      <label for="biography" class="form-label ">Biography</label>
      <input type="text" class="form-control bg-secondary border-0 text-white" id="biography" aria-describedby="biography" style="height: 100px" name="biography" value="{{ $item->biography }}">
  </div>

  <div class="mb-3 text-white">
      <label for="dob" class="form-label">Date of Birth</label>
      <input type="date" class="form-control bg-secondary border-0 text-white" id="dob" name="dob" value="{{ $item->dob }}">
  </div>

  <div class="mb-3 text-white">
      <label for="pob" class="form-label ">Place of Birth</label>
      <input type="text" class="form-control bg-secondary border-0 text-white " id="pob" aria-describedby="pob" name="pob" value="{{ $item->pob }}">
  </div>

  <div class="mb-3 text-white">
      <label for="image" class="form-label">Image Url</label>
      <input class="form-control bg-secondary border-0 text-white" type="file" id="image" aria-describedby="image" name="image" value="{{ $item->image }}">
  </div>

  <div class="mb-3 text-white">
      <label for="popularity" class="form-label ">Popularity</label>
      <input type="text" class="form-control bg-secondary border-0 text-white " id="popularity" aria-describedby="popularity" name="popularity" value="{{ $item->popularity }}">
  </div>

  <button type="submit" class="btn btn-danger col-5">Update</button>
