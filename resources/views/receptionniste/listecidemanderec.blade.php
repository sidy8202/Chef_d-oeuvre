@extends('receptionniste.indexrecep')

@section( 'contenues')


{{-- <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"> --}}
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<!-- Button trigger modal -->

{{-- Rejet demande --}}

<div class="modal fade" id="rejetModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Rejet de la demande</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h6>Veuillez mentionner le motif du rejet!</h6>
  
                <form action="" id="rejetForm" enctype="multipart/form-data" method="POST">
                  @csrf
                  @method('PATCH')

                  <input type="" value="" id="id" name="id"/> 

                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example1q">Motif</label>
                    <textarea id="form3Example1q" class="form-control" id="objet" name="motifrejet" cols="30" rows="3"></textarea>
                  </div>
                  {{-- <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example1q">Anncienne piece ou extrait</label>
                    <input type="file" id="form3Example1q" class="form-control" name="document">
                  </div> --}}
  
                    {{-- <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                      <button type="submit" class="btn btn-primary">Envoyer</button>
                    </div> --}}

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary center" data-bs-dismiss="modal">Annuler</button>
                      <button type="submit" class="btn btn-primary center">Envoyer</button>
                    </div>    
  
                </form>    
                
        </div>
                                      
      </div>
    </div>
</div> 

{{-- FIn du modal --}}

<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Demande de Carte d'identité</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <marquee behavior="" direction="">
          <h6 class="text-danger">Veuillez fournir une copie de piece ou un extrait!</h6>
      </marquee>  

              <form action="" enctype="multipart/form-data" method="">
                @csrf

                {{-- <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example1q">Type de demande</label>
                  <input type="text" id="form3Example1q" class="form-control" name="type">
                </div> --}}
                
                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example1q">Objet</label>
                  <textarea id="form3Example1q" class="form-control" name="objet" cols="30" rows="3"></textarea>
                  {{-- <input type="text" id="form3Example1q" class="form-control" name="objet"> --}}
                </div>
                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example1q">Anncienne piece ou extrait</label>
                  <input type="file" id="form3Example1q" class="form-control" name="document">
                </div>
                

                {{-- <div class="row">
                  <div class="col mb-4">
                    <div class="form-outline datepicker">
                      <label for="exampleDatepicker1" class="form-label">Copie d'extrait </label>
                      <input type="file" class="form-control" id="exampleDatepicker1" name="adresse"/>
                    </div>

                  </div>
                  <div class="col-md mb-4">
                    <label for="exampleDatepicker1" class="form-label">Attestation ou diplome</label>
                    <input type="file" class="form-control" id="exampleDatepicker1" name="phone"/>
                  </div>
                </div> --}}

                

                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                  </div>

              </form>    
              
      </div>
                  
                
    </div>
  </div>
</div>

{{-- Renvoyer demande --}}

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#73b4ff">
          <h5 class="modal-title text-white text-bold" id="exampleModalLabel">Demande de Carte d'identité</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h6 >Veuillez fournir une copie de piece ou un extrait!</h6>
  
                <form action="{{ route('carte.create') }}" enctype="multipart/form-data" method="POST">
                  @csrf
  
                  {{-- <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example1q">Type de demande</label>
                    <input type="text" id="form3Example1q" class="form-control" name="type">
                  </div> --}}
                 
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example1q">Objet</label>
                    <textarea id="form3Example1q" class="form-control" name="objet" cols="30" rows="3"></textarea>
                    {{-- <input type="text" id="form3Example1q" class="form-control" name="objet"> --}}
                  </div>
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example1q">Anncienne piece ou extrait</label>
                    <input type="file" id="form3Example1q" class="form-control" name="document">
                  </div>
                  
  
                  {{-- <div class="row">
                    <div class="col mb-4">
                      <div class="form-outline datepicker">
                        <label for="exampleDatepicker1" class="form-label">Copie d'extrait </label>
                        <input type="file" class="form-control" id="exampleDatepicker1" name="adresse"/>
                      </div>
  
                    </div>
                    <div class="col-md mb-4">
                      <label for="exampleDatepicker1" class="form-label">Attestation ou diplome</label>
                      <input type="file" class="form-control" id="exampleDatepicker1" name="phone"/>
                    </div>
                  </div> --}}
  
                  
  
                    <div class="modal-footer">
                      <button type="button" class="btn text-white" style="background-color:#B66639" data-bs-dismiss="modal" >Annuler</button>
                      <button type="submit" class="btn btn-primary">Envoyer</button>
                    </div>
  
                </form>    
                
        </div>
                    
                  
      </div>
    </div>
  </div>

{{-- Fin --}}

{{-- Modal confirmation de Rendez vous --}}

<div class="modal fade" id="confModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#73b4ff">
          <h5 class="modal-title" id="exampleModalLabel">Fixer un Rendez vous avec le citoyen</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body"> 
                <form action="{{ route('confirmdemandeci') }}" enctype="multipart/form-data" method="POST">
                  @csrf
                  {{-- <input type="" id="id" name="id_demandescer"> --}}
                  <input type="" value="" id="iduse" name="id_demandesci"/> 

                    
                  {{-- <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example1q">Type de demande</label>
                    <input type="text" id="form3Example1q" class="form-control" name="type">
                  </div> --}}
                  <div class="form-outline mb-4">
                      <label class="form-label" for="form3Example1q">Date du Rendez vous </label>
                      <input type="datetime-local" id="form3Example1q" class="form-control" name="daterdv">
                  </div>
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example1q">Message </label>
                    <textarea name="commentaires" id="form3Example1q" class="form-control" cols="30" rows="3"></textarea>
                </div>
                  
                  
                  
  
                  {{-- <div class="row">
                    <div class="col mb-4">
                      <div class="form-outline datepicker">
                        <label for="exampleDatepicker1" class="form-label">Copie d'extrait </label>
                        <input type="file" class="form-control" id="exampleDatepicker1" name="adresse"/>
                      </div>
  
                    </div>
                    <div class="col-md mb-4">
                      <label for="exampleDatepicker1" class="form-label">Attestation ou diplome</label>
                      <input type="file" class="form-control" id="exampleDatepicker1" name="phone"/>
                    </div>
                  </div> --}}
  
 
                    <div class="modal-footer">
                      <button type="button" class="btn text-white" style="background-color:#B66639"  data-bs-dismiss="modal">Annuler</button>
                      <button type="submit" class="btn btn-primary">Envoyer</button>
                    </div>
  
                </form>    
                
        </div>
                    
                  
      </div>
    </div>
  </div>

{{-- Fin du modal confirm --}}
    
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

	<!-- tabs card start -->
  <div class="col-sm-12 mt-3">
    <div class="card tabs-card">
        <div class="card-block p-0">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs md-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home3" role="tab"><i class="fa fa-home"></i>La liste des demandes en cours</a>
                    <div class="slide"></div>
                </li>
                
                 <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#profile3" role="tab"><i class="fa fa-key"></i>Demandes Validées</a>
                    <div class="slide"></div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#messages3" role="tab"><i class="fa fa-play-circle"></i>Demandes Rejetées</a>
                    <div class="slide"></div>
                </li>
                 <li class="nav-item">
                    <a class="nav-link text-white " data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color:#0972a1" data-toggle="tab" href="#" role="tab"><i class="fa fa-database"></i>Nouvelle Demande</a>
                    <div class="slide"></div>
                </li> 
            </ul>
            <!-- Tab panes -->
            <div class="tab-content card-block">
                <div class="tab-pane active" id="home3" role="tabpanel">

                    <div class="table-responsive">
                        <table class="table table-bordered" id="datatable" >
                            <tr>
                                <th>No Demande</th>
                                <th>Date Demande</th>
                                <th>Demandeur</th>
                                <th>Quartier</th>
                                <th>Status</th>
                                <th>Document envoyé</th>
                                <th>Actions</th>                               
                            </tr>

                            @foreach ($niyira as $cissan )    

                            <tr>
                                <td>CI0{{ $cissan->id }}</td>
                                <td>{{ $cissan->created_at }}</td>
                                <td>{{ $cissan->user->nom }}  {{ $cissan->user->prenom }}</td>
                                <td>{{ $cissan->user->adresse}} </td>

                                <td>{{ $cissan->status }}</td>
                                
                                <td><a href="{{ url('carte/d_identite/'.$cissan->document) }}" download>Fichier(Telecharger)</a></td>                                             
                                <td>
                                    <a href="{{ url('carte/d_identite/'.$cissan->document) }}" view target="_blank" class="" title="Afficher" data-toggle="tooltip"><i class="ti-eye"></i></a>&nbsp;&nbsp;&nbsp;
                                    {{-- <a href="#" class="btn btn-sm btn-success label" data-id="{{ $cissan->id }}" id="conf">val</button> --}}
                                    {{-- <a href="#" class="" data-id="{{ $cissan->id }}" id="confir"><i class="ti-check"></i></button> --}}
                                    <a href="{{ route('confirmerdossier', $cissan->id) }}" class="none" id="confirm" title="Valider" data-toggle="tooltip"><i class="ti-check"></i></a> &nbsp;&nbsp;&nbsp;

                                    <a href="{{ route('carterejeter', $cissan->id) }}" class="none" id="rej" title="Rejeter" data-toggle="tooltip"><i class="ti-trash"></i></a>                                                                                                                          
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
                            @foreach($gnouman as $valider)
                            <tr>
                                {{-- <td><img src="assets/images/product/prod1.jpg" alt="prod img" class="img-fluid"></td> --}}
                                <td>CI0{{ $valider->id }}</td>
                                <td>{{ $valider->created_at }}</td>
                                <td>{{ $valider->user->nom }}  {{ $valider->user->prenom }}</td>
                                <td>{{ $valider->status }}</td>
                                <td><a href="{{ url('carte/d_identite/'.$valider->document) }}" download>Fichier(Telecharger)</a></td>                                             
                                
                                <td>
                                  <a href="{{ url('carte/d_identite/'.$valider->document) }}" view target="_blank" class="" title="Afficher" data-toggle="tooltip"><i class="ti-eye"></i></a>&nbsp;&nbsp;&nbsp;
                                  {{-- <a href="#" class="btn btn-sm btn-success label" data-id="{{ $valider->id }}" id="conf">val</button> --}}
                                  <a href="#" class="" data-id="{{ $valider->id }}" id="confir" title="RDV" data-toggle="tooltip"><i class="ti-check"></i></a>&nbsp;&nbsp;&nbsp;
                                  {{-- <a href="{{ route('confirmerdossier', $valider->id) }}" class="none" id="confirm"><i class="ti-check"></i></button>                                           --}}
                                  {{-- <a href="{{ route('carterejeter', $valider->id) }}" class="none" id="rej" title="Annuler" data-toggle="tooltip"><i class="ti-trash"></i></a>  --}}
                                </td>

                            </tr>
                           @endforeach

                        </table>
                    </div>
                    {{-- <div class="text-center">
                        <button class="btn btn-outline-primary btn-round btn-sm">Load More</button>
                    </div> --}}
                </div>
                <div class="tab-pane" id="messages3" role="tabpanel">

                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                              <th>No Demande</th>
                              <th>Date Demande</th>
                              <th>Demandeur</th>
                              <th>Status</th>
                              <th>Motif rejet</th>
                              <th>Document envoyé</th>
                                     
                            </tr>

                            @foreach($kolon as $rejet)
                            <tr>
                                {{-- <td><img src="assets/images/product/prod1.jpg" alt="prod img" class="img-fluid"></td> --}}
                                <td>CI0{{ $rejet->id }}</td>
                                <td>{{ $rejet->created_at }}</td>
                                <td>{{ $rejet->user->nom }}  {{ $rejet->user->prenom }}</td>
                                <td>{{ $rejet->status }}</td>
                                <td>{{ $rejet->motifrejet }}</td>
                                <td>
                                  <a href="{{ url('carte/d_identite/'.$rejet->document) }}" view target="_blank" class="" title="Afficher" data-toggle="tooltip"><i class="ti-eye"></i></a>
                                </td>
                                
                            </tr>
                           @endforeach
                        </table>
                    </div>
                    {{-- <div class="text-center">
                        <button class="btn btn-outline-primary btn-round btn-sm">Load More</button>
                    </div> --}}
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
                    {{-- <div class="text-center">
                        <button class="btn btn-outline-primary btn-round btn-sm">Load More</button>
                    </div> --}}
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

{{-- datatable --}}
  <script>
      $(document).ready( function () {
          $('#datatable').DataTable();
      } );
  </script>
{{-- end --}}

{{-- Hide Id of Table --}}
  <script>
    $(document).ready( function () {
        $('.th_1').hide();
    } );
  </script>
{{-- End of Hide --}}

<script>
  $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();
  });
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
  $(document).on('click','#rejet', function ()
  { 

  var id = $(this).attr('data-id')
  $('#id').val(id);

  $('#rejetModal').modal('show');
});
</script>

{{--Fin rejet --}}
@endsection
@section('scripts')

@endsection