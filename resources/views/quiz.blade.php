<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Life Style Design quiz</title>
  <link rel="icon" type="image/x-icon" href="{{ public_path().'/assets/images/favicon.png' }}">
  <!-- Bootstrap 5 CSS -->
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css'>
  <!-- Font Awesome 5 -->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css'>

  <!-- Demo CSS -->
  <link rel="stylesheet" href="{{ public_path().'/form-wizard/css/style.css' }}">

</head>

<body>


  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="logo text-end"><img src="{{ public_path().'/assets/images/andrewlord-full-navy-blue.png' }}" class="img-fluid" width="15%" /></div>
        <div class="progress mt-3" style="height: 30px;">
          <div class="progress-bar progress-bar-success progress-bar-striped progress-bar-animated" style="font-weight:bold; font-size:15px;" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <form method="post" action="{{ route('quiz.save') }}">
          @csrf
          <div class="card mt-3">
            <div class="card-header font-weight-bold">Life Style Design Quiz</div>

            @forelse($questions as $key => $question)
            <div class="card-body p-5 step" style="{{ ($key != 0) ? 'display: none' : '' }}" id="{{ $question->qcode }}" data-number="{{ $question->id }}" data-input="{{ $question->input }}">
              <h3>{{ $question->header }}</h3>
              <p>{{ $key+1 }}. {{ $question->question }}</p>
              @if($key == 1)
              <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-1">
                  <img src="{{ public_path().'/assets/images/heart.png' }}" class="img-fluid border border-info rounded-circle" />
                </div>
                <div class="col-sm-1">
                  <img src="{{ public_path().'/assets/images/bulb.png' }}" class="img-fluid border border-info rounded-circle" />
                </div>
                <div class="col-sm-1">
                  <img src="{{ public_path().'/assets/images/sun.png' }}" class="img-fluid border border-info rounded-circle" />
                </div>
                <div class="col-sm-1">
                  <img src="{{ public_path().'/assets/images/explore.png' }}" class="img-fluid border border-info rounded-circle" />
                </div>
                <div class="col-sm-1">
                  <img src="{{ public_path().'/assets/images/hand.png' }}" class="img-fluid border border-info rounded-circle" />
                </div>
                <div class="col-sm-4"></div>
              </div>
              @endif
              @php $options = DB::table('options')->where('qid', $question->id)->get(); @endphp
              @forelse($options as $key1 => $option)
              <div class="form-check">
                <input type="{{ $question->input }}" name="{{ $question->qcode.'[]' }}" value="{{ $option->value }}" class="{{ $question->qcode }}" data-next="{{ ($option->next_question < 19) ? DB::table('questions')->where('id', $option->next_question)->value('qcode') : 'q19' }}" data-prev="{{ DB::table('questions')->where('id', $option->prev_question)->value('qcode') }}">
                <label class="form-check-label">{{ $option->option }}</label>
              </div>
              @empty
              @endforelse
            </div>
            @empty
            @endforelse
            <div class="card-body p-5 step" style="display: none" id="q19" data-number="19">
              <h3>Thank you. Where can we send your results?</h3>
              <p>Your Details</p>
              <div class="row">
                <div class="col-md-6">
                  <label>First Name</label>
                  <input type="text" name="first_name" class="form-control form-control-md q19" maxlength="50" placeholder="First Name" data-next="" data-prev="18" required />
                </div>
                <div class="col-md-6">
                  <label>Email</label>
                  <input type="email" name="email" class="form-control form-control-md q19" placeholder="Email" maxlength="50" data-next="" data-prev="18" required />
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button type='button' class="action back btn btn-sm btn-outline-secondary" style="display: none">Back</button>
              <button type='button' class="action next btn btn-sm btn-outline-secondary float-end">Next</button>
              <button type='submit' class="action submit btn btn-sm btn-outline-success float-end" style="display: none">Submit</button>
            </div>
          </div>
        </form>
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
  <script src="{{ public_path().'/form-wizard/js/bootstrap-multi-step-form.js' }}"></script>

</body>

</html>