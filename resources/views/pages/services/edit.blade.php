@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Modifier le service</h4>
            </div>
        </div>
 <div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-12">
                <div class="form-group">
                    <form id="updateForm" action="{{ route('services.update', $service->id_service) }}" method="post">
                        @csrf
                        @method('PUT')
                        <label for="nom_service">Nom du service :</label>
                        <input type="text" name="nom_service" value="{{ old('nom_service', $service->nom_service) }}" required>
                        <label for="description">Description :</label>
                        <input type="text" name="description" value="{{ old('description', $service->description) }}" required>
                        <p>
                        </p>
                        <button type="submit" class="btn btn-submit me-2 updateBtn">Mise à jour</button>
                        <a href="{{ route('services.list') }}" class="btn btn-cancel">Annuler</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

       {{--  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> --}}
        <!-- Votre script JavaScript -->
        <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('.updateBtn').addEventListener('click', function() {
            document.getElementById('updateForm').submit();
        });
    });
</script>

    </div>
</div>
@endsection

