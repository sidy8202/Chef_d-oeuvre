@extends('citoyen.indexcitoi')

@section( 'contenues')

<div class="col-sm-12 mt-3">
    <div class="card tabs-card">
        <div class="card-block p-0">
            <!-- Nav tabs -->
            {{-- <ul class="nav nav-tabs md-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home3" role="tab"><i class="fa fa-home"></i>La liste des demandes</a>
                    <div class="slide"></div>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#" role="tab"><i class="fa fa-key"></i></a>
                    <div class="slide"></div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#" role="tab"><i class="fa fa-play-circle"></i></a>
                    <div class="slide"></div>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" style="background-color:blue" data-toggle="tab" href="#" role="tab"data-bs-toggle="modal" data-bs-target="#exampleModal" ><i class="fa fa-database"></i>Nouvelle Demande</a>
                    <div class="slide"></div>
                </li>
            </ul> --}}
            <!-- Tab panes -->
            <div class="tab-content card-block">
                <div class="tab-pane active" id="home3" role="tabpanel">
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
                
                    {{-- <marquee behavior="" direction="">
                        <h6 class="text-danger">Veuillez changer le status de la demande pour qu'elle soit considerer comme validée!!</h6>
                    </marquee>   --}}

                    <h3 class="text-center"><i class="fa fa-user" aria-hidden="true"></i> Modification de profil </h3>
                    <hr>

                    {{-- <form action="" class="px-md-2" method="POST">
                        @csrf
                        @method('PATCH')
                                               
                            <div class="row">
                                <div class="col mb-4">
                                  <div class="form-outline datepicker">
                                    <label for="exampleDatepicker1" class="form-label">Numero de la demande</label>
                                    <input type="text" class="form-control" id="exampleDatepicker1" name="adresse" readonly value=""/>
                                  </div>
              
                                </div>
                                <div class="col-md mb-4">
                                  <label for="exampleDatepicker1" class="form-label">Date de la demande</label>
                                  <input type="text" class="form-control" id="exampleDatepicker1" name="phone" readonly value=""/>
                                </div>
                                
                            </div> 
                            <div class="form-outline mb-4">
                                <label class="form-label fw-bold" for="form3Example1q">Demandeur</label>
                                <input type="text" class="form-control" id="exampleDatepicker1" name="phone" readonly value=""/>
                              </div> 
                            <div class="form-outline mb-4">
                                <label class="form-label fw-bold" for="form3Example1q">Status</label>
                                <select name="status" id="" class="form-control" id="exampleDatepicker1">
                                    <option value="">Changer en Valider</option>
                                    <option value="Valider">Valider</option>
                                </select>
                            </div>
                          
                          <div class="modal-footer">  
                            <button type="button" class="btn text-white" style="background-color:#B66639" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn text-white" style="background-color:#0972a1">Valider</button>
                          </div>                     
                    </form> --}}

                    <form action="{{ route('ajoutcitoyensstore') }}" class="px-md-2" enctype="multipart/form-data" method="POST">
                        @csrf
                            {{-- Try --}}                      
          
                            <div class="form-outline mb-4">
                              <label class="form-label fw-bold" for="form3Example1q">Photo de Profil</label>
                              {{-- <input type="file" id="form3Example1q" placeholder="Votre photo de profil" class="form-control" name="profile_img"/> --}}
                              <img src="{{ asset('') }}" class="w-75" alt="" srcset="">
                            </div>
            
                            <div class="row">
                                <div class="col mb-4">
                                  <div class="form-outline datepicker">
                                    <label for="exampleDatepicker1" class="form-label">Nom</label>
                                    <input type="text" placeholder="Votre nom à l'etat Civil" class="form-control" id="exampleDatepicker1" value="{{ Auth::user()->nom }}" name="nom"/>
                                  </div>
              
                                </div>
                                <div class="col-md mb-4">
                                  <label for="exampleDatepicker1" class="form-label">Prenom</label>
                                  <input type="text" class="form-control" placeholder="Votre prenom à l'etat Civil" id="exampleDatepicker1" value="{{ Auth::user()->prenom }}" name="prenom"/>
                                </div>
                            </div>
          
                          <div class="row">
                            <div class="col mb-4">
                              <div class="form-outline datepicker">
                                <label for="exampleDatepicker1" class="form-label">Adresse Physique</label>
                                <input type="text" class="form-control" id="exampleDatepicker1" value="{{ Auth::user()->adresse }}" name="adresse"/>
                              </div>
          
                            </div>
                            <div class="col-md mb-4">
                              <label for="exampleDatepicker1" class="form-label">Telephone</label>
                              <input type="text" class="form-control" id="exampleDatepicker1" value="" name="phone"/>
                            </div>
                          </div>
          
                          <div class="row">
                            <div class="col mb-4">
                              <div class="form-outline datepicker">
                                <label for="exampleDatepicker1" class="form-label fw-bold">Email</label>
                                <input type="email" class="form-control" id="exampleDatepicker1" value="{{ Auth::user()->email }}" name="email" class="form-control validate"  @error('email') is-invalid @enderror"  value="{{ old('email') }}" required autocomplete="email"/>
          
                                @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                              </div>
          
                            </div>
                            <div class="col-md mb-4">
                              <label for="exampleDatepicker1" class="form-label fw-bold">Nom d'utilisateur</label>
                              <input type="text" class="form-control" id="exampleDatepicker1" name="username"/>
                            </div>
                          </div>
          
                          <div class="row">
                            <div class="col mb-4">
                              <div class="form-outline datepicker">
                                <label for="exampleDatepicker1" class="form-label fw-bold" >Mot de passe</label>
                                <input type="password" class="form-control" id="exampleDatepicker1" value="{{ Auth::user()->password }}" name="password" @error('password') is-invalid @enderror"  required autocomplete="new-password"/>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                              </div>
          
                            </div>
                            <div class="col-md mb-4">
                              <label for="exampleDatepicker1" class="form-label fw-bold">Confirmer</label>
                              <input type="password" class="form-control" id="exampleDatepicker1" name="password_confirmation" required autocomplete="new-password"/>
                            </div>
                          </div>           
                          </div>
          
                          <div class="modal-footer">  
                            <button type="button" class="btn text-white" style="background-color:#B66639" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn text-white" style="background-color:#0972a1">Modifier</button>
                          </div>
                      </form >
             
                    
                </div>

            </div>
        </div>
    </div>
</div>

   
<script>
    query().marquee({
    anim: "scroll", duration: 1, life: 2.5,
    messages: [...]
})
</script>
@endsection