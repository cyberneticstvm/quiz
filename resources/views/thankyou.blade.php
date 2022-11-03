<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Life Style Design quiz</title>
    
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
        @php $quiz = Session::get('quiz'); @endphp
        {{ $quiz->first_name }}
    </div>
  </div>
</div>
<!-- partial -->
  

 
<footer class="credit"><a href="https://lifestyledesignquiz.com" target="_blank">Life Style Design quiz</a></footer>
  
<!-- jQuery JS -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
<!-- Bootstrap 5 JS -->
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js'></script>
<!-- Multi-step Form JS -->
<script src="{{ public_path().'/form-wizard/js/demo.js' }}"></script>
  
  </body>
</html>