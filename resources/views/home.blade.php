@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="https://pushjs.org/scripts/push.min.js"></script>
<script>
    function demo() {
        Push.create('Hello world!', {
            body: "CLGT",
            icon: 'https://deerawan.gallerycdn.vsassets.io/extensions/deerawan/vscode-material2-snippets/2.0.0/1488020846563/Microsoft.VisualStudio.Services.Icons.Default',
            link: '/#',
            timeout: 4000,
            onClick: function () {
                console.log("Fired!");
                window.focus();
                this.close();
            },
            vibrate: [200, 100, 200, 100, 200, 100, 200]
        });
    }
</script>
@endpush
