@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="http://127.0.0.1:8000/images/logo-dmptsp.png" class="logo" alt="DPMPTSP">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
    