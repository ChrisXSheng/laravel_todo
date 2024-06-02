@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('OTP Setup') }}</div>

                    <div class="card-body">
                        <div>
                            <img src="{{ $qrUrl }}" alt="QR Code">
                        </div>
                        <form method="POST" action="{{ route('otp.setup') }}">
                            @csrf
                            <input type="hidden" name="secret" value="{{ $secret }}">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Enable OTP') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
