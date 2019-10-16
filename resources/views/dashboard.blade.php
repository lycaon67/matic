@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <form action="{{ route('device.create') }}" method="POST">
          @csrf
                <input type="hidden" name="devicekey" placeholder="Device Key" id="device-key">
                <input type="hidden" name="keypass" placeholder="Key Password" id="keypass" >
                <select name="type" id="">
                    <option value="Control">Control</option>
                    <option value="Monitor">Monitor</option>
                    <option value="Security">Security</option>
                </select>
                <input type="number" name="channel">
                <input type="button" value="Generate" >
                <input type="submit" value="Create Device" onclick="uuidv4()">
            </form>
        </div>
    </div>
    <div class="row">
      <table class="col-md-8 offset-2">
        <thead>
          <tr>
            <th>#</th>
            <th>Device Key</th>
            <th>Device Password</th>
            <th>Type</th>
            <th>House Name</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>

          @if(count($devices))
            @foreach($devices as $device)
              <tr>
                <td>{{ $device->id }}</td>
                <td>{{ $device->key }}</td>
                <td>{{ $device->keypass }}</td>
                <td>{{ $device->type }}</td>
                <td>{{ $device->houseid }}</td>
                <td>{{ $device->status }}</td>
              </tr>
            @endforeach
          @endif
        </tbody>
      </table>
    </div>
</div>

<script>
function uuidv4() {
  var key = 'xxxxxxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
    var r = Math.random() * 36 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
    return v.toString(36);
  });
  var keypass = 'xxxxxxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
    var r = Math.random() * 36 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
    return v.toString(36);
  });
  
  $('#keypass').val(keypass);
  $('#device-key').val(key);
}

</script>
@endsection
