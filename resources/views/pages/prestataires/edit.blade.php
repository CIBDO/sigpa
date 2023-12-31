 @extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Modifier le prestataire</h4>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-12">
                        <div class="form-group">
                            <form action="{{ route('prestataires.update', ['prestataire' => $prestataire->id_prestataire]) }}" method="post">
                                @csrf
                                @method('PUT')
                                <label for="nom_prestataire">Nom du prestataire:</label>
                                <input type="text" name="nom_prestataire" value="{{ $prestataire->nom_prestataire }}" required>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="contact">Contact:</label>
                        <input type="text" name="contact" value="{{ $prestataire->contact }}" required>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="adresse">Adresse:</label>
                        <input type="text" name="adresse" value="{{ $prestataire->adresse }}" required>
                    </div>
                </div>
                {{-- <div class="col-lg-6 col-sm-6 col-12"> --}}
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Mise à jour</button>
                    </div>
               {{--  </div> --}}
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
