<style>
    .center {text-align: center; margin-left: auto; margin-right: auto; margin-bottom: auto; margin-top: auto;}
</style>
<div class="container">
    <div class="row">
        <div class="span12">
            <div class="hero-unit center">
                <h1 style="font-size: 120px;">Oops!</h1>
                <h1><font face="Tahoma" color="red">Error</font></h1>
                <br/>
                <p>Error Message: <b>{{ $error }}</b></p>
                <a href="{{ langUrl('/admin') }}" class="btn btn-large btn-info"><i class="icon-home icon-white"></i> Take Me Home</a>
            </div>
        </div>
    </div>
</div>