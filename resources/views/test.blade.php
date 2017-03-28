@extends('layouts.app')

@section('content')

<div>
Hello
<div>TAG: {{$str}}
</div>
<div> SENTANCE
{{$id}}
</div>
<div> time
{{$prev}} TO {{$curr}}
</div>

</div>
@stop