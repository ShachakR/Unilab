@extends('layouts.main')

@section('content')
    <div class="card" style="height: 400px">
        <img class="img-fluid profile-img-bg"
            src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxITEhUTEhMWFRUXGBcXFxcVFxgXFxcXFxgYFx0VFxcYHSggGholGxgXITEhJSkrLi4uGB8zODMtNygtLisBCgoKBwcHDgcHDisZHxkrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrK//AABEIAJkBSQMBIgACEQEDEQH/xAAYAAEBAQEBAAAAAAAAAAAAAAABAAIDB//EACgQAQEBAAECAwkBAQEAAAAAAAABEfACITFRkRJBYXGBobHB0fHhMv/EABUBAQEAAAAAAAAAAAAAAAAAAAAB/8QAFBEBAAAAAAAAAAAAAAAAAAAAAP/aAAwDAQACEQMRAD8A8asR3wCgw9MSBJEAurpSAYisBIxQAfZ7b9PX/EgSqVAWKm0YCxSc5zskCSjUBk9V3v5moBikCBJIEtUQJLVAMZK0EkQWIagR6s9yQJrFIcBzxA2AkogVUWGwFaFiAwJQElpgIhaBnxFQoJBUCkgVIazn6BQFABKZRYCUndTmLAWogAqUCiWIFUqrzn0BINUFCMIH2hqGgMWc5zuaLARy/P8AUCoKqU5vgASUh0Apec53NEBGKKQEUZ5gAVYDMiznOdlVYCN3x+4iBUyLPIA3ICpt+IAGq9QM2qrUBwXnPRRaARl+H8X1BT0OCoFTnPD1CAyoqgDiO6AGc7Gj2QGpRdVBfpWCkFIqsVBdVUB0FF3GtdIDTOoUg1J5gUgbWK1BQEqxRWgvirAe4LFKsMBHUAOsNTnoAXT0qmsgdiBBaIdQKJCgdVgrW+4BIemjDAa24NBgK+DDdXsgJ8Q1enw58P6zQFM1GAMFJBZfAaV1AzEVANnhz6LspEC1RH8/rmfcBKQqCGNdXSzQGGRUznOeIDFYUAas57voDgMlU737+ngDKakZAWNWdlECGGIFJ+WW5WcANS4qsBRbfPlNAJVYeq+YJeynXngDiuqjUCIOgqWdOgbGVqBRqCXnzGgfa5z6IGAQtQGDqOi0COqjVQUIWgTGDoFapUCUM5/1gGgpN/4tAxDFQUalZxX1A0JA1nOc7Ci1UFpg04CSIHn4W8wIGV1EAkoQFO/SBYCSIKTy57xFYs5zncA1Oc9UtBHBTICgsNFgBWkc+IKkQ2+oA7/kCgHpiaFACk4DNizOc5ErAM39KwRQEt9x9kAlVOx0BarqPPQBIVIQBqwgFk84joMWq1GzOfQBVQ1aAlV5i0WA1c5/BFTAGqIyb4TnmChjGGA1Fql8uyA1m0xmgt5+lvkpDfLn3AIaeqgtPO38GmQDq56rBoFnuRgJeHPAy4yDWAHASlqwAjUvaBYtDVz6gPaandmHpgGqDTd94I/X8i1jQanNrLQsAVdjYenp59wFDQBLDPEdXSAhlE6ec52OAjJ8ORW87+CwEkc538b/AJfQFoStBMmq88wFPZWHpnOe/wDlAKU4gVSkNve0BL8OWYqsMnfn5BmqmQYAOeawgMU0oALW+nn+fNkAZ48/aqoFXOfZT7oFqR6vgCrm3R7INVdUVQDDh9691Aeysanv+X7gniDJw9XPuKAxTpXU3PGAzJnOYsan/m/OfjqY/gHFnmefYT3fOgoRT7p8wQsI6f4Aw4ob4fUB7KxqfwT388wWJX+rqBUKfxdX8/EAxZvPL/k+x6fD6X9MQCV0+Pr+BQaxmQ3+qc9QWCnrVAYZfIIDVi6fE9HPWABT1NeXyBm/LngNFQP/2Q=="
            alt="">
        <img class="img-fluid img-thumbnail rounded-circle profile-img-pic"
            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAA1BMVEX/AAAZ4gk3AAAASElEQVR4nO3BgQAAAADDoPlTX+AIVQEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADwDcaiAAFXD1ujAAAAAElFTkSuQmCC"
            alt="">
        <div class="card-body text-center">
            @if (Auth::check() && Auth::user()->username == $user->username)
                @include('inc.user.profile_edit')
            @endif
            <h5 class="card-title mt-3">{{ $user->username }}</h5>
            <h5 class="card-text">Studies at: <span id="university_label">{{ $profile->university_name }}</span></h5>
            <p class="card-text lead mt-4"> <span id="description_space">{{ $profile->description }}</span></p>
        </div>
    </div>
@endsection
