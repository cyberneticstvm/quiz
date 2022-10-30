<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 5 Multi-step Form Example</title>
    
    <!-- Bootstrap 5 CSS -->  
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css'>
    <!-- Font Awesome 5 -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css'>
    
	<!-- Demo CSS -->
	<link rel="stylesheet" href="{{ public_path().'/form-wizard/css/demo.css' }}">
  
  </head>
  <body>


<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="progress mt-3" style="height: 30px;">
        <div class="progress-bar progress-bar-striped progress-bar-animated" style="font-weight:bold; font-size:15px;" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      <div class="card mt-3">
        <div class="card-header font-weight-bold">My Bootstrap 5 multi-step-form</div>
        <div class="card-body p-4 step">
          <div class="radio-group row justify-content-between px-3 text-center" style="justify-content:center !important">
            <div class="col-auto me-sm-2 mx-1 card-block py-0 text-center radio">
              <div class="opt-icon"><i class="fas fa-user-plus" style="font-size: 80px; margin-left: 25px;"></i></div>
              <p><b>Add new user</b></p>
            </div>

          </div>
        </div>
        <div id="userinfo" class="card-body p-4 step" style="display: none">
          <div class="text-center">
            <h5 class="card-title font-weight-bold pb-2">User information</h5>
          </div>

          <div class="form-group row">
            <div class="col-2"></div>
            <div class="col-4">
              <label for="fname">First Name<b style="color: #dc3545;">*</b></label>
              <input type="text" name="name" class="form-control" id="fname" required>
              <div class="invalid-feedback">This field is required</div>
            </div>
            <div class="col-4">
              <label for="lname">Last Name<b style="color: #dc3545;">*</b></label>
              <input type="text" class="form-control" id="lname" required>
              <div class="invalid-feedback">This field is required</div>
            </div>
          </div>
          <div class="form-group row pt-2">
            <label for="team" class="col-2 text-end control-label col-form-label">Team</label>
            <div class="col-8">
              <input type="text" class="form-control" id="team">
            </div>
          </div>
          <div class="form-group row pt-2">
            <label for="address" class="col-2 text-end control-label col-form-label">Address</label>
            <div class="col-8">
              <input type="text" class="form-control" id="address">
            </div>
          </div>
          <div class="form-group row pt-2">
            <label for="tel" class="col-2 text-end control-label col-form-label">Tel/Gsm</label>
            <div class="col-8">
              <input type="text" class="form-control" id="tel">
            </div>
          </div>
          <div class="text-center text-muted"><b style="color: #dc3545;">*</b> required fields</div>
        </div>
        <div class="card-body p-5 step" style="display: none">Step 3</div>
        <div class="card-body p-5 step" style="display: none">Step 4</div>
        <div class="card-body p-5 step" style="display: none">Step 5</div>
        <div class="card-footer">
          <button class="action back btn btn-sm btn-outline-warning" style="display: none">Back</button>
          <button class="action next btn btn-sm btn-outline-secondary float-end" disabled="">Next</button>
          <button class="action submit btn btn-sm btn-outline-success float-end" style="display: none">Submit</button>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- partial -->
  

 
  <footer class="credit">Author: Crezzur - Distributed By: <a title="Awesome web design code & scripts" href="https://www.codehim.com?source=demo-page" target="_blank">CodeHim</a></footer>
  
<!-- jQuery JS -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
<!-- Bootstrap 5 JS -->
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js'></script>
<!-- Multi-step Form JS -->
<script src="{{ public_path().'/form-wizard/js/bootstrap-multi-step-form.js' }}"></script>
  
  </body>
</html>