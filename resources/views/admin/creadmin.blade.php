@if(count($errors) > 0)
<div class=" alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>    

        @endforeach
    </ul>
</div>
@endif

@if (session('success'))
<div class="alert alert-success">
    <p>{{ session('success') }}</p>
</div> 
@endif
<form action="{{ URL('/admiadd') }}" method="POST">
    @csrf

      <div class="md-form mb-5">
        <i class="fas fa-envelope prefix grey-text"></i>
        <label data-error="wrong" data-succes="right" for="">Nom</label>
        <input type="text" name="nom" class="form-control validate">
      </div>

      <div class="md-form mb-5">
        <i class="fas fa-user prefix grey-text"></i>
        <label data-error="wrong" data-succes="right" for="">Prenom</label>
        <input type="text" name="prenom" class="form-control validate">
      </div>
      <div class="md-form mb-5">
        <i class="fas fa-envelope prefix grey-text"></i>
        <label data-error="wrong" data-succes="right" for="">Adresse Physique</label>
        <input type="text" name="adresse" class="form-control validate">
      </div>

      <div class="md-form mb-5">
        <i class="fas fa-user prefix grey-text"></i>
        <label data-error="wrong" data-succes="right" for="">Telephone</label>
        <input type="text" name="phone" class="form-control validate">
      </div>

      <div class="md-form mb-5">
        <i class="fas fa-user prefix grey-text"></i>
        <label data-error="wrong" data-succes="right" for="">Email</label>
        <input type="email" name="email" class="form-control validate"  @error('email') is-invalid @enderror"  value="{{ old('email') }}" required autocomplete="email">
        @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
      </div>

      <div class="md-form mb-5">
        <i class="fas fa-envelope prefix grey-text"></i>
        <label data-error="wrong" data-succes="right" for="">Username</label>
        <input type="text" name="username" class="form-control validate">
      </div>

      <div class="md-form mb-5">
        <i class="fas fa-user prefix grey-text"></i>
        <label data-error="wrong" data-succes="right" for="">Mot de passe</label>
        <input type="password" name="password" class="form-control validate" @error('password') is-invalid @enderror"  required autocomplete="new-password">
          @error('password')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </div>

      <div class="md-form mb-5">
        <i class="fas fa-user prefix grey-text"></i>
        <input type="password" class="form-control validate" name="password_confirmation" required autocomplete="new-password">
        <label data-error="wrong" data-succes="right" for="" name="password_confirmation" >Confirmer</label>
      </div>
  


      <div class="modal-footer">  
        <button type="button" class="btn text-white" style="background-color:#B66639" data-bs-dismiss="modal">Annuler</button>
        <button type="submit" class="btn text-white" style="background-color:#0972a1">Valider</button>
      </div>
    </form >