
@if(session()->has(config()->get('bs3-alert.session_name')))
  @foreach(session()->get(config()->get('bs3-alert.session_name')) as $bs3Alert)
    <div class="alert {{ $bs3Alert['type'] }} alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      @if($bs3Alert['title'])
        <p><strong>{!! $bs3Alert['title'] !!}</strong></p>
      @endif
      @foreach($bs3Alert['messages'] as $bs3AlertMessage)
        <p style="line-height: 1.1em">{!! $bs3AlertMessage !!}</p>
      @endforeach
    </div>
  @endforeach
@endif
