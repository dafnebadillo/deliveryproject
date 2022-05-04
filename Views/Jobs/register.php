<div class="container">
  <h2>Add new job</h2>
  <form action="?controller=jobs&&action=save" method="POST">
    <div class="form-group">
      <label for="text">Job Title</label>
      <input type="text" class="form-control" id="name" placeholder="Human Resources ex." name="name">
    </div>

    <div class="form-group">
      <label for="text"></label>
      <input type="text" name="descripton" class="form-control" placeholder="Descripton">
    </div>
    <div class="check-box">
      <label>Active <input type="checkbox" name="status">  </label>      
    </div>
    <button type="submit" class="btn btn-primary">POST</button>
  </form>
</div>