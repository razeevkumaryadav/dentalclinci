<option value="" selected>--Select List--</option>
@foreach($subservices as $dent)
    <option value="{{ $dent->id }}">{{ $dent->subname }}</option>
@endforeach   