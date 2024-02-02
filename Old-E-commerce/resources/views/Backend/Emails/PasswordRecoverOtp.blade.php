{{-- @php
    $name = "shovon";
    $otp = 123;
    $appName = env('APP_NAME');
@endphp --}}
<div
  style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2">
  <div style="margin:0 auto;width:70%;padding:20px 0;">
    <p style="font-size:25px;border-bottom:1px solid #aaa;color:#aaa">{{$appName}}</p>
    {{-- <div style="border-bottom:1px solid #eee"></div> --}}
    <span style="font-size:1.1em">Hi,</span> <br>
    <a href="" style="font-size:1.4em;color:#fe09a5;text-decoration:none;font-weight:600;text-transform: capitalize;">{{$name}}</a>
    <p>This is your password reset OTP</p>
    <h2
      style="background:linear-gradient(-35deg, #52026a, #fe09a5);margin: 0 auto;width: max-content;padding: 0 10px;color:#fff;border-radius: 4px;padding:0 25px;letter-spacing:8px">
      {{$otp}}
    </h2>
    <p style="font-size:0.9em;">Regards,<br />{{$name}}</p>
    <hr style="border:none;border-top:1px solid #aaa" />
    <div style="float:right;padding:8px 0;color:#aaa;font-size:0.8em;line-height:1;font-weight:300">
      <p>{{$appName}}</p>
      <p>1600 Amphitheatre Parkway</p>
      <p>California</p>
    </div>
  </div>
</div>