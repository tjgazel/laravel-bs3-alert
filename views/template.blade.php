
@if(session()->has(config()->get('bs3-alert.session_name')))
  @foreach(session()->get(config()->get('bs3-alert.session_name')) as $bs3Alert)
    <div class="alert {{ $bs3Alert['type'] }} alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      @if($bs3Alert['title'])
        <h5>{!! $bs3Alert['title'] !!}</h5>
      @endif
      @foreach($bs3Alert['messages'] as $bs3AlertMessage)
        <p>{!! $bs3AlertMessage !!}</p>
      @endforeach
    </div>
  @endforeach
@endif
