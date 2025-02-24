
@if ($errors->any())
<div class="alert-section w-full flex justify-center items-center my-4 gap-1">
    <div class="bg-red-500 px-3 py-1 rounded-md w-fit text-white font-inter font-bold flex flex-col justify-center items-center">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
    <button class="close-alert flex items-center justify-center bg-red-500 hover:bg-red-600 px-3 py-1 rounded-md w-fit text-white">&times;</button>
</div>
@endif


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    var close_alert = $('.close-alert');
    var alert_section = $('.alert-section');
    close_alert.click(function() {
        alert_section.hide(); 
    });
</script>