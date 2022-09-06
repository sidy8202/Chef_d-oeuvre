@extends('receptionniste.indexrecep')

@section( 'contenues')


{{-- <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"> --}}
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

    
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

{{-- Modal CitoyenRegister --}}

<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header text-center" style=" background-color:#0972A1">
          <h5 class="modal-title text-white text-center w-100 font-weight=bold" id="exampleModalLabel">Veuillez Vous inscrire!!</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        
        </div>

        <div class="modal-body">
            <form action="{{ route('addcitoyeninside') }}" class="px-md-2" enctype="multipart/form-data" method="POST">
              @csrf
                  {{-- Try --}}                      

                <div class="form-outline mb-4">
                  <label class="form-label fw-bold" for="form3Example1q">Photo de Profil</label>
                  <input type="file" id="form3Example1q" placeholder="Photo de profil" class="form-control" name="profile_img"/>
                </div>

                <div class="row">
                    <div class="col mb-4">
                      <div class="form-outline datepicker">
                        <label for="exampleDatepicker1" class="form-label">Nom</label>
                        <input type="text" placeholder="Nom à l'etat Civil" class="form-control" id="exampleDatepicker1" name="nom"/>
                      </div>
  
                    </div>
                    <div class="col-md mb-4">
                      <label for="exampleDatepicker1" class="form-label">Prenom</label>
                      <input type="text" class="form-control" placeholder=" Prenom à l'etat Civil" id="exampleDatepicker1" name="prenom"/>
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
 
  {{-- End Modal CitoyenRegister --}}

	<!-- tabs card start -->
  <div class="col-sm-12 mt-3">
    <div class="card tabs-card">
        <div class="card-block p-0">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs md-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home3" role="tab"><i class="fa fa-home"></i>La liste des citoyens</a>
                    <div class="slide"></div>
                </li>
                
                 <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="profile3" role="tab"><i class="fa fa-key"></i></a>
                    <div class="slide"></div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="messages3" role="tab"><i class="fa fa-play-circle"></i></a>
                    <div class="slide"></div>
                </li>
                 <li class="nav-item">
                    <a class="nav-link text-white " data-bs-toggle="modal" data-bs-target="#registerModal" style="background-color:blue" data-toggle="tab" href="#" role="tab"><i class="fa fa-database"></i>Ajouter Citoyen</a>
                    <div class="slide"></div>
                </li> 
            </ul>
            <!-- Tab panes -->
            <div class="tab-content card-block">
                <div class="tab-pane active" id="home3" role="tabpanel">

                    <div class="table-responsive">
                        <table class="table table-bordered" id="datatable" >
                            <tr>
                                <th>Profil</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Email</th>
                                <th>Quartier</th>
                                <th>Telephone</th>
                                <th>Actions</th>                             
                            </tr>  
                                @foreach($maliens as $malien)
                            <tr> 
                                <td>
                                    <img src="{{ asset('profile/citoyens/'.$malien->profile_img) }}" width="40px" height="40px" style="border-radius: 30px" alt="Image" srcset="">
                                </td>                                
                                <td>{{ $malien->nom }}</td>
                                <td>{{ $malien->prenom }}</td>
                                <td>{{ $malien->email }}</td>
                                <td>{{ $malien->adresse }}</td>
                                <td>{{ $malien->phone }}</td>
                                <td>
                                    {{-- <a href="#" class="btn btn-sm btn-success label" data-id="{{ $cissan->id }}" id="conf">val</button> --}}
                                    {{-- <a href="#" class="" data-id="{{ $cissan->id }}" id="confir"><i class="ti-check"></i></button> --}}
                                    <a href="{{ route('confirmerdossier', $malien->id) }}" class="none" id="confirm"><i class="ti-check"></i></button>                                          
                                    <a href="{{ route('carterejeter', $malien->id) }}" class="none" id="rej"><i class="ti-trash"></i></button>  
                                </td>                                             

                            </tr>  
                            @endforeach                       
                        </table>
                    </div>
                    {{-- <div class="text-center">
                        <button class="btn btn-outline-primary btn-round btn-sm">Pluskoura</button>
                    </div> --}}
                </div>
                <div class="tab-pane" id="profile3" role="tabpanel">

                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                              <th>No Demande</th>
                              <th>Date Demande</th>
                              <th>Demandeur</th>
                              <th>Status</th>
                              <th>Document envoyé</th>
                              <th>Actions</th>         
                            </tr>
                            
                            <tr>
                                {{-- <td><img src="assets/images/product/prod1.jpg" alt="prod img" class="img-fluid"></td> --}}
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>

                                </td>
                                
                            </tr>
                        h

                        </table>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-outline-primary btn-round btn-sm">Load More</button>
                    </div>
                </div>
                <div class="tab-pane" id="messages3" role="tabpanel">

                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                              <th>No Demande</th>
                              <th>Date Demande</th>
                              <th>Demandeur</th>
                              <th>Status</th>
                              <th>Document envoyé</th>
                                     
                            </tr>

                           
                            <tr>
                                {{-- <td><img src="assets/images/product/prod1.jpg" alt="prod img" class="img-fluid"></td> --}}
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                
                            </tr>
                        
                        </table>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-outline-primary btn-round btn-sm">Load More</button>
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
                        <button class="btn btn-outline-primary btn-round btn-sm">Load More</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- tabs card end -->
{{-- +223 70 77 07 48 --}}

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script>
    $(document).ready( function () {
        $('#datatable').DataTable();
    } );
</script>


<script>
  $(document).on('click','#confir', function (){ 

  var id = $(this).attr('data-id')
  $('#iduse').val(id);

  $('#confModal').modal('show');
});

</script>


{{-- Rejetter Demande --}}

<script>
  $(document).on('click','#rejet', function (){ 

var id = $(this).attr('data-id')
$('#id').val(id);

$('#rejetModal').modal('show');
});
</script>

{{--Fin rejet --}}
@endsection
@section('scripts')

@endsection