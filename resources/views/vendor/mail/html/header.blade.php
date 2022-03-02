<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://brilliantjuara.com/assets/images/logo/logo-frontpage.png" style="width: 200px" alt="Brilliant Juara">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
