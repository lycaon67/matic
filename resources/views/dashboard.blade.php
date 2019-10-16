@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <form action="{{ route::('device.create') }}" method="POST">
                <input type="text" name="devicekey" placeholder="Device Key" id="device-key" disabled>
                <select name="type" id="">
                    <option value="C">Control</option>
                    <option value="M">Monitor</option>
                    <option value="S">Security</option>
                </select>
                <input type="number" name="channel">
                <input type="button" value="Generate" onclick="uuidv4()">
                <input type="submit" value="Create Device">
            </form>
        </div>
    </div>
</div>

<script>
function uuidv4() {
  var key = 'xxxx-xxxx-xxxx-xxxx'.replace(/[xy]/g, function(c) {
    var r = Math.random() * 36 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
    return v.toString(36);
  });
  
  $('#device-key').val(key);
}

</script>
@endsection
