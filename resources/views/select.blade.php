@extends('layouts.navbar')
@section('link')
    @if (auth()->user()->role != 'admin' && auth()->user()->role != 'petugas' && auth()->user()->role != 'pengguna')
        @foreach ($history as $ud)
            <td class="align-middle text-center text-sm">
                <form action="{{ Route('auto', $ud->id_history) }}" method="post">
                    @csrf
                    <button type="submit" id="pilih" class="btn btn-icon btn-primary">Pilih</button>
                </form>
            </td>
        @endforeach
    @endif

    <input type="hidden" id="tgl_akhir" value="{{ date('M d, Y H:i:s', strtotime($detail->tgl_akhir)) }}">

    <script>
        var tgl = document.getElementById('tgl_akhir').value

        // Set the date we're counting down to
        var countDownDate = new Date(tgl).getTime();
        console.log(tgl);
        // Update the count down every 1 second
        var x = setInterval(function() {
            // Get todays date and time
            var now = new Date().getTime();

            // Find the distance between now an the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor(
                (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
            );
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Output the result in an element with id="demo"
            // document.getElementById("demo").innerHTML =
            //     days + "d " + hours + "h " + minutes + "m " + seconds + "s ";

            // If the count down is over, write some text
            if (distance < 0) {
                // clearInterval(x);
                // document.getElementById("demo").innerHTML = "EXPIRED";
                var button = document.getElementById("pilih");
                button.click();
            }
        }, 1000);
    </script>
@endsection
