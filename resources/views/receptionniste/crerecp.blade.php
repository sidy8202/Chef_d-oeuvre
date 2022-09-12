@extends('admin.indexadmin')

@section( 'contenues') 


{{-- Add receptionnistes with Modal --}}

<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center" style=" background-color:#0972A1">
        <h5 class="modal-title text-white text-center w-100 font-weight=bold" id="exampleModalLabel">Compte receptionniste</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      
      </div>

      <div class="modal-body">
          <form action="{{ URL('/addrecept') }}" class="px-md-2" enctype="multipart/form-data" method="POST">
            @csrf
                {{-- Try --}}                      

                <div class="form-outline mb-4">
                  <label class="form-label fw-bold" for="form3Example1q">Photo de Profil</label>
                  <input type="file" id="form3Example1q" placeholder="Votre photo de profil" class="form-control" name="profile_img"/>
                </div>

                <div class="row">
                    <div class="col mb-4">
                      <div class="form-outline datepicker">
                        <label for="exampleDatepicker1" class="form-label">Nom</label>
                        <input type="text" placeholder="Votre nom à l'etat Civil" class="form-control" id="exampleDatepicker1" name="nom"/>
                      </div>
  
                    </div>
                    <div class="col-md mb-4">
                      <label for="exampleDatepicker1" class="form-label">Prenom</label>
                      <input type="text" class="form-control" placeholder="Votre prenom à l'etat Civil" id="exampleDatepicker1" name="prenom"/>
                    </div>
                </div>

              <div class="row">
                <div class="col mb-4">
                  <div class="form-outline datepicker">
                    <label for="exampleDatepicker1" class="form-label">Adresse Physique</label>
                    <input type="text" class="form-control" id="exampleDatepicker1" name="adresse"/>
                  </div>

                </div>
                <div class="col-md mb-4">
                  <label for="exampleDatepicker1" class="form-label">Telephone</label>
                  <input type="text" class="form-control" id="exampleDatepicker1" name="phone"/>
                </div>
              </div>

              <div class="row">
                <div class="col mb-4">
                  <div class="form-outline datepicker">
                    <label for="exampleDatepicker1" class="form-label fw-bold">Email</label>
                    <input type="email" class="form-control" id="exampleDatepicker1" name="email" class="form-control validate"  @error('email') is-invalid @enderror"  value="{{ old('email') }}" required autocomplete="email"/>

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
                    <input type="password" class="form-control" id="exampleDatepicker1" name="password" @error('password') is-invalid @enderror"  required autocomplete="new-password"/>
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
                <button type="submit" class="btn text-white" style="background-color:#0972a1">Valider</button>
              </div>
            </form >
    </div>
  </div>
</div>


{{-- End of Add --}}

{{-- Card add receptionniste --}}

<div class="col-sm-12 mt-3">
  <div class="card tabs-card">
      <div class="card-block p-0">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs md-tabs" role="tablist">
              <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#home3" role="tab"><i class="fa fa-home"></i>La liste des receptionnistes</a>
                  <div class="slide"></div>
              </li>
              
              <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#profile3" role="tab"><i class="fa fa-key"></i>Les Ex receptionnistes</i></a>
                  <div class="slide"></div>
              </li>
              <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#messages3" role="tab"><i class="fa fa-play-circle"></i>Tous les receptionnistes</a>
                  <div class="slide"></div>
              </li>
              <li class="nav-item">
                  <a class="nav-link text-white" style="background-color:blue" data-toggle="tab" href="#" role="tab" data-bs-toggle="modal" data-bs-target="#registerModal"><i class="fa fa-database"></i>Ajouter</a>
                  <div class="slide"></div>
              </li>
          </ul>
          <!-- Tab panes -->
          <div class="tab-content card-block">
              <div class="tab-pane active" id="home3" role="tabpanel">

                  <div class="table-responsive">
                      <table class="table table-bordered" id="datatable">
                          <tr>
                              <th>id</th>
                              <th>Photo</th>
                              {{-- <th>Code personnel</th> --}}
                              <th>Nom</th>
                              <th>Prenom</th>
                              <th>Adresse</th>
                              <th>Email</th>
                              <th>Telephone</th>
                              <th>Actions</th> 
                          </tr>
                               
                           
                          @foreach($receptionniste as $recep)
                          <tr>
                              {{-- <td><img src="assets/images/product/prod2.jpg" alt="prod img" class="img-fluid"></td> --}}
                              <td>{{ $recep->id }}</td>
                              <td>
                                <img src="{{ asset('profile/receptionnistes/'.$recep->profile_img) }}" width="40px" height="40px" style="border-radius: 30px" alt="Image" srcset="">
  
                              </td>
                              {{-- <td></td>                                          --}}
                              {{-- <td>{{ $$recep->code }}</td> --}}
                              <td>{{ $recep->nom }}</td>
                              <td>{{ $recep->prenom }}</td>
                              <td>{{ $recep->adresse }}</td>
                              <td>{{ $recep->email }}</td>
                              <td>{{ $recep->phone }}</td>
                          </tr>
                          @endforeach
                      </table>
                  </div>
                  {{-- <div class="text-center">
                      <button class="btn btn-outline-primary btn-round btn-sm">Load More</button>
                  </div> --}}
              </div>
              <div class="tab-pane" id="profile3" role="tabpanel">

                  <div class="table-responsive ">
                      <table class="table table-bordered">
                          <tr>
                              <th>id</th>
                              <th>Photo</th>
                              {{-- <th>Code personnel</th> --}}
                              <th>Nom</th>
                              <th>Prenom</th>
                              <th>Adresse</th>
                              <th>Email</th>
                              <th>Telephone</th>
                              <th>Actions</th> 
                          </tr>
                         
                          <tr>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                          </tr>
                                                    
                      </table>
                  </div>
                  {{-- <div class="text-center">
                      <button class="btn btn-outline-primary btn-round btn-sm"></button>
                  </div> --}}
              </div>

              <div class="tab-pane" id="messages3" role="tabpanel">

                  <div class="table-responsive">
                      <table class="table">
                          <tr>
                            <th>id</th>
                              <th>Photo</th>
                              <th>Code personnel</th>
                              <th>Nom</th>
                              <th>Prenom</th>
                              <th>Adresse</th>
                              <th>Email</th>
                              <th>Telephone</th>
                              <th>Actions</th> 
                          </tr>
                         
                          <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>
                                <a href="" view class=""><i class="ti-eye"></i></a>
                                <a href="#" class="btn btn-sm btn-success label"><i class="ti-check"></i></button>
                              </td>
                          </tr>
                          
                      </table>
                  </div>
                  <div class="text-center">
                      <button class="btn btn-outline-primary btn-round btn-sm"></button>
                  </div>
              </div>
              <div class="tab-pane" id="settings3" role="tabpanel">

                  <div class="table-responsive">
                      <table class="table">
                          <tr>
                              <th>Image</th>
                              <th>Product Code</th>
                              <th>Customer</th>
                              <th>Purchased On</th>
                              <th>Status</th>
                              <th>Transaction ID</th>
                          </tr>
                          <tr>
                              <td><img src="assets/images/product/prod1.jpg" alt="prod img" class="img-fluid"></td>
                              <td>PNG002413</td>
                              <td>Jane Elliott</td>
                              <td>06-01-2017</td>
                              <td><span class="label label-primary">Shipping</span></td>
                              <td>#7234421</td>
                          </tr>
                          <tr>
                              <td><img src="assets/images/product/prod2.jpg" alt="prod img" class="img-fluid"></td>
                              <td>PNG002344</td>
                              <td>John Deo</td>
                              <td>05-01-2017</td>
                              <td><span class="label label-danger">Faild</span></td>
                              <td>#7234486</td>
                          </tr>
                      </table>
                  </div>
                  <div class="text-center">
                      <button class="btn btn-outline-primary btn-round btn-sm"></button>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

{{-- End of card --}}
<form action="{{ URL('/addrecept') }}" method="POST">
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
    @endsection