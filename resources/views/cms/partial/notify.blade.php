@php
    $notify = session()->get('notify');
@endphp
<script>
    var title = "{{ $notify['title'] }}";
    var message = "{!! $notify['message'] !!}";
    var state = "{{ $notify['state'] }}";
    showNotify(title, message, state);
</script>