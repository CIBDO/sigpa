@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Modifier le Modèle</h4>
                </div>
            </div>  
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <form id="updateForm"action="{{ route('modeles.update', $modele->id_modele) }}" method="post">
                                    @csrf
                                        @method('PUT')
                                    <label for="nom_marque">Nom du modèle:</label>
                                    <input type="text" name="nom_modele" value="{{ $modele->nom_modele }}" required>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <a href="javascript:void(0);" class="btn btn-submit me-2 updateBtn">Mise à jour</a>
                            <a href="{{ route('modeles.list') }}" class="btn btn-cancel">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <!-- Votre script JavaScript -->
            <script>
                $(document).ready(function() {
                    $('.updateBtn').on('click', function() {
                        // Soumettre le formulaire avec l'ID updateForm
                        $('#updateForm').submit();
                    });
                });
            </script>
        </div>
    </div>
@endsection
