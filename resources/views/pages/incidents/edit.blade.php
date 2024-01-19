
@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
        @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="page-header">
                <div class="page-title">
                    <h4>Éditer l'Incident</h4>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('incidents.update', ['incident' => $incident->id_incident]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Sélectionnez le véhicule -->
                        <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="id_vehicule">Véhicule :</label>
                            <select name="id_vehicule" id="id_vehicule"class="form-control">
                                @foreach ($vehicules as $vehicule)
                                    <option value="{{ $vehicule->id_vehicule }}" {{ $incident->id_vehicule == $vehicule->id_vehicule ? 'selected' : '' }}>
                                        {{ $vehicule->immatriculation }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                        <!-- Date de l'incident -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="date_incident">Date de l'incident :</label>
                            <input type="date" name="date_incident" id="date_incident" value="{{ $incident->date_incident }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="gravite">Gravité :</label>
                            <select name="gravite" class="form-control controle select2" class="form-control">
                                <option value="Grave" {{ $incident->gravite == 'Grave' ? 'selected' : '' }}>Grave</option>
                                <option value="Pas Grave" {{ $incident->gravite == 'Pas Grave' ? 'selected' : '' }}>Pas Grave</option>
                                <!-- Ajoutez d'autres options selon vos besoins -->
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="degat">Dégât :</label>
                            <input type="text" name="degat" id="degat" value="{{ $incident->degat }}" class="form-control" required>
                        </div>
                    </div>
                        <!-- Causes -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="causes">Causes :</label>
                            <textarea name="causes" id="causes" required>{{ $incident->causes }}</textarea>
                        </div>
                    </div>
                        <!-- Gravité -->
                    
                        <!-- Dégât -->
                    
                        <!-- Description -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="description">Description :</label>
                            <textarea name="description" id="description" required>{{ $incident->description }}</textarea>
                        </div>
                    </div>
                        <!-- Fichiers -->
                    <div class="form-group">
    <label for="fichiers">Fichiers :</label>
    <input type="file" name="fichiers[]" id="fichiers" accept="image/*" multiple>
    
    @if ($incident->fichiers)
        <p>Aperçu des images actuelles :</p>
        <div class="image-preview">
            @foreach (json_decode($incident->fichiers) as $image)
                <div class="image-preview-item">
                    <img src="{{ asset('storage/' . $image) }}" alt="Aperçu de l'image" style="max-width: 100px;">
                    <button type="button" class="btn btn-sm btn-danger" onclick="removeImage(this)" data-image="{{ $image }}">Supprimer</button>
                </div>
            @endforeach
        </div>
    @else
        <p>Aucune image associée</p>
    @endif
</div>

<script>
    function removeImage(button) {
        // Retirez visuellement l'élément de l'aperçu
        var imagePreviewItem = button.parentNode;
        imagePreviewItem.parentNode.removeChild(imagePreviewItem);

        // Ajoutez l'image à la liste des images à supprimer côté serveur
        var removedImagesInput = document.createElement('input');
        removedImagesInput.type = 'hidden';
        removedImagesInput.name = 'removed_images[]';
        removedImagesInput.value = button.getAttribute('data-image');
        document.getElementById('fichiers').form.appendChild(removedImagesInput);
    }
</script>
ss="col-lg-12">
                        <button type="submit"class="btn btn-submit me-2">Mettre à jour</button>
                        <a href="{{ route('incidents.list') }}" class="btn btn-cancel">Quitter</a>
                    </div>
                    
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
