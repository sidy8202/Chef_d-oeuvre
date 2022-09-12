@extends('citoyen.indexcitoi')

@section('contenues')



{{-- <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"> --}}
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<!-- Button trigger modal -->

{{-- Rejet demande --}}

{{-- <div class="modal fade" id="rejetModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
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
            

                  <input type="" value="" id="id" name="id"/> 

                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example1q">Motif</label>
                    <textarea id="form3Example1q" class="form-control" id="objet" name="motifrejet" cols="30" rows="3"></textarea>
                  </div>
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example1q">Anncienne piece ou extrait</label>
                    <input type="file" id="form3Example1q" class="form-control" name="document">
                  </div>
  
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                      <button type="submit" class="btn btn-primary">Envoyer</button>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary center" data-bs-dismiss="modal">Annuler</button>
                      <button type="submit" class="btn btn-primary center">Envoyer</button>
                    </div>    
  
                </form>    
                
        </div>
                                      
      </div>
    </div>
</div>  --}}

{{-- FIn du modal --}}

<!-- Modal -->
{{-- <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Demande de Carte d'identité</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h6>Veuillez fournir une copie de piece ou un extrait!</h6>

              <form action="" enctype="multipart/form-data" method="">
                @csrf

                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example1q">Type de demande</label>
                  <input type="text" id="form3Example1q" class="form-control" name="type">
                </div> 
                
                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example1q">Objet</label>
                  <textarea id="form3Example1q" class="form-control" name="objet" cols="30" rows="3"></textarea>
                   <input type="text" id="form3Example1q" class="form-control" name="objet"> 
                </div>
                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example1q">Anncienne piece ou extrait</label>
                  <input type="file" id="form3Example1q" class="form-control" name="document">
                </div>
                

                 <div class="row">
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
                </div> 

                

                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                  </div>

              </form>    
              
      </div>
                  
                
    </div>
  </div>
</div>  --}}

{{-- Renvoyer demande --}}

{{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Demande de Carte d'identité</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h6>Veuillez fournir une copie de piece ou un extrait!</h6>
  
                <form action="" enctype="multipart/form-data" method="POST">
                  @csrf
  
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example1q">Type de demande</label>
                    <input type="text" id="form3Example1q" class="form-control" name="type">
                  </div>
                 
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example1q">Objet</label>
                    <textarea id="form3Example1q" class="form-control" name="objet" cols="30" rows="3"></textarea>
                    <input type="text" id="form3Example1q" class="form-control" name="objet">
                  </div>
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example1q">Anncienne piece ou extrait</label>
                    <input type="file" id="form3Example1q" class="form-control" name="document">
                  </div>
                  
  
                 <div class="row">
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
                  </div> }
  
                  
  
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                      <button type="submit" class="btn btn-primary">Envoyer</button>
                    </div>
  
                </form>    
                
        </div>
                    
                  
      </div>
    </div>
</div> --}}

{{-- Fin --}}

{{-- Modal confirmation de Rendez vous --}}

{{-- <div class="modal fade" id="retraitModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Formulaire de Retrait de carte</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body"> 
                <form action="" enctype="multipart/form-data" method="POST">
                  @csrf
                  @method('PATCH')

                  <input type="" id="id" name="id_demandescer">
                  <input type="" value="" id="iduse" name="id_demandesci"/> 

                    
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example1q">Type de demande</label>
                    <input type="text" id="form3Example1q" class="form-control" name="type">
                  </div>
                  <div class="form-outline mb-4">
                      <label class="form-label" for="form3Example1q">Date de Retrait </label>
                      <input type="datetime-local" id="form3Example1q" class="form-control" name="daterdv">
                  </div>
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example1q">Numero du document</label>
                    <input type="text" id="form3Example1q" class="form-control" name="numero_document">
                </div>
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example1q">Montant</label>
                    <input type="number" id="form3Example1q" class="form-control" name="prix">
                </div>
                  
                  
                  
  
                  <div class="row">
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
                  </div> 
  
 
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                      <button type="submit" class="btn btn-primary">Envoyer</button>
                    </div>
  
                </form>    
                
        </div>
                    
                  
      </div>
    </div>
</div> --}}

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
                    <a class="nav-link active" data-toggle="tab" href="#home3" role="tab"><i class="fa fa-home"></i>Carte d'identité</a>
                    <div class="slide"></div>
                </li>
                              
                <li class="nav-item">
                   <a class="nav-link" data-toggle="tab" href="#profile3" role="tab"><i class="fa fa-key"></i>Documents Retirés</a>
                   <div class="slide"></div>
                </li>

                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#messages3" role="tab"><i class="fa fa-play-circle"></i>Certificat de residence</a>
                  <div class="slide"></div>
                </li> 
                
                <li class="nav-item">
                  <a class="nav-link " data-toggle="tab" href="#" role="tab"><i class="fa fa-database"></i>Certificats retirés</a>
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
                                <th>Date Rendez vous</th>
                                <th>Status</th>
                                {{-- <th>Document envoyé</th> --}}
                                {{-- <th>Actions</th>                                --}}
                            </tr>

                              
                            @foreach($rdv as $journee)
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>

                                {{-- <td><a href="" download>Fichier(Telecharger)</a></td>                                              --}}
                                {{-- <td>
                                    <a href="#" class="btn btn-sm btn-success label" data-id="{{ $cissan->id }}" id="conf">val</button>
                                    <a href="" class="none" id="rej" title="Retrait" data-toggle="tooltip"><i class="ti-check"></i></button>
                                                                                
                                </td>                                 --}}
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
                        <table class="table table-bordered">
                            <tr>
                              <th>No Demande</th>
                              <th>Date Demande</th>
                              <th>Date Rendez vous</th>
                              <th>Status</th>
                            </tr>
                            
                            <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                              
                        </table>
                    </div>
                    {{-- <div class="text-center">
                        <button class="btn btn-outline-primary btn-round btn-sm">Load More</button>
                    </div> --}}
                </div>
                <div class="tab-pane" id="messages3" role="tabpanel">

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                              <th>No Demande</th>
                              <th>Date Demande</th>
                              <th>Date Rendez vous</th>
                              <th>Status</th>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
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
                    <div class="text-center">
                        <button class="btn btn-outline-primary btn-round btn-sm">Load More</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- tabs card end -->


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
  $(document).on('click','#retrait', function (){ 

var id = $(this).attr('data-id')
$('#iduse').val(id);

$('#retraitModal').modal('show');
});
</script>


{{-- Rejetter Demande --}}

<script>
  $(document).on('click','#rejet', function (){ 

var id = $(this).attr('data-id')
$('#id').val(id);

$('#retraitModal').modal('show');
});
</script>

{{--Fin rejet --}}
@endsection
@section('scripts')

@endsection
